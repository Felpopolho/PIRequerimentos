<?php
    session_start();
    unset($_SESSION['siape']);
    header('Location: ../login.php');
?>  