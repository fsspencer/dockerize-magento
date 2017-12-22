# Dockerize Magento 1 or 2

This is a simple bash script that allows you to create a container for a Magento 1 or 2 project with the ability to create/import/maintain an existing project

## Features
- Setup a Magento 1/2 project within minutes
- Create an empty Magento 2.x project (Open Source or Commerce)
- Import an existing Magento 1.x project by importing a .sql file
- Import an existing Magento 2.x project by importing a .sql file
- If you already have a container for mysql called "mysql", the script will automatically use it, otherwise it will create a new one
- One single container for Magento 1
- One single container for Magento 2
- One single container for Mysql


## Requirements
- Docker installed
- Docker accessible via command line using the command `docker`

## Magento 1 Usage
### New Project
1. Download a Magento clean instance from https://magento.com/tech-resources/download
2. Uncompress the Magento code and go into the project root directory
2. Copy the `dockerize` script from this repository to your project root
3. Execute `./dockerize` or `sh dockerize`
5. Follow the steps of the script
6. Select `create new database` without importing anything
7. Go to your browser and navigate to the URL you picked (http://dev.local/ by default)

### Existing Project
1. Download your project code within any directory you want
2. Copy a single sql file with a database dump to your project root
3. Copy the `dockerize` script from this repository to your project root
4. Execute `./dockerize` or `sh dockerize`
5. Follow the steps of the script
6. Select `create new database` and `import database` when the script asks. This will create your local.xml file, set your store URL and the rest

## Magento 2 Usage
### New Project
1. Create a new directory for your project
2. Copy the `dockerize` script from this repository to your new directory
3. Execute `./dockerize` or `sh dockerize`
5. Follow the steps of the script
6. Enter `Y` when it asks for `create database` 
7. Enter `n` when it asks for `import database` 
8. Enter `Y` when it asks for `install magento` and pick the version you want to install. This will do the rest for you
7. Go to your browser and navigate to the URL you picked (http://dev.local/ by default)

### Existing Project
1. Download your project code within any directory you want
2. Copy a single sql file with a database dump to your project root
3. Get a copy from the original app/etc/config.php
3. Copy the `dockerize` script from this repository to your project root
4. Execute `./dockerize` or `sh dockerize`
5. Follow the steps of the script
6. Select `create new database` and `import database` when the script asks. This will create your env.php file, set your store URL and the rest

## Switching Between Projects
The `dockerize` script will create a new .dockerized file into your project root directory. Make sure to not commit that file to your repository.

That file will save some configuration parameters after you initialized the project for the first time, in order to prevent to execute the whole process twice.
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

## Credits
- Francis S. Spencer - <francis.s.spencer@gmail.com>
- codealist.net