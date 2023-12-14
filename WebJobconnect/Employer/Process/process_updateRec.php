<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");

    //Lấy ngày đăng
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentday = $day->format('Y-m-d');

    //Lấy thông tin từ form
    $name = $_GET['name'];
    $industry = $_GET['industry'];
    $diploma = $_GET['diploma'];
    $worktype = $_GET['worktype'];
    $position = $_GET['position'];
    $number = $_GET['number'];
    $salary = $_GET['salary'];
    $expDate = $_GET['expDate'];
    $exp = $_GET['exp'];
    $detail = $_GET['detail'];
    $skill = $_GET['skill'];
    $district = $_GET['district'];
    $detailAddress = $_GET['detailAddress'];
    $city = $_GET['city'];
    $address = $detailAddress.', '.$district.', '.$city;
    $contact = $_GET['contact'];

    $sql = "UPDATE tintuyendung SET 
            TenTin='".$name."', Nganh='".$industry."', Vitri='".$position."', MucLuong='".$salary."',
            LoaiCV='".$worktype."',Soluongtuyen=".$number.", Mota='".$detail."', Kinang='".$skill."', 
            Kinhnghiem='".$exp."', HocVan='".$diploma."', Ngayhethan='".$expDate."', 
            Ngaydang='".$currentday."', Diadiem='".$address."' WHERE IDTin='".$_GET['IDRec']."'";
    $res = mysqli_query($conn,$sql);
    echo '<script>window.history.go(-1);</script>';
?>