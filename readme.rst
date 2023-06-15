###################
Republic of Benin Evaluation Process Management Platform
###################

Design and Development of the Evaluation Process Management Platform in Benin 
on behalf of the Office for the Evaluation of Public Policies and the Analysis 
of Government Action with the technical and financial support of UNICEF.

*******************
Production
*******************

The platform is accessible at https://evaluation.gouv.bj


*******************
Server Requirements
*******************

PHP Framework CodeIgniter 3.1 is used for the development

PHP version 5.6 or newer is recommended.

Mysql or MariaDB is required

************
Installation
************

1- Import the SQL File (beppaag.sql) in the repository directory to a blank Mysql/MariaDB database.

2- Change the parameters in config.php (application >> config >> config.php) accordingly, especially the BASE_URL

3- Edit the database paremeters in database.php (application >> config >> database.php) accordingly using your 
mysql/mariadb parameters

You are set to go !

************
Usage
************

The platform is accessible at the defined <BASE_URL>

The admin area is accessible at <BASE_URL>/admin with the following credentials

email : admin@admin.com
password : password

Enjoy !
