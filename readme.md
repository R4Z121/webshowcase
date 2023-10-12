# WEBSHOWCASE

An application to show off your web project to other people, or to find web design inspiration for your under development web project. First, you need to register an account then login to application, then you can post your deployed web project so other users can see it. This app also show how many users that liked your post, and you can save other users post to favorite collections.

## Built With
![Code-Igniter 3](https://img.shields.io/badge/CodeIgniter-%23EF4223.svg?style=for-the-badge&logo=codeIgniter&logoColor=white)

![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

## Getting Started

Here are steps to install and run this project to your computer locally :

### Server Requirements

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

### Installation

1. Clone the repo

	```
	git clone https://github.com/R4Z121/webshowcase.git
 	```

2. Create database with name 'webshowcase' in phpmyadmin
3. import webshowcase.sql in root folder to webshowcase database in phpmyadmin
4. Open application/config/database.php search for $db['default'] configuration, then change with your database configuration
5. Run app in localhost:[port]/webshowcase
