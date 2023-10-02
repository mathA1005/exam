<?php
session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]){
    session_destroy();
}

$jumbotron = "Connexion admin";

?>
<?php require_once '../Structure/header.php'; ?>
<?php require_once '../Components/navbar.php'; ?>

<?php require_once '../Components/jumbotron.php'; ?>
<div class="container">
    <form action="../Controller/loginadmin.php" method="post">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input name="login" type="text" class="form-control" placeholder="login">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="pass" type="password" class="form-control" placeholder="password">
        </div>
        <button type="submit" class="btn btn-secondary">Envoyer</button>
    </form>
</div>
<?php require_once '../Structure/footer.php'; ?>

