<?php
    session_start();
?>
<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");  

    $id = mt_rand(1, 9);
    for ($i = 0; $i < 9; $i++) {
        $id .= rand(0, 9);
    }
    //Kiểm tra id có bị trùng không
    $sql = "SELECT * FROM ungvien WHERE IDUngvien='".$id."'";
    $res = mysqli_query($conn,$sql);
    while (mysqli_num_rows($res) > 0){
        $id = mt_rand(1, 9);
        for ($i = 0; $i < 9; $i++) {
            $id .= rand(0, 9);
        }
        $sql = "SELECT * FROM ungvien WHERE IDUngvien='".$id."'";
        $res = mysqli_query($conn,$sql);
    }

    //Thêm thông tin cá nhân vào CSDL
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
    $industry =$_GET['industry'];

    //Thêm tài khoản vào CSDL
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // Chuỗi ký tự gồm chữ hoa và số
    $idaccount = substr(str_shuffle($string), 0, 10); // Lấy 10 ký tự đầu tiên

    //Kiểm tra id tài khoản có bị trùng không
    $sql = "SELECT * FROM accountqt WHERE IDTaikhoan='".$idaccount."'";
    $res = mysqli_query($conn,$sql);
    while (mysqli_num_rows($res) > 0){
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
        $idaccount = substr(str_shuffle($string), 0, 10);
        $sql = "SELECT * FROM accountqt WHERE IDTaikhoan='".$idaccount."'";
        $res = mysqli_query($conn,$sql);
    }
    $sql = "INSERT INTO accountqt (IDTaikhoan,Tendangnhap,Matkhau,Vaitro) VALUES ('".$idaccount."','".$_GET['username']."','".$_GET['password']."','Ứng viên')";
    $res = mysqli_query($conn,$sql);

    $sql = "INSERT INTO ungvien (IDUngvien,Hovaten,Ngaysinh,SDT,Email,Gioitinh,Diachi,IDTruong,Nganhhoc,IDTaikhoan) VALUES (
        '".$id."', '".$fullname."', '".$birthday."', '".$numberphone."','".$email."','".$gender."','".$address."','".$university."','".$industry."','".$idaccount."')";
    $res = mysqli_query($conn,$sql);
    header('Location:/home/dang-nhap');
?>