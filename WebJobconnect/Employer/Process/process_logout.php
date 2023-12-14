<?php
    session_start();
    unset($_SESSION['employer']);
    unset($_SESSION['id_employer']);
    header('Location:/home/dang-nhap');
?>