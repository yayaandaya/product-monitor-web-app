<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Description
This is simple project using laravel to crawling and scrapping website to monitoring product price.

### How To Run This Project

> Make sure you already install mysql in your machine.

> Make sure you already install php in your machine (make sure your php minimum version is 7.0),
for easy to use i recommend you to install xampp through this link https://deac-ams.dl.sourceforge.net/project/xampp/XAMPP%20Mac%20OS%20X/7.3.29/xampp-osx-7.3.29-2-installer.dmg 

> Make sure you already install composer in your machine,
  if you don't have composer in your machine you can install through this link https://getcomposer.org/download/

##### Check php already installed on your machine
```bash
$ php -v
PHP 7.3.29 (cli) (built: Jul 23 2021 13:40:21) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.29, Copyright (c) 1998-2018 Zend Technologies
```

##### Check composer already installed on your machine
```bash
$ composer --version
Composer version 2.1.5 2021-07-23 10:35:47
```

Since the project using xampp, I recommend to put the source code inside htdocs folder.
Clone this repository into your htdocs folder

##### clone project inside htdocs folder
```bash
$ cd /your-xampp-path/htdocs
$ git clone https://github.com/yayaandaya/product-monitor-web-app.git
```

>you must copy env.example to .env (for development or production) and .env.testing (for running unit test) for database value appropriate to your database on machine

##### after that you must run composer to install all dependency
```bash
$  cd /your-xampp-path/htdocs/product-monitor-web-app
$  composer install
```

##### to install create table and default value in database you can run this script
```bash
$  cd /your-xampp-path/htdocs/product-monitor-web-app
$  php artisan migrate:refresh --seed
```

##### When using the scheduler for scrapping price, you only need to add the following Cron entry to your machine
```bash
$  * * * * * cd /your-xampp-path/htdocs/product-monitoring && php artisan schedule:run >> /dev/null 2>&1
```

### How To run unit test
##### Make sure you already all the process before then run this script.
```bash
$  cd /your-xampp-path/htdocs/product-monitor-web-app
$  ./vendor/bin/phpunit
```
