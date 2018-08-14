# PromoCode - Coupons Builder

[![Build Status](https://travis-ci.org/guicunha/promocode.svg?branch=master)](https://travis-ci.org/guicunha/promocode) [![StyleCI](https://github.styleci.io/repos/144652939/shield?branch=master)](https://github.styleci.io/repos/144652939) [![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0) [![Maintainability](https://api.codeclimate.com/v1/badges/b8f37759c6a3a32ae925/maintainability)](https://codeclimate.com/github/guicunha/promocode/maintainability)
> This project is an implementation of several PHP functions, using Laravel Framework.

A brief description of your project, what it is used for.

## Installing / Getting started

To run this project you will need: 
- PHP +7.1 
- Composer
- PHPUnit
- MySQL for database (but others database can be used)

```shell
commands here
```

Here you should say what actually happens when you execute the code above.

## Developing

### Built With
        "php": "^7.1.3"
        "fideloper/proxy": "^4.0"
        "laravel/framework": "5.6.*"
        "laravel/tinker": "^1.0"
        "phpunit/php-code-coverage": "^6.0"
        "prettus/l5-repository": "^2.6"

### Prerequisites
What is needed to set up the dev environment. For instance, global dependencies or any other tools. include download links.


### Setting up Dev

Here's a brief intro about what a developer must do in order to start developing
the project further:

```shell
git clone https://github.com/guicunha/promocode.git
cd promocode/
composer self-update
composer install
```

And state what happens step-by-step. If there is any virtual environment, local server or database feeder needed, explain here.


### Deploying / Publishing
give instructions on how to build and release a new version
In case there's some step you have to take that publishes this project to a
server, this is the right time to state it.

```shell
packagemanager deploy your-project -s server.com -u username -p password
```

And again you'd need to tell what the previous code actually does.

## Versioning

We can maybe use [SemVer](http://semver.org/) for versioning. For the versions available, see the [link to tags on this repository](/tags).


## Configuration

Here you should write what are all of the configurations a user can enter when
using the project.

## Tests

Describe and show how to run the tests with code examples.
Explain what these tests test and why.

```shell
Give an example
```

## Style guide

Explain your code style and show how to check it.

## Documentation

For a complete documentation and api reference follow the link: 

https://guicunha.github.io/promocode-docs


## Database

Open-source relational MySQL +5.7 has been used.

For download it on Ubuntu Linux run
```shell
sudo apt-get update
sudo apt install mysql-server
```

For Windows download de executable by link:

https://dev.mysql.com/downloads/installer/
 
 The solution is using Laravel Migration to fast adoption, but in some cases you will need a file **.sql** with the database scheme. The scheme can be downloaded in the link:
 
 https://guicunha.github.io/promocode-docs/database-scheme

## Licensing

State what the license is and how to find the text version of the license.
