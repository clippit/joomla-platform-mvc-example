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
* All the codes except `index.php` are in `protected` direcotory which can restrict to access easily
* Configuration file is JSON format
* Simple URL router which dispatch different requests to different controllers

Todos
-----
* Simple model layer
* Simple view layer with template support