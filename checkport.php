<?php

require_once("validateBulkEmail.php");
ini_set('display_errors',1);
$validate_email=new ValidateBulkEmail();
$emails = array('mohammadali9200@gmail.com');  
var_dump($validate_email->setEmail($emails));