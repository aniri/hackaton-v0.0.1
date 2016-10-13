#!/usr/bin/env bash

#set -x

jq -r '.[] | [.id, .name] | @csv' stops.json  > stops.csv

# Stops
psql -h localhost -U postgres -d public_transport -c 'truncate gtfs_bucuresti.gtfs_stops cascade'
psql -h localhost -U postgres -d public_transport -c "\copy gtfs_bucuresti.gtfs_stops(stop_id, stop_name) from '$HOME/Projects/GTFS/info-transport-api/data/bucuresti/stops.csv' with (format csv)"

# Routes

# Route<->Stops links
	
jq -r '.[] | [.id, .route_type, .short_name, .long_name] | @csv' routes.json  > routes.csv
route_types=($(awk -F',' '{print $2}' routes.csv | sort -u | tr ' ' '~'));
#echo "${route_types[@]}"

for ((i = 0; i < "${#route_types[@]}"; i++))
do
    printf "%s, %d\n" "${route_types[$i]}" $i
    rep=$(echo ${route_types[$i]} | tr '~' ' ')
    sed -i "s/$rep/$i/" routes.csv
    inval=$(echo $rep | tr -d '\"')
    psql -h localhost -U postgres -d public_transport -c "insert into gtfs_bucuresti.gtfs_route_types(route_type, description) values ($i, '$inval')"
done

psql -h localhost -U postgres -d public_transport -c 'truncate gtfs_bucuresti.gtfs_routes cascade'
psql -h localhost -U postgres -d public_transport -c "\copy gtfs_bucuresti.gtfs_routes(route_id, route_type, route_short_name, route_long_name) from '$HOME/Projects/GTFS/info-transport-api/data/bucuresti/routes.csv' with (format csv)"

sed -i 's/"//g' stop_times.csv
psql -h localhost -U postgres -d public_transport -c 'truncate gtfs_bucuresti.gtfs_stop_times cascade'
psql -h localhost -U postgres -d public_transport -c "\copy gtfs_bucuresti.gtfs_stop_times(trip_id, arrival_time, departure_time, stop_id, stop_sequence) from '$HOME/Projects/GTFS/info-transport-api/data/bucuresti/stop_times.csv' with (format csv, header true)"
