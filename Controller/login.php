<?php
//include_once('loginadmin.php');
include_once('function copie.php');
include_once('../model/insert.php');
include_once('../model/read.php');
include_once('../model/update copie.php');
include_once('../model/delete.php');

if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['codePostal'])&& isset
    ($_POST['moyenDeTransport'])&& isset($_POST['departement'])&& isset($_POST['activite'])&& isset($_POST['souper']) &&
    $_POST["codePostal"] !== "-1" && $_POST["moyenDeTransport"] !== "-1"&& $_POST["departement"] !== "-1" && $_POST["activite"] !== "-1"){

    if(!empty($_POST['nom']) && !empty($_POST['prenom'])&& !empty($_POST['email'])&& !empty($_POST['codePostal'])
        && !empty($_POST['moyenDeTransport'])   && !empty($_POST['departement'])  && !empty($_POST['souper'])&& !empty($_POST['activite'])) {
         $reponse = checkEmail($_POST['email']);
        if(!$reponse){
            //Récupérer un utilisateur avec un nom et prénom du post
            $user = readUserWithLastNameAndFirstName();
            //var_dump(empty($_POST["id"]));
            //die(var_dump($_POST));
            //Vérifier si l'utilisateur existe
            if ($user and !empty($_POST["id"])){
                //Si il existe => Update l'user
                decreaseActivite($user["fk_activite"]);
                updateUser();
                increaseActivite();
                header('Location: ../View/login.php?userId='. $_POST["id"] .'&bravo=Utilisateur modifié');
            }elseif ($user and empty($_POST["id"])){
                header('Location: ../View/login.php?erreur=Tu as déjà choisis une activité');
            }
            else{
                //Si il n'existe pas on le crée
                insertEmploye();
                header('Location: ../View/login.php?bravo=Tu es inscrit');
            }
         }else{

            header('Location: ../View/login.php?erreurMail=email incorrect');
         };

        }else{
            header('Location: ../View/login.php?erreur=Un ou plusieurs champs sont vides');
        }
    }else{
        header('Location: ../View/login.php?erreur=Tu dois choisir parmi les choix');
    }








?>
