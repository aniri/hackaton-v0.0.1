#!/usr/bin/env bash

# Centos
#yum install postgresqlpostgresql-libsgccpython34-devellibpqxx-develpostgresql-server postgresql-contrib postgis postgis-utils

# ArchLinux
sudo pacman -S postgresql postgresql-libs postgis pgadmin3

# Python ~ https://docs.python.org/3/library/venv.html
python3 -m venv venv
. venv/bin/activate
pip install --upgrade pip
pip install flask Flask-API psycopg2 pipreqs
pipreqs --force .
deactivate
