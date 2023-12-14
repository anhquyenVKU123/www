<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");  
    $sql = "DELETE FROM tintuc WHERE IDNews='".$_GET['IDNews']."'";
    mysqli_query($conn,$sql);
    header('Location:/Admin/home/danh-sach-tin-tuc');
?>