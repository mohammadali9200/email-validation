<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 0);
require_once("validateBulkEmail.php");

if (!empty($_REQUEST['input_email'])) {
    $validate_email = new ValidateBulkEmail();
    $validate_email->startValidation($_REQUEST['input_email']);
} else
    echo "Please verify you input parameters";
