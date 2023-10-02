<?php

if(!isset($_SESSION["user"])){
    header('Location: ../View/login.php');
}

?>


<form action="../Controller/newAdmin.php" method="post">
    <h1>Ajout d'un administrateur</h1>
    <div class="mb-3">
        <label class="form-label">Login</label>
        <input name="login" type="text" class="form-control" placeholder="login">
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de Passe</label>
        <input name="pass" type="password" class="form-control" placeholder="Mot de Passe">
    </div>

    <button type="submit" class="btn btn-secondary">Envoyer</button>

</form>


<?php
include_once('../model/read.php');



?>
