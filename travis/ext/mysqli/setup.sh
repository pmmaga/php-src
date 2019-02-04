#!/bin/bash
mysql -e "CREATE DATABASE IF NOT EXISTS test" -h $MYSQL_TEST_HOST -u root
