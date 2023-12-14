<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");  
    //Tạo id nhà tuyển dụng
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idEmployer = substr(str_shuffle($string), 0, 15);
        //Kiểm tra id có bị trùng không
        $sql = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$idEmployer."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $idAdmin = substr(str_shuffle($string), 0, 15);
            $sql = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$idEmployer."'";
            $res = mysqli_query($conn,$sql);
        }

    //Tạo id tài khoản cho nhà tuyển dụng
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idaccount = substr(str_shuffle($string), 0, 10);
        //Kiểm tra id tài khoản có bị trùng không
        $sql = "SELECT * FROM accountqt WHERE IDTaikhoan='".$idaccount."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
            $idaccount = substr(str_shuffle($string), 0, 10);
            $sql = "SELECT * FROM accountqt WHERE IDTaikhoan='".$idaccount."'";
            $res = mysqli_query($conn,$sql);
        }
    
    //Lấy dữ liệu từ form
    $nameComp = $_GET['nameComp'];
    $email = $_GET['email'];
    $dateFoundation = $_GET['dateFoundation'];
    $ceo = $_GET['ceo'];
    $district = $_GET['district'];
    $detailAddress = $_GET['detailAddress'];
    $city = $_GET['city'];
    $address = $detailAddress.', '.$district.', '.$city;
    $industry = $_GET['industry'];
    
    //Thêm dữ liệu vào bảng nhatuyendung
    $sql = "INSERT INTO nhatuyendung (IDEmployer,NameCompany,CEO,DateFoundation,Email,Address,Industry,IDTaikhoan) VALUES ('".
            $idEmployer."','".$nameComp."','".$ceo."','".$dateFoundation."','".$email."','".$address."','".$industry."','".$idaccount."')";
    $res = mysqli_query($conn,$sql);

    //Thêm tài khoản nhà tuyên dụng vào bảng accountqt
    $sql = "INSERT INTO accountqt (IDTaikhoan,Tendangnhap,Matkhau,Vaitro) VALUES ('".
            $idaccount."','".$_GET['username']."','".$_GET['password']."','Nhà tuyển dụng')";
    $res = mysqli_query($conn,$sql);
    header('Location:/home/dang-nhap');
?>