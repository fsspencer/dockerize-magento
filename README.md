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

## Installation
### Composer (Per Project)

    composer require fsspencer/dockerize-magento

This will create a dockerize file to your project root directory. You just need to run it:

    ./dockerize install

or

    bash dockerize install
    
That will pull the necessary Docker images.

### Manual (Global)

Open your bash file (like `~/.bash_profile`, `~/.bashrc`, `~/zshrc`, etc.) and append the following line:

	alias dockerize='bash <(curl -s -X GET "https://raw.githubusercontent.com/fsspencer/bash-docker-magento/master/dockerize?v='$(date +"%s")'")'

Then reload the configurations to apply the changes:
	
	source ~/.bash_profile

Or whatever is your profile file.
Once you do that, execute the following

	dockerize install
	
That will pull the necessary Docker images.

## Usage

     dockerize <action> <arguments...>

Actions:

| Command | Description |
| ------- | ----------- |
||
| **install** | *Install Magento and MySQL* |
| **update** | *Check for updates* |
||
| **init** | *Initialize Magento project* |
| **bash** | *Connect to your docker container* |
||
| **php** | *Executes php cli within your project root* |
| **composer** | *Executes composer within your project root* |
| **grunt** | *Executes grunt-cli Utility within your project root* |
| **gulp** | *Executes gulp Utility within your project root* |
| **npm** | *Executes npm within your project root* |
| **mysql** |  *Executes Connect to the MySQL client server* |
| **n98** | *Executes n98-magerun within your project root* |
| **magento** | *Executes Magento 2 command line tool (e.g: dockerize magento setup:upgrade)* |
||
| **db:create** | *Creates new database* |
| **db:import** | *Imports a .sql file located in the project root* |
| **db:dump** | *Generates a database file in the project root compressed using gzip* |
||
| **start** | *Start the server and all of its components* |
| **stop** | *Stop the server* |
| **remove** | *Removes local dockerize configuration* |


**NOTE:** All of this commands will work only for your project root directory. That means that if you want to use, for example, gulp on a specify directory within project project (e.g.: skin/frontend/myvendor/mytheme/) it won't work. In that case, you will need to use the "dockerize bash" command and navigate to that directory and use the gulp command from that place.

## Magento 1 Usage
### New Project
1. Download a Magento clean instance from https://magento.com/tech-resources/download
2. Uncompress the Magento code and go into the project root directory
3. Execute the following from your root directory `dockerize init`
4. Follow the steps of the script
5. Select `create new database` without importing anything
6. Go to your browser and navigate to the URL you picked (http://dev.local/ by default)

### Existing Project
1. Download your project code within any directory you want
2. Copy a single sql file with a database dump to your project root
3. Execute the following from your root directory `dockerize init`
4. Follow the steps of the script
5. Select `create new database` and `import database` when the script asks. This will create your local.xml file, set your store URL and the rest

## Magento 2 Usage
### New Project
1. Create a new directory for your project
2. Execute the following from your root directory `dockerize init`
3. Follow the steps of the script
4. Enter `Y` when it asks for `create database` 
5. Enter `n` when it asks for `import database` 
6. Enter `Y` when it asks for `install magento` and pick the version you want to install. This will do the rest for you
7. Go to your browser and navigate to the URL you picked (http://dev.local/ by default)

### Existing Project
1. Download your project code within any directory you want
2. Copy a single sql file with a database dump to your project root
3. Get a copy from the original app/etc/config.php
4. Execute the following from your root directory `dockerize init`
5. Follow the steps of the script
6. Select `create new database` and `import database` when the script asks. This will create your env.php file, set your store URL and the rest

## Switching Between Projects
The `dockerize start` command will create a new config file inside ~/.dockerize directory.

That file will save some configuration parameters after you initialized the project for the first time, in order to prevent to execute the whole process twice.

Whenever you execute `dockerize start` it will stop any magento docker container and initialize a new one with the current project.

If you want to reset the project dockerize configuration, you need to execute `dockerize remove` within your Magento root directory.

## Access to Web Server

If you are using a Magento 1 project

	$ docker exec --user www-data -ti magento bash

If you are using a Magento 2 project

	$ docker exec --user www-data -ti magento2 bash

This will locate you on the `/var/www/html` directory, which is your root dir with permissions for www-data:www-data.

## Access to MySQL

You can perform the following commands

	$ dockerize mysql -e "your sql query;"

Or just enter to mysql server

	$ dockerize mysql

If you have a mysql-client installed locally on your computer, you can connect to it using Docker default IP address `0.0.0.0`

	$ mysql -h 0.0.0.0 -uroot -proot

## Grunt / Gulp

The dockerize command has the ability to work with npm, grunt and gulp for direct usage on the project root directory. It is ideal for Magento 2 usage, since the `Gruntfile.js` and the `package.json`  resides on the root.

But if you want to use those commands on a different directory, you need to connect to your container using the `bash` command first.

*Scenario:* 

 - You have a custom theme that uses Gulp in **Magento 1**. 
 - Your theme
   and gulpfile.js resides on skin/frontend/myvendor/mycustomtheme

Follow the next steps:

    $ dockerize bash


    # once you are on the magento container
    
    $ cd skin/frontend/myvendor/mycustomtheme
    
    $ npm install # in order to download the dependencies
    
    $ gulp # run gulp with any defined task on your gulpfile.js
    
## Known Issues
- `ERROR 3167 (HY000) at line XX: The 'INFORMATION_SCHEMA.SESSION VARIABLES' feature is disabled; see documentation for 'show_compatibility_56`
	
	**Solution:** Enter to your mysql server `$ dockerize mysql`, and execute the following query `set @@global.show_compatibility_56=ON;`. Then try to perform your action again and the error should be gone.


## Credits
- Francis S. Spencer - <francis.s.spencer@gmail.com>
- codealist.net
