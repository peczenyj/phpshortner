#!/bin/bash
BASEDIR=$(dirname $0)

echo "drop schema url_short" | mysql -v -u root --password= 
mysql -v -u root --password= < ${BASEDIR}/create_tables.sql 
mysql -v -u root --password= < ${BASEDIR}/init_tables.sql