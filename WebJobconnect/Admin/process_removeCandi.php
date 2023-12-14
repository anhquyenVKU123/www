<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "DELETE ungvien, binhluantintuyendung, hosotuyendung, accountqt
                FROM ungvien 
                WHERE IDUngvien='".$_GET['IDCandi']."'";
    mysqli_query($conn,$sql);
    header('Location:/Admin/home/danh-sach-ung-vien');
?>