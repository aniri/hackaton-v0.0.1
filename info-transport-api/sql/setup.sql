-- verify available extensions
SELECT name, default_version,installed_version 
FROM pg_available_extensions WHERE name LIKE 'postgis%' ;

-- install extension for spatial database mygisdb
\c public_transport
CREATE EXTENSION postgis;
CREATE EXTENSION postgis_topology;
CREATE EXTENSION fuzzystrmatch;
CREATE EXTENSION postgis_tiger_geocoder; 
CREATE EXTENSION pgrouting;

CREATE SCHEMA gtfs_brasov AUTHORIZATION postgres;
CREATE SCHEMA gtfs_brasov AUTHORIZATION postgres;

pg_dump public_transport -n gtfs_brasov -s -f gtfs_brasov.sql
