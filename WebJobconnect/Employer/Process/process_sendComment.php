<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $comments = $_GET['comments'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentDay = $day->format('Y-m-d');

    $sql = "INSERT INTO binhluanqtv (IDUser,Noidung,Ngaydang,Vaitro) VALUES 
            ('".$_SESSION['id_employer']."','".$comments."','".$currentDay."','Nhà tuyển dụng')";
    $res = mysqli_query($conn,$sql);
    header('Location:/Employer/home/danh-gia-website');
?>