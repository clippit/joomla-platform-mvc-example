Joomla! Platform MVC Example
============================

This is a simple example using MVC layout of latest Joomla! Platform(12.1+). Since the official documents of Joomla! Platform are too weak, I hope this example can help people get familiar with the great development framework. Actually I'm new to this framework too, so if you had some advices please let me know without hesitation.

Features
--------
* Single entry point for Web Application
* All the codes except `index.php` are in `protected` directory which can restrict to access easily
* Configuration file is JSON format
* SQLite database back-end
* A very rough and weak model inspired by Active Record using `JTable`
* Simple URL router which dispatch different requests to different controllers
* PHP-based template views using `JDocument`
* Two-pass rendering process, first partial view then the whole page
* Simple example for using the event dispatcher


Installation
------------

Clone or Download Joomla Platform into `joomla` directory and this repository under the same parent.

    mkdir playground
    cd playground
    git clone https://github.com/joomla/joomla-platform.git joomla
    git clone https://github.scm.corp.ebay.com/letzhang/joomla-platform-mvc-example.git


Configuration
-------------
You can refer `protected/config/main.dist.json` and copy it into `main.json` for your own changes.


Notes
-----
The new MVC framework of Joomla! Platform is quite lightweight.

* There is a `JTable` class providing support for [Active Record Pattern](http://en.wikipedia.org/wiki/Active_record_pattern) but it's not involved with `JModel` by default. I wrote a simple model class which extends `JTable`.
* Controllers only support one executable task per class via the `execute` method. It's different from some other frameworks which provide two-layer "Controller-Action" support.
* The View is responsible for focusing on one model. To gathering the partial contents and redering the whole page, you can use `JDocument`. You can see the View layer is not so flexible.


Thanks
------
* Pull Tester by Louis Landry: https://github.com/LouisLandry/pulltester/
* A project from GSoC 2012: https://github.com/stefanneculai/Web-service-API/