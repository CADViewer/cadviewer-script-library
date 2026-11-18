#!/bin/sh
# Starts the demo database, then Apache.
#
# Two samples read MySQL on localhost as root without a password
# (php/getVisualQuery_MySQL_public_demo.php, php/cadviewer_handles_public_demo.php).
# The database lives in the container, listens on its socket only and is
# loaded again from php/*.sql at every start: it holds demo data, nothing else.
set -e

DATADIR=/var/lib/mysql
SQLDIR=/var/www/html/cadviewer/php

mkdir -p /run/mysqld
chown mysql:mysql /run/mysqld

if [ ! -d "$DATADIR/mysql" ]; then
    mariadb-install-db --user=mysql --datadir="$DATADIR" --skip-test-db > /dev/null
fi

mariadbd --user=mysql --datadir="$DATADIR" --skip-networking --socket=/run/mysqld/mysqld.sock &

i=0
until mariadb-admin --socket=/run/mysqld/mysqld.sock ping > /dev/null 2>&1; do
    i=$((i + 1))
    if [ "$i" -ge 30 ]; then
        echo "demo database did not start; the samples that read it will answer 503" >&2
        break
    fi
    sleep 1
done

if mariadb-admin --socket=/run/mysqld/mysqld.sock ping > /dev/null 2>&1; then
    # PHP runs as www-data: root must be reachable by password (an empty one,
    # as the samples send), not by the system account.
    mariadb --socket=/run/mysqld/mysqld.sock <<SQL
ALTER USER 'root'@'localhost' IDENTIFIED VIA mysql_native_password USING PASSWORD('');
DROP DATABASE IF EXISTS vizquery_public_demo;
CREATE DATABASE vizquery_public_demo CHARACTER SET utf8mb4;
DROP DATABASE IF EXISTS cadviewer_handles_public_demo;
CREATE DATABASE cadviewer_handles_public_demo CHARACTER SET utf8mb4;
FLUSH PRIVILEGES;
SQL
    mariadb --socket=/run/mysqld/mysqld.sock -uroot vizquery_public_demo < "$SQLDIR/vizquery_public_demo.sql"
    mariadb --socket=/run/mysqld/mysqld.sock -uroot cadviewer_handles_public_demo < "$SQLDIR/cadviewer_handles_public_demo_one_of_simple.sql"
fi

exec apache2-foreground
