CREATE DATABASE IF NOT EXISTS my_database;

GRANT ALL PRIVILEGES ON *.* TO root@'%' IDENTIFIED BY 'root';

FLUSH PRIVILEGES;