<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql="DELETE FROM nganhhoc WHERE nganhhoc.IDNganh=".$_GET['IDremove'];
    echo $sql;
    $res = mysqli_query($conn, $sql);

    header('Location:/Admin/home');
?>