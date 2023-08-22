<?php
    session_start();

    if (isset($_SESSION['idMaster'])){
        unset($_SESSION['idMaster']);
    }elseif(isset($_SESSION['SIAPE'])){
        unset($_SESSION['SIAPE']);
    }elseif(isset($_SESSION['matricula'])){
        unset($_SESSION['matricula']);
    }
    header('Location: ../login.php');
?>  