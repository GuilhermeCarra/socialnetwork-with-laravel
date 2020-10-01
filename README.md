# Social Network
---
## Pill Overview
This project is consisted a social network that allows users to interact with each other by publishing posts, commenting and giving likes or dislikes to them.
To do this, it was applied knowledge about the Laravel framework, PHP and Javascript.
## Documentation
* [Presentation](https://drive.google.com/file/d/1pPQMyUqhtuPM6A1JjxdC7SLoOPvRagPR/view?usp=sharing)
* [Task List](https://docs.google.com/spreadsheets/d/1WlAGvgiI4W0py7S-Z1LSwHA7ExpVnQDsUeW01bsZjh8/edit?usp=sharing)

## Getting Started
After cloning this repository, excute the folowing commands to test it:
````
composer global require laravel/installer
````
````
composer install
````
````
php artisan key:generate //after created and configured the .env file
````
````
mySQL > CREATE DATABASE (db_name on your .env file)
````
````
php artisan migrate
````
````
php artisan db:seed //populate SQL database (it could take some minutes)
````
````
php artisan serv //check the project
````
## Credentials
To log on the network you can:
* **register** yourself 
* or take a look at a **profile** created with faker/seeder:
````
mySQL > select email from users; // chosse a email from the database
email: (from database)
password: password
````
## Authors

* **Ezequiel Garay** - [GitHub](https://github.com/ezemgaray) - [Code Assembler](https://code.assemblerschool.com/ezequiel-garay)
* **Guilherme Carra** - [GitHub](https://github.com/GuilhermeCarra/) - [Glitch](https://glitch.com/@GuilhermeCarra/)