<?php

function readInfoAdmin($login){
  include_once('connection.php');
   $query = "SELECT * FROM admin WHERE login = :login";
   $query_params = array(':login' => $login);
   try{
       $stmt = $db->prepare($query);
       $result = $stmt->execute($query_params);
   }
   catch(PDOException $ex){
       die("Failed query : " . $ex->getMessage());
   }
   $result = $stmt->fetch();
   return $result;
}

function readCodePostal(){
    include('connection.php');
    $query = "select * from codepostal";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}

function readLocomotion(){
    include('connection.php');
    $query = "select * from locomotion";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}

function readActivite(){
    include('connection.php');
    $query = "SELECT * FROM `activites` WHERE nbParticipantActivite < nbMaxActivite";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}
function readDepartement(){
    include('connection.php');
    $query = "SELECT * FROM `departement`";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}
function filterEmployes(){
    include('connection.php');
    $query = "SELECT *
 from employe
 inner join activites on fk_activite= idActivite
 inner join codepostal on fk_cp= idCP
 inner join locomotion on fk_locomotion= idLoc
  inner join departement on fk_departement= idDepartement WHERE fk_activite = :activite";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute([
            'activite' => $_POST["choixActivite"]
        ]);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}
function readEmployes(){
    include('connection.php');
    $query = "SELECT *
 from employe
 inner join activites on fk_activite= idActivite
 inner join codepostal on fk_cp= idCP
 inner join locomotion on fk_locomotion= idLoc
  inner join departement on fk_departement= idDepartement";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchall();
    return $result;
}


function readUserWithLastNameAndFirstName(){
    include('connection.php');
    $query = "SELECT * FROM `employe` WHERE nom = :nom AND prenom = :prenom";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute([
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"]
        ]);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetch();
    return $result;
}


function readUserWithId(){
    include('connection.php');
    $query = "SELECT * FROM `employe` WHERE pk = :id";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute([
            'id' =>$_GET['userId']
        ]);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetch();
    return $result;
}


?>