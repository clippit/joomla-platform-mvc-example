Joomla! Platform MVC Example
============================

A simple example using MVC layout of latest Joomla! Platform.

Installation
------------

Clone or Download Joomla Platform into `joomla` directory and this repository under the same parent.

    mkdir playground
    cd playground
    git clone https://github.com/joomla/joomla-platform.git joomla
    git clone https://github.scm.corp.ebay.com/letzhang/joomla-platform-mvc-example.git


Features
--------
* Bootstrap for Web Application
* Use `mod_rewrite` in Apache httpd for single entry point
* All the codes except `index.php` are in `protected` directory which can restrict to access easily
* Configuration file is JSON format
* SQLite database back-end
* A very very rough and weak model inspired by Active Record
* Simple URL router which dispatch different requests to different controllers


Configuration
-------------
You can refer `protected/config/main.dist.json` and copy it into `main.json` for your own changes.


Notes
-----
The MVC framework of Joomla! Platform is quite lightweight.

* There is no ORM pattern or something else. It only provides simple wrapper for SQL query.
* Controllers only support one executable task per class via the `execute` method. It's different from some other frameworks which provide two-layer "Controller-Action" support.


Todos
-----
* Simple view layer with template support