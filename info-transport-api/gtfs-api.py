#!/usr/bin/env python3

import sqlite3
import json
from flask import request
from flask_api import FlaskAPI
import psycopg2
import psycopg2.extras

DSN = "host='localhost' dbname='public_transport' user='postgres'"


def dict_factory(cursor, row):
    result = {}
    for idx, col in enumerate(cursor.description):
        result[col[0]] = row[idx]
    return result


def connect(db):
    connection = sqlite3.connect(db)
    connection.row_factory = dict_factory
    return connection


app = FlaskAPI(__name__, static_url_path='/static')


class Connection(object):
    def __init__(self, database):
        self.database = database

    def __enter__(self):
        self.connection = connect(self.database)
        return self.connection

    def __exit__(self, type, value, traceback):
        self.connection.close()


class Cursor(object):
    def __init__(self, connection):
        self.database = connection
        self.cursor = connection.cursor()

    def __enter__(self):
        return self.cursor

    def __exit__(self, type, value, traceback):
        self.cursor.close()


@app.route('/')
def root():
    return app.send_static_file('index.html')


@app.route('/static/<path:path>')
def static_proxy(path):
    return app.send_static_file(path)


@app.route('/v0.1/<string:city>/capabilities', methods=['GET'])
def capabilities(city):
    with Connection('data/brasov_gtfs.db') as connection:
        with Cursor(connection) as cursor:
            cursor.execute("SELECT name FROM sqlite_master WHERE type='table'")
            result = []
            for row in cursor.fetchall():
                result.append(row['name'])
            return result


@app.route('/v0.1/<string:city>/agency', methods=['GET'])
def agency(city):
    with Connection('data/brasov_gtfs.db') as connection:
        with Cursor(connection) as cursor:
            cursor.execute(
                "SELECT agency_id as id, agency_name as name, agency_url as url, agency_timezone as timezone, agency_lang as language, agency_phone as phone, agency_fare_url as fare_url FROM gtfs_agency")
            result = cursor.fetchone()
            return result


@app.route('/v0.1/<string:city>/stops', methods=['GET'])
def stops(city):
    city = city.lower()
    if city == 'brasov':
        with Connection('data/brasov_gtfs.db') as connection:
            with Cursor(connection) as cursor:
                # TODO: Find a way to find the stops from the end route stops
                cursor.execute(
                    "SELECT distinct s.stop_id as id, s.stop_name as name, case when upper(substr(s.stop_id, -2)) = '_I' then 'backward' else 'forward' end as direction, stop_lat as latitude, stop_lon as longitude from gtfs_stop_times g join gtfs_stops s on g.stop_id = s.stop_id where stop_sequence = 1 order by stop_name")
                # return { "stationList": cursor.fetchall() }
                result = cursor.fetchall()
                return result
    elif city == 'bucuresti':
        with open('data/bucuresti/stops.json', 'r') as f:
            return json.load(f)


@app.route('/v0.1/<string:city>/routes', methods=['GET'])
def routes(city):
    city = city.lower()

    if city == 'brasov':
        with Connection('data/brasov_gtfs.db') as connection:
            with Cursor(connection) as cursor:
                cursor.execute(
                    "SELECT route_id as id, route_short_name as short_name, route_long_name as long_name, (select description from gtfs_route_types where route_type = r.route_type) as route_type FROM gtfs_routes r")
                result = cursor.fetchall()
                # return { "routeList": cursor.fetchall() }
                return result
    elif city == 'bucuresti':
        with open('data/bucuresti/routes.json', 'r') as f:
            return json.load(f)


# http 'localhost:7337/v0.1/brasov/route/LIVADA/TRIAJ'
# FIXME: Doesn't work
@app.route('/v0.1/<string:city>/route/<string:start_stop_id>/<string:end_stop_id>', methods=['GET'])
def route_stops_path(start_stop_id, end_stop_id):
    if start_stop_id and end_stop_id:
        return route(start_stop_id, end_stop_id)


# http localhost:9999/v1/brasov/route?start_stop_id=1&end_stop_id=2
@app.route('/v0.1/<string:city>/route', methods=['GET'])
def route_stops_query(city):
    start_stop_id = request.args.get('start_stop_id')
    end_stop_id = request.args.get('end_stop_id')

    if start_stop_id and end_stop_id:
        return route(city, start_stop_id, end_stop_id)

    return [42]


def route(city, start_stop_id, end_stop_id):
    if city == 'brasov':
        with Connection('data/brasov_gtfs.db') as connection:
            with Cursor(connection) as cursor:
                cursor.execute(
                    """
                    select g.stop_id as id,
                    stop_name as name,
                    stop_lat as latitude,
                    stop_lon as longitude,
                    stop_sequence as sequence from gtfs_stop_times g join gtfs_stops s on g.stop_id = s.stop_id
                    where trip_id = (select trip_id from gtfs_stop_times where (stop_id = ? and stop_sequence = 1) limit 1)
                    order by stop_sequence
                    """,
                    (start_stop_id,))
                result = cursor.fetchall()
                # return { "routeList": cursor.fetchall() }
                return result
    elif city == 'bucuresti':
        with psycopg2.connect(DSN) as connection:
            with connection.cursor(cursor_factory=psycopg2.extras.DictCursor) as cursor:
                cursor.execute("""select distinct g.stop_id as id,
                    stop_name as name,
                    stop_lat as latitude,
                    stop_lon as longitude,
                    stop_sequence as sequence from gtfs_bucuresti.gtfs_stop_times g join gtfs_bucuresti.gtfs_stops s on g.stop_id = s.stop_id
                    where trip_id = (select trip_id from gtfs_bucuresti.gtfs_stop_times where stop_id = %s limit 1)
                    order by stop_sequence
                    """, (start_stop_id,))
                result = []
                for row in cursor.fetchall():
                    result.append({
                        'id': row['id'],
                        'name': row['name'],
                        'latitude': row['latitude'],
                        'longitude': row['longitude'],
                        'sequence': row['sequence']
                    })
                return result


@app.route('/v0.1/cities', methods=['GET'])
def cities():
    # https://maps.google.com/landing/transit/cities/#Europe
    # xidel -q -e "//*/div/article/ul/li[47]/span[contains(@class, 'city-dump')]" --data=http://moovitapp.com/cities/
    # cat moovit_cities.txt | awk -F'\n' '{print "\"" $1 "\""; }' | tr '\n' ','
    return [{"id": "bucuresti", "name": "București"},
            {"id": "brasov", "name": "Brașov"}]
    # { "id": "sibiu", "name": "Sibiu" },
    # { "id": "alba_iulia", "name": "Alba Iulia" },
    # { "id": "cluj_napoca", "name": "Cluj-Napoca"} ]


if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True, port=80)
