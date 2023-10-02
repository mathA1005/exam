<?php
include("../model/update copie.php");

updateAdmin($_POST, $_GET['pk']);

header('Location: ../view/admin.php');

 ?>
