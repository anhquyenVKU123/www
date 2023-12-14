<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $comments = $_GET['comments'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentDay = $day->format('Y-m-d');

    $sql = "INSERT INTO binhluantintuyendung (IDTin,IDUngvien,Noidung,Ngaydang,Tinhtrang) VALUES 
            ('".$_GET['IDRec']."','".$_SESSION['id_candidate']."','".$comments."','".$currentDay."','Chưa xem')";
    $res = mysqli_query($conn,$sql);
    header('Location:/Candidate/home/chi-tiet-tin-tuyen-dung/'.$_GET['IDRec']);
?>