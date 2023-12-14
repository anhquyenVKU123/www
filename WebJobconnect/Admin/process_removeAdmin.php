<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "DELETE FROM quantrivien WHERE quantrivien.IDQuantri='".$_GET['IDAdmin']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Admin/home/danh-sach-quan-tri-vien');
?>