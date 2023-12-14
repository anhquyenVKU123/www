<?php
    session_start();
    unset($_SESSION['candidate']);
    unset($_SESSION['id_candidate']);
    header('Location:/home/dang-nhap');
?>