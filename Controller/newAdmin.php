<?php
include('../model/insert.php');


if(isset($_POST['pass']) && isset($_POST['login'])){

 if(!empty($_POST['pass']) && !empty($_POST['login']) ) {


  $pass=password_hash($_POST['pass'],PASSWORD_BCRYPT);
  insertAdmin($_POST,$pass);


  header('Location: ../View/tableau.php?bravo=Vous avez ajoute un admin');

 }else{
  header('Location: ../View/tableau.php?erreur=Un ou plusieurs champs sont vides');
 }
}else{
 header('Location: ../View/tableau.php?erreur=Probleme de post');
}




 ?>
