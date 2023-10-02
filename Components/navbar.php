<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../View/loginadmin.php"><?php if(isset($_SESSION["user"])) : ?>Déconnexion<?php else : ?>Connexion<?php endif; ?></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../View/login.php">Activités</a>
                </li>
                <?php if(isset($_SESSION["user"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../View/tableau.php">Tableau</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>