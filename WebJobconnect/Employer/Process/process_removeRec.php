<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $sql= "DELETE FROM tintuyendung WHERE tintuyendung.IDTin = '".$_GET['IDRec']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Employer/home/danh-sach-tin-tuyen-dung');
?>