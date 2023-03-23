<?php

// name => required , string , min = 3 charachters
// email => required , email 
// password => required , string , max = 20 characters


$error = '';
$success = '';

function requiredInput($value) {
  $str = trim($value);
  if(strlen($str) > 0){
    return true;
  }
  return false;
}


// sanitize-string-inputs
function santString($value) {
  $str = trim($value); // بتقص الفراغات على يمين ويسار السترنق
  $str = filter_var($str, FILTER_SANITIZE_STRING); // بعقم او بشيل أي إشي ضار في الداتا بايس 
  return $str;
}

// sanitize-email-inputs
function santEmail($email) {
  $email = trim($email);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  return $email;
}


// minimum number 

function minInput($value,$min) {
  if(strlen($value) < $min){
    return false;
  }
  return true;
}

// maximum number 

function maxInput($value,$max) {
  if(strlen($value) > $max){
    return false;
  }
  return true;
}

// validate email 

function validEmail($email) {
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // بفحص اذا الإيميل مكتوب بشكل صحيح أم لا
    return true;
  }
  return false;
}












