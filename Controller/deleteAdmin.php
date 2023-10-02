<?php
include('../model/delete.php');

deleteAdmin($_POST['pk']);

header('Location: ../view/admin.php');

?>
