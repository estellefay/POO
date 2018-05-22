#!/bin/bash
vagrant ssh 
sudo apt-get update 
sudo apt-get install apache2 #install apache2 
sudo apt-get install php7.0 #Install PHP 7.0
sudo apt-get install libapache2-mod-php7.0 # liée php et apache2 
sudo service apache2 restart # restart apache2 


