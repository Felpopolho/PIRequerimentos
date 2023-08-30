<?php
    session_start();
    unset($_SESSION['idMaster']);
    header('Location: ../login.php');
?>  