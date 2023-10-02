<?php

function deleteAdmin($pk){
  include('connection.php');
   $query = "DELETE FROM admin WHERE pk = :pk";
   $query_params = array(':pk' => $pk);
   try{
       $stmt = $db->prepare($query);
       $result = $stmt->execute($query_params);
   }
   catch(PDOException $ex){
       die("Failed query : " . $ex->getMessage());
   }
}

function deleteEmployer(){
    include('connection.php');
    $query = "DELETE FROM employe WHERE pk = :pk";
    $query_params = array(':pk' => $_GET['userId']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}

function decreaseActivite($activityId){
    include('connection.php');
    $query = "UPDATE activites set nbParticipantActivite = nbParticipantActivite - 1 WHERE idActivite=:idActivite";
    $query_params = array(':idActivite'=>$activityId);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}

function increaseActivite(){
    include('connection.php');
    $query = "UPDATE activites set nbParticipantActivite = nbParticipantActivite + 1 WHERE idActivite=:idActivite";
    $query_params = array(':idActivite'=>$_POST['activite']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}





