# Simple docker mvc config

## How it use?

1. Create project directory

```bash
mkdir mvc.test
```

2. Go to created directory and create 2 directory. 

```bash
cd mvc.test
```

3. Clone this repository to env directory 

```bash
git clone git@github.com:pusachev/mvc.test.git env/
```

4. Clone you repository in src directory

```bash
git clone {your repository url} src/
``` 

5. Go to env/ directory docker-compose.yml and run the command

```bash
docker-compose up -d
```

## Configuration 

All configuration contain in ./config directory

### Nginx 

You can added or change nginx virtual hosts config

example you can se in [mvc.conf](config/nginx/mvc.conf)

```dockerfile
nginx:
    container_name: nginx
    image: pusachev/docker-nginx:latest
    restart: always
    links:
      - php-fpm
    ports:
      - 80:80
      - 443:443
    volumes:
      - ../../src:/var/www/current/src
      - ./config/nginx/mvc.conf:/etc/nginx/sites-enabled/mvc.conf # your configuration file
```

### PHP

You can turn on or off php extension by environment variable.
```dockerfile
XDEBUG_ENABLED: 1
REDIS_ENABLED: 1
```
This extension turned off by default

### Mysql 

You can init your database by [create_database.sql](config/mysql/import/create_database.sql)

For more information please see [docker mysql](https://hub.docker.com/_/mysql)

#### Import db to mysql

```bash
zcat dump.sql.gz | mysql -h 127.0.0.1 -P 3309 -u root -proot database_name 
```
