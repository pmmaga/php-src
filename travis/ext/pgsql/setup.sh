#!/bin/bash
echo "
<?php $conn_str .= ' user=$PGSQL_TEST_USER'; ?>" >> "./ext/pgsql/tests/config.inc"
psql -c 'create database test;' -U $PGSQL_TEST_USER
