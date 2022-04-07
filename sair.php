<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['senha_user']);              
    header('Location: index.php');

?>