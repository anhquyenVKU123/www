<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "DELETE FROM nhatuyendung WHERE IDEmployer='".$_GET['IDEmp']."'";
    mysqli_query($conn,$sql);
    header('Location:/Admin/home/danh-sach-nha-tuyen-dung');
?>