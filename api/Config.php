<?php
//define system email
define("system_mail","zoho");
define("zoho_token", "");//this get string from zoho
define("zoho_zoid", "");
define("zoho_domain", "domainname.com");

// this config connect database
DB::$host = 'localhost'; //defaults to localhost if omitted
DB::$user = ' ';
DB::$password = '';
DB::$dbName = '';
DB::$port = '3306'; // defaults to 3306 if omitted
DB::$encoding = 'utf8'; // defaults to latin1 if omitted

