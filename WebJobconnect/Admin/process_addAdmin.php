<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");  

    //Tạo id quản trị
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idAdmin = substr(str_shuffle($string), 0, 15);
        //Kiểm tra id có bị trùng không
        $sql = "SELECT * FROM quantrivien WHERE IDQuantri='".$idAdmin."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $idAdmin = substr(str_shuffle($string), 0, 15);
            $sql = "SELECT * FROM quantrivien WHERE IDQuantri='".$idAdmin."'";
            $res = mysqli_query($conn,$sql);
        }

    //Tạo id tài khoản cho quản trị viên
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

    //Tạo mã giới thiệu
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $referralCode= substr(str_shuffle($string), 0, 15);
        //Kiểm tra mã giới thiệu có bị trùng không
        $sql = "SELECT * FROM quantrivien WHERE MaGioithieu='".$referralCode."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $referralCode= substr(str_shuffle($string), 0, 15);
            $sql = "SELECT * FROM quantrivien WHERE MaGioithieu='".$referralCode."'";
            $res = mysqli_query($conn,$sql);
        }

    //Kiểm tra xem mã giới thiệu có đúng không
    $inputReferralCode = $_GET['referralCode'];
    $sql = "SELECT * FROM quantrivien WHERE MaGioithieu='".$inputReferralCode."'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) <= 0){
        $error = "Mã giới thiệu không tồn tại";
        echo $inputReferralCode;
        header("Location:/home/dang-ki/".$error);
    } else {
        //Lấy dữ liệu từ form
        $fullname = $_GET['fullname'];
        $email = $_GET['email'];
        $numberphone = $_GET['numberphone'];
        $birthday = $_GET['birthday'];
        $gender = $_GET['gender'];
        $district = $_GET['district'];
        $detailAddress = $_GET['detailAddress'];
        $city = $_GET['city'];
        $address = $detailAddress.', '.$district.', '.$city;
        $university = $_GET['university'];
        $level = $_GET['level'];

        //Thêm vào bảng quantrivien
        $sql = "INSERT INTO quantrivien (IDQuantri,Hovaten,Gioitinh,Ngaysinh,SDT,Email,Diachi,IDTruong,Chuyenmon,IDTaikhoan,MaGioithieu) VALUES ('".
                $idAdmin."','".$fullname."','".$gender."','".$birthday."','".$numberphone."','".$email."','".$address."','".$university."','".$level."','".$idaccount."','".$referralCode."')";
        $res = mysqli_query($conn,$sql);

        //Thêm vào bảng accountqt
        $sql = "INSERT INTO accountqt (IDTaikhoan,Tendangnhap,Matkhau,Vaitro) VALUES ('".
                $idaccount."','".$_GET['username']."','".$_GET['password']."','Quản trị viên')";
        $res = mysqli_query($conn,$sql);
        header('Location:/home/dang-nhap/');
    }
?>