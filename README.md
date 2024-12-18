# Books - PHP & MongoDB
Sample code that connects PHP to a MongoDB database.

## Installation
A LAMP/WAMP/MAMP environment is assumed.

The PHP MongoDB extension must be installed:
1. At https://pecl.php.net/package/mongodb, click on "DLL" for the most recent package and download the one matching your PHP version, operating system architecture (x64 or x86) and whether Thread Safe is activated on your system
2. Copy the dll file in the downloaded zip file to your `php/ext` folder
3. Add the following line to `php.ini`: `extension=<name_of_the_dll_file>`
4. Restart the Apache Web Server

The PHP MongoDB driver must be installed:
`composer install`

MongoDB database: `bookdb`. Collection: `books`. Connection string if the database is set as local: `mongodb://localhost:27017`. The collection can be imported from `db\books.json`.

## PHP MongoDB driver reference
https://www.php.net/manual/en/mongodb.tutorial.library.php

## Tools
MongoDB / PHP8 / Water.css / HTML5

## Author
Arturo Mora-Rioja