# restoFinder

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

For the development of the web application I chose a lightweight framework: 
Lumen framework, the little brother of laravel framework, usually used to create API Rest server.   
I used version 5.5 of Lumen which requires a version of php superior or equal to 5.6.4.  

I also used:    
-	*Composer* to set up the Lumen framework  
-	*Bower* for all the JS/CSS components 
-	*JQuery v 3.2.1* : For the JavaScript coding part     
-	*Bootstrap v 3.3.7*: For the CSS and the HTML (Grid, Form…)   

I didn’t use a database for this web application, all the data are coming from JSON file.    

## HOW TO USE IT:  

### Requirement:    
-	Apache Server (LAMP, LEMP…)     
-	Php version superior or equal to 7.1.* 
-       phpunit ^6
-	Browser (Chrome/ Firefox/IE11)  
### Steps:  
-	Unzip the archive / clone the repository    
-	Copy the restoFinder web application folder in your web folder (exp /var/www/html/)     
-	Create a Vhost that point to the restoFinder/public folder      
-       Under the root folder of the web app use the terminal to run : *composer install*   
        ==> This will install all the libraries and dependencies the framework needs    
-       Under the folder /public /assets/ use the terminal to run : *bower install*     
        ==>This will install all the front libraries use in the web application

## Unit tests:      
- Testing application and Api requests

Run :   
 ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/RestoFinderTest 
