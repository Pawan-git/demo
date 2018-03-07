Phonebook: A demo application to add contacts
===============================

DIRECTORY STRUCTURE
-------------------

```
app
    application/            contains the application code files
    assets/                 contains the assets: css|js
    system/                 contains framework files

db
    migrations/              contains db migrations


vendor/                  contains dependent 3rd-party packages

```


************
Installation
************

Direct setup:
Download the git repo and place it in htdocs directory inside xampp
OR you may clone the git repo in a directory
you can set the 'base_url' inside app/application/config.php file.
The 'base_url' must be the path upto 'app/' folder ex. 'http://localhost/phonebook/app/'

Create a database with name 'phonebook' and then run migrations

************
Run Migrations
************

Goto the directory vendor/bin
Run below commands:
#Create tables in database `phonebook`
phinx migrate -e development -c phinx_config.php

#Insert records into `phonebook.user`
phinx seed:run -s UserSeeder -e development -c phinx_config.php

***************
Running the demo
***************

Try to run the url: 'http://localhost/phonebook/app/'

Login credentials:
email: pawan@testmail.com
password: 121121

***************
.htaccess
***************
.htaccess file will look like this:

RewriteEngine On
RewriteBase /phonebook/app/   #you might be need to change this path according to your folders
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]


