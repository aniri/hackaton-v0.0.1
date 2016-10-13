# Romanian Public Transport API

## API specification
* Endpoints
    * Cities - [`GET /v0.1/cities`](http://193.230.8.27:28031/v0.1/cities)  
    * Bucuresti
        * Stops - [`GET /v0.1/<string:city_id>/stops`](http://193.230.8.27:28031/v0.1/bucuresti/stops)  
        * Routes - [`GET /v0.1/<string:city_id>/routes`](http://193.230.8.27:28031/v0.1/bucuresti/routes)  
        * Route from stop A to stop B - [`GET /v0.1/route?start_stop_id=<string:start_stop_id>&end_stop_id=<string:end_stop_id>`](http://193.230.8.27:28031/v0.1/bucuresti/route?start_stop_id=1&end_stop_id=42)
    * Brasov  
        * Capabilities [`GET /v0.1/capabilities`](http://193.230.8.27:28031/v0.1/brasov/capabilities)  
        * Agency Info [`GET /v0.1/<string:city>/agency`](http://193.230.8.27:28031/v0.1/brasov/agency)
        * Stops - [`GET /v0.1/<string:city_id>/stops`](http://193.230.8.27:28031/v0.1/brasov/stops)  
        * Routes - [`GET /v0.1/<string:city_id>/routes`](http://193.230.8.27:28031/v0.1/brasov/routes)  
        * Route from stop A to stop B - [`GET /v0.1/route?start_stop_id=<string:start_stop_id>&end_stop_id=<string:end_stop_id>`](http://193.230.8.27:28031/v0.1/brasov/route?start_stop_id=TRIAJ&end_stop_id=LIVADA)  
        * Route from stop B to stop A - [`GET /v0.1/route?start_stop_id=<string:start_stop_id>&end_stop_id=<string:end_stop_id>`](http://193.230.8.27:28031/v0.1/brasov/route?start_stop_id=LIVADA&end_stop_id=TRIAJ)

* Supported protocols / data formats:
    * [GTFS and GTFS Realtime](https://developers.google.com/transit/)
    * [JSON](http://json.org/)
    * [XML](https://en.wikipedia.org/wiki/XML)
    * [CSV](https://en.wikipedia.org/wiki/Comma-separated_values)
    * [Protocol buffers/gRPC](http://www.grpc.io/)

## GTFS feed map explorer
Dependency: https://github.com/google/transitfeed

`MAP_KEY= python schedule_viewer.py --key $MAP_KEY --feed_filename $HOME/Projects/GTFS/ratbv-to-gtfs-converter/old_data/brasov/`

## GTFS to SQL conversion

Dependency: https://github.com/mnemonicflow/gtfs_SQL_importer

### SQLite
#### SQLite export
```
cat gtfs_tables.sql \
  <(python2 import_gtfs_to_sql.py $HOME/Projects/GTFS/ratbv-to-gtfs-converter/old_data/brasov/ nocopy) \
  gtfs_tables_makeindexes.sql \
  vacuumer.sql > out_sqlite.sql
```

#### SQLite import
`sqlite3 brasov_gtfs.db < out_sqlite.sql`

### PostgreSQL
#### PostgreSQL export
```
cat gtfs_tables.sql \
    <(python2 import_gtfs_to_sql.py $HOME/Projects/GTFS/ratbv-to-gtfs-converter/old_data/brasov/) \
    gtfs_tables_makeindexes.sql \
    vacuumer.sql > out_postgres.sql
```

#### PostgreSQL import
`psql -U postgres -d public_transport -f postgres_import.sql`

## Deployment
1. Install dependencies  
`yum install python34 python-pip && pip install -U pip`

2. Create Python virtualenv  
`cd root/work && virtualenv -p python3 venv`

3. Activate virtual environment  
`source venv/bin/activate && cd public_transport_api`

4. Install requirements  
`pip install -r requirements.txt`

5. Run  
`screen -S public_transport_api`  
`chmod +x gtfs-api.py && python3 gtfs-api.py`  

6. Run `./deploy.sh` script  

7. Firewall
```
systemctl stop firewalld & systemctl mask firewalld
yum install iptables-services && systemctl enable iptables
systemctl disable httpd && systemctl stop httpd
cp /etc/sysconfig/iptables /etc/sysconfig/iptables.bkp
sed -i 's/COMMIT/-I INPUT -p tcp -m tcp --dport 80 -j ACCEPT\nCOMMIT/' /etc/sysconfig/iptables.bkp
iptables-restore --test /etc/sysconfig/iptables.bkp
cp /etc/sysconfig/iptables.bkp /etc/sysconfig/iptables
systemctl reload iptables # iptables-restore < /etc/sysconfig/iptables
netstat -tupln | grep ':80' # ss -t -a | grep :http
```  