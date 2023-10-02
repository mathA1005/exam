<?php

function checkHtml($data){
  foreach ($data as $key => $value) {
    $data[$key]= htmlspecialchars(trim($value));
  }
  return $data;
}


function checkEmpty($data){
  $error=array();
  foreach ($data as $key => $value) {
    if(empty($value)){
      $error[$key]='le champ est vide';
    }
  }
  return (!empty($error)) ? $error : false;
}

function checkEmptyOptional($data){
  $error=array();
  foreach ($data as $key => $value) {
    if(empty($value) && $key != 'tag'){
      $error[$key]='le champ est vide';
    }
  }
  return (!empty($error)) ? $error : false;
}

function checkIsset($data){
  $error=array();
  foreach ($data as $key => $value) {
    if(!isset($data[$key])){
      $error[$key]='la variable n\'existe pas';
    }
  }
  return (!empty($error)) ? $error : false;
}


function checkEmail($data){
  $error="";
  //foreach ($data as $key => $value) {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
      $error='Ce mail est pas bon !';
    }
  //}
  return (!empty($error)) ? $error : false;
}

// compare le nombre d'éléments du tableau après etre passer dans array_unique qui enlève les doublons d'un tableau
function arrayDoublons($data){
  return (count($data) == count(array_unique($data))) ? true : false;
}

function calculTotal($data, $nbJoueurs){
  $result = 0;
  foreach ($data as $key => $value) {
    $result += $value;
  }
  return $result+($nbJoueurs*25);
}


 ?>
