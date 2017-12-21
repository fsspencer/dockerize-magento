# Bash Script for Magento 1 and 2

This is a simple bash script that allows you to create a container for a Magento 1 or 2 project with the ability to create an import a database

## Requirements
- Docker installed
- Docker accessible via command line using the command `docker`

## Usage

1. Create a Magento project in a directory like `/Users/codealist/myproject`
2. Clone this repository and place the `init-docker-magento` on the project root directory
3. (OPTIONAL) Place a `.sql` script on your project directory
4. Execute `./init-docker-magento` or `sh init-docker-magento`
5. Follow the steps of the script
6. Create your `local.xml` or `env.php`file on app/etc using the mysql parameters provided at the end of the script
7. Create a custom host within `/etc/hosts` using the docker ip address `0.0.0.0`

## Access to Web Server

If you are using a Magento 1 project

``
$ docker exec --user www-data -ti magento bash
``

If you are using a Magento 2 project

``
$ docker exec --user www-data -ti magento2 bash
``

This will locate you on the `/var/www/html` directory, which is your root dir with permissions for www-data:www-data.

## Access to MySQL

You can perform the following commands

``
$ docker exec -ti magento mysql -uroot -proot -e "your sql query;"
``

Or just enter to mysql

``
$ docker exec -ti magento mysql -uroot -proot
``

You can also log into the web server and connect directly to mysql from there, generate a mysqldump or wherever you want

``
$ docker exec -ti magento bash
``
``
$ mysql -h [YOUR MYSQL CONTAINER IP] -uroot -proot
``