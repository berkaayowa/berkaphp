# berkaPhp MVC Framework
berkaPhp is a PHP MVC framework that helps you quickly write a web application and gives full controller over your application.

## Getting Started
These instructions will help you to get a undersnding of berkaPhp how it works and know how to download berkaPhp framework ,instatll and  configure it.

### Why you may give berkaPhp a try 
* Rapid development 
```
You can Quickly build a web application / web site 
```
* No complicated Configuration
```
No complicated XML files. Just setup your database and you're ready to generate files and use them. 
```
* Simple framwork structured
```
Clean and simple MVC Conventions and easy to understand and use. 
```
* Supports Multiple Layout 
```
You may want to have tow layouts depending on user right e.g default layout and admin layout 
```

### Download berkaPhp framework
You can simply clone from this github or download it in zip format and unzip afterward

### Installing and requirements
* [Web Sever](http://www.dropwizard.io/1.0.2/docs/) - exemple : Wamp, xamp...
* [Database MySQL](https://maven.apache.org/) - With Your table created
* [Copy of berkaPhp](https://rometools.github.io/rome/) - framework

#### Web server requirements
* Php version 5.6.0 or greater

#### Web server extensions that are required to be enabled
* mod_rewrite extension shoud be enabled
* mbstring PHP extension
* intl PHP extension
* curl PHP extension

#### Permissions
berkaPhp uses the Views, Controllers and models directory to store files  so you should make sure that the above directories have a write and ready access . 

## Configuration
* SERVER The database server’s hostname (or IP address).
* DB_USERNAME the username for the database.
* DB_PW	the password for the database.
* DB the name of the database for this connection to use
* HOME default controller
* DEFAULT_PREFIX default layout 

```
Update the setting file with your local database details #### Path: berkaPhp/config/settings.php 
```
![Write your database settings](/../documentation/assets/config.png)

## Development using berkaPhp

### Model
Model represents table and are used in berkaPhp applications for data access,usually to save , retrive, update and delete data in / from a table.

Here is a simple example of a model file name and class definition.
```
File name: UsersTable.php 
```
```
Class definition
```
![Write your database settings](/../documentation/assets/model.png)

