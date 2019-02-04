#!/bin/bash
mysql -e "CREATE DATABASE IF NOT EXISTS test" -h $PDO_MYSQL_TEST_HOST
