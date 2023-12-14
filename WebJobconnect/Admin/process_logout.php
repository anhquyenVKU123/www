<?php
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['id_admin']);
    header('Location:/home/dang-nhap');
?>