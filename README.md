# DeveloperTest

Demo Shop using given dataset
Made using MVC pattern with PHP

Works when there is Database '30hills' set in phpMyAdmin with table 'products' 
(SQLQuery in database for setting table:
CREATE TABLE products(
id	varchar(15)	NOT NULL,
name text  NOT NULL,
description	text NOT NULL,
features text NOT NULL,
price decimal(10,0) NOT NULL,
keywords text NOT NULL,
url	text NOT NULL,	
category text NOT NULL,	
subcategory	text NOT NULL,
images	text DEFAULT NULL
); 
)
Then with product-seeder.php all data should load in database
