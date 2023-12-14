<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $idcomment = $_GET['IDComment'];
    $reply = $_GET['reply'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentDay = $day->format('Y-m-d');

    $sql = "INSERT INTO phanhoiuv (IDComment,IDQuantri,Noidung,Ngaydang) VALUES 
            ($idcomment,'".$_SESSION['id_admin']."','".$reply."','".$currentDay."')";
    echo $sql;
    $res = mysqli_query($conn,$sql);
    header('Location:/Admin/home/phan-hoi-ung-vien');
?>