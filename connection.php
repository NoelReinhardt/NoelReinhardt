<?php 
/* Variable Declaration */
$DB_HOST   = "localhost";
$DB_USER   = "root";
$DB_PASS   = "root";
$DB_NAME   = "product";
$baseUrl   = "http://localhost:8888/eufeme/public/";
$loader    = $baseUrl."/img/product/";

/* Include the class script */
include __dir__."/class.php";

/* Class Calling */
$db     = new db;
$input  = new input;