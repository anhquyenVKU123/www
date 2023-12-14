<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $sql= "DELETE FROM hosotuyendung WHERE hosotuyendung.IDHoSo = '".$_GET['IDHoso']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Candidate/home');
?>