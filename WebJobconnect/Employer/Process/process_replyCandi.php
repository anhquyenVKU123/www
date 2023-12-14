<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $idcomment = $_GET['IDComment'];
    $reply = $_GET['reply'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentDay = $day->format('Y-m-d');

    $sql = "INSERT INTO phanhoitintuyendung (IDComment,Noidung,Ngaydang) VALUES 
            ($idcomment,'".$reply."','".$currentDay."')";
    $res = mysqli_query($conn,$sql);

    $sql = "UPDATE binhluantintuyendung SET Tinhtrang='Đã xem' WHERE IDComment =".$idcomment;
    $res = mysqli_query($conn,$sql);
    echo '<script>window.history.go(-1);</script>';
?>