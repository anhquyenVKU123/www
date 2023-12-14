<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");

    $sql = "SELECT*FROM hosotuyendung WHERE IDHoSo='".$_SESSION['idhs']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);

    $sql1 = "SELECT*FROM tintuyendung WHERE IDTin='".$row['IDTin']."'";
    $res1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($res1);
    if ($_GET['Tinhtrang'] == "yes") {

        if ($row1['Soluongtuyen'] >= $row['Duyet']) $duyet = $row1['Duyet'] + 1;

        $sql2 = "UPDATE tintuyendung SET Duyet=".$duyet." WHERE IDTin='".$row1['IDTin']."'";
        $res2 = mysqli_query($conn,$sql2);

        $sql3 = "UPDATE hosotuyendung SET Tinhtrang='Chấp nhận' WHERE IDHoSo='".$_SESSION['idhs']."'";
        echo $sql3;
        $res3 = mysqli_query($conn,$sql3);


        header('Location:/Employer/home/danh-sach-don-ung-tuyen/thong-tin-chi-tiet/'.$_SESSION['idhs']);
    } else {
        $sql = "UPDATE hosotuyendung SET Tinhtrang='Từ chối' WHERE IDHoSo='".$_SESSION['idhs']."'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($res)
        if ($row['Duyet'] > 0) $duyet = $row['Duyet'] - 1;
        $sql2 = "UPDATE tintuyendung SET Duyet=".$duyet." WHERE IDTin='".$row1['IDTin']."'";
        mysqli_query($conn,$sql2);
        header('Location:/Employer/home/danh-sach-don-ung-tuyen/thong-tin-chi-tiet/'.$_SESSION['idhs']);
    }
?>
