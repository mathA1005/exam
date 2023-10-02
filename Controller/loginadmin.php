<?php
session_start();
include_once('../model/read.php');

$infos = readInfoAdmin($_POST['login']);


if (isset($_POST['login']) && isset($_POST['pass'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        if ($_POST['login'] == $infos['login'] && password_verify($_POST['pass'], $infos['mdp'])) {
            //die(var_dump($infos));
            $_SESSION['user'] = $infos;
            header('Location: ..\view\tableau.php');
        } else {
            header('Location: ..\view\login.php?erreur=login ou mdp faux');
        }
    } else {
        header('Location: ..\view\login.php?erreur=Login ou mdp vide');
    }
} else {
    header('Location: ..\view\login.php?erreur=variable pas bonne');
}








