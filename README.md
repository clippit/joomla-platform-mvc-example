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

* There is a `JTable` class providing support for [Active Record Pattern](http://en.wikipedia.org/wiki/Active_record_pattern) but it's not involved with `JModel` by default. I wrote a simple model class which extends `JTable`.
* Controllers only support one executable task per class via the `execute` method. It's different from some other frameworks which provide two-layer "Controller-Action" support.


Todos
-----
* Simple view layer with template support


Thanks
------
* Great work by Louis Landry: https://github.com/LouisLandry/pulltester/
* A project from GSoC this year: https://github.com/stefanneculai/Web-service-API/