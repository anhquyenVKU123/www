<?php
    $id = $_GET['IDupdate'];
//Lấy các thông tin form gửi tới
    $nameEng = $_POST['nameEng'];
    $nameViet = $_POST['nameViet'];
    $abbreviate = $_POST['abbreviate'];
    $describe = $_POST['textarea'];
//Lấy tên ảnh được gửi đến
    $image  = $_FILES['image']['name'];
    $target ="image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "UPDATE nganhhoc SET Tentienganh='".$nameEng."', Tentiengviet='".$nameViet."', Viettat='".$abbreviate."', Hinhanh='".$image."', Mota='".$describe."' WHERE IDNganh=".$id;
    $res = mysqli_query($conn,$sql);
    
    header('Location:/Admin/home/nganh-linhvuc/chi-tiet-nganh-linh-vuc/'.$id);
?>