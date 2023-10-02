<?php
session_start();
include_once('../model/read.php');
$codePostaux = readCodePostal();

$locomotions = readLocomotion();
$departements = readDepartement();
$activites = readActivite();

if(isset($_GET['userId'])){
    $user = readUserWithId();
}

$jumbotron = "Choisis une activité";

?>

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
    <form action="../Controller/login.php" method="post">
            <input  name="id" type="hidden" <?php if(isset($user)) : ?> value="<?= $user["pk"] ?>" <?php endif; ?>>
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input name="nom" type="text" class="form-control" placeholder="Nom" <?php if(isset($user)) : ?> value="<?= $user["nom"] ?>" readonly <?php endif; ?> required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prenom</label>
                <input name="prenom" type="text" class="form-control" placeholder="Prenom"<?php if(isset($user)) : ?> value="<?= $user["prenom"] ?>" readonly <?php endif; ?>required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Votre e-mail"<?php if(isset($user)) : ?> value="<?= $user["mail"] ?>" readonly<?php endif; ?> required />
                <?php if(isset($_GET["erreurMail"])) : ?><small class="text-danger"><?= $_GET["erreurMail"] ?></small><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Code postal</label>
                <select name="codePostal" class="form-select">
                    <option  value="-1" >Choisis une option</option>
                    <?php foreach ($codePostaux as $codePostal) : ?>
                        <option  value="<?= $codePostal["idCP"] ?>" <?php if(isset($user) && $codePostal["idCP"] === $user["fk_cp"]) : ?>selected<?php endif; ?> ><?= $codePostal["numCP"] ?> </option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Moyen locomotion</label>
                <select name="moyenDeTransport" class="form-select">
                    <option  value="-1" >Choisis une option</option>
                    <?php foreach ($locomotions as $locomotion) : ?>
                        <option  value="<?= $locomotion["idLoc"] ?>" <?php if(isset($user) && $locomotion ["idLoc"] === $user["fk_locomotion"]) : ?>selected<?php endif; ?>  ><?= $locomotion["nomLoc"] ?> </option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Département</label>
                <select name="departement" class="form-select">
                    <option  value="-1" >Choisis une option</option>
                    <?php foreach ($departements as $departement) : ?>
                        <option  value="<?= $departement["idDepartement"] ?>" <?php if(isset($user) && $departement ["idDepartement"] === $user["fk_departement"]) : ?>selected<?php endif; ?> ><?= $departement["nomDepartement"] ?> </option>

                    <?php endforeach; ?>
                </select>
            </div>
        <div class="mb-3">
            <label class="form-label">Choix activité</label>
            <select name="activite" class="form-select">
                <option  value="-1" >Choisis une option</option>
                <?php foreach ($activites as $activite) : ?>
                    <option  value="<?= $activite["idActivite"] ?>" <?php if(isset($user) && $activite ["idActivite"] === $user["fk_activite"]) : ?>selected<?php endif; ?> ><?= $activite["nomActivite"] ?> </option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Souper</label>
            <select name="souper" class="form-select">
                <option value="oui" <?php if(isset($user) && "oui" === $user["souper"]) : ?>selected<?php endif; ?> >Oui</option>
                <option value="non" <?php if(isset($user) && "non" === $user["souper"]) : ?>selected<?php endif; ?> >Non</option>

            </select>
        </div>

        <button class="btn btn-primary" type="submit"><?php if(isset($user)) : ?>Modifier<?php else : ?>Inscription<?php endif; ?></button>
    </form>
</div>
<?php require_once '../Structure/footer.php'; ?>