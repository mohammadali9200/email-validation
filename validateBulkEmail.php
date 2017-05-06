<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("smtpvalidateclass.php");

class ValidateBulkEmail {

    private $SMTP_Valid;
    private $result;
    private $valid_email_count;
    private $failed_email_count;
    private $email_list;
    private $failed_email_html;
    private $valided_email_html;
    private $input_email_html;

    public function __construct() {
        $this->SMTP_Valid = new SMTP_validateEmail();
        $this->valid_email_count = 0;
        $this->failed_email_counts = 0;
    }

    public function handleAjax() {

        $this->startValidation($request);
    }

    public function startValidation($request) {
        $this->validateEmails($request);
    }

    function parseEmail($inputEmail) {
        try {
            if (!empty($inputEmail)) {
                $email_list = explode("\n", $inputEmail);
                $unique_list=array_unique($email_list);
                $trimmed_array=array_map('trim',$unique_list);
                return $trimmed_array;
            }
        } catch (Exception $ex) {
            echo 'unable to parseEmail' . $ex->getMessage();
        }
    }

    function setEmail($emails) {
        // the email to validate  
        try {
            //var_dump($emails);
            return $this->SMTP_Valid->validate($emails);
        } catch (Exception $ex) {
            echo 'unable to set emails' . $ex->getMessage();
        }
    }

    function validateEmails($inputEmail) {
        try {
            $this->email_list = $this->parseEmail($inputEmail);
            $this->result = $this->setEmail($this->email_list);
            $result_copy = $this->email_list;

            foreach ($this->result as $email => $flag) {
                if ($flag == true) {
                    $this->returnValidEmailHtml($email);
                   
                    //$this->removeFromInput($result_copy, $email);
                } else {
                    $this->returnInvalidEmailHtml($email);
                    //$this->removeFromInput($result_copy, $email);
                }
                
                 $key=array_search(trim($email), $result_copy);
                 unset($result_copy[$key]);
            } 
            
            $this->returnInputHtml($result_copy);
            
            
            $this->returnAjaxResponse();
        } catch (Exception $ex) {
            
        }
    }

    function returnValidEmailHtml($email) {
        $this->valided_email_html .= $email . "\n";
    }

    function returnInvalidEmailHtml($email) {
        $this->failed_email_html .= $email . "\n";
    }
    
    function returnInputHtml($remaining_email){
        foreach ($remaining_email as $email)
            $this->input_email_html.=$email."\n";
    }

    function returnAjaxResponse() {
        $response = array();
        $response['validated'] = $this->valided_email_html;
        $response['failed'] = $this->failed_email_html;
        $response['input_email'] = $this->input_email_html;

        echo json_encode($response);
    }

    function removeFromInput(&$input_arr, $del_val) {
        $key=array_search($del_val, $input_arr);
                    unset($input_arr[$key]);
    }

}
