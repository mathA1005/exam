<?php
session_start();

include_once('../model/read.php');
include_once ('../Model/delete.php');

if(isset($_GET['userId'])){
    $activityId = $_GET['activite'];
    decreaseActivite($activityId);
    deleteEmployer();
}

$employers = readEmployes();

if(isset($_POST["choixActivite"])){
    if($_POST["choixActivite"] === "-1"){
        $employers = readEmployes();
    }else{
        $employers=filterEmployes();
    }
}


//si y aucun utilisateur connecté => redirige vers login
if(!isset($_SESSION["user"])){
    header('Location: ../View/login.php');
}

$jumbotron = "Tableau des employés";


?>
<style>
    .myLink {
        text-decoration: none;
    }
</style>
<?php require_once '../Structure/header.php'; ?>
<?php require_once '../Components/navbar.php'; ?>
<?php require_once '../Components/jumbotron.php'; ?>

<div class="container">
    <?php if(isset($_GET["bravo"])) : ?>
        <div class="alert alert-success" role="alert"><?= $_GET["bravo"] ?></div>
    <?php endif; ?>
    <?php if(isset($_GET["erreur"])) : ?>
        <div class="alert alert-danger" role="alert"><?= $_GET["erreur"] ?></div>
    <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <select name="choixActivite" class="form-select">
                    <option value="-1" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "-1") : ?>selected<?php endif;?>>Toutes les activités</option>
                    <option value="1" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "1") : ?>selected<?php endif;?>>Cuisine</option>
                    <option value="3" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "3") : ?>selected<?php endif;?>>course de Karting</option>
                    <option value="2" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "2") : ?>selected<?php endif;?>> simulation courses</option>
                    <option value="4" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "4") : ?>selected<?php endif;?>>Escape Game</option>
                    <option value="5" <?php if(isset($_POST["choixActivite"]) && $_POST["choixActivite"]=== "5") : ?>selected<?php endif;?>>Ne participe pas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Choisir</button>
        </form>


    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>mail</th>
            <th>Code Postal</th>
            <th>Locomotion</th>
            <th>Departement</th>
            <th>Souper</th>
            <th>Modifier/Supprimer</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($employers as $employer) : ?>
        <tr>
                <td><?= $employer["nom"] ?></td>
                <td><?= $employer["prenom"] ?> </td>
                <td><?= $employer["mail"] ?> </td>
                <td><?= $employer["numCP"] ?></td>
                <td><?= $employer["nomLoc"] ?></td>
                <td><?= $employer["nomDepartement"] ?></td>
                <td><?= $employer["souper"] ?></td>
            <td>
                <a class="myLink" href="login.php?userId=<?= $employer['pk']?>">
                    <button class="btn btn-primary">Modifier</button>
                </a>
                <a class="myLink" href="tableau.php?activite=<?= $employer['fk_activite']?>&userId=<?= $employer['pk']?>">
                    <button class="btn btn-danger">Supprimer</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>


    </table>
    <?php if(empty($employers)) : ?>
        <h3>Il n'y a personne pour cette activité</h3>
    <?php endif ?>

    <?php require_once "admin.php";?>

</div>
<?php require_once '../Structure/footer.php'; ?>


