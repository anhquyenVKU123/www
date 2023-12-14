<?php
    session_start();
?>
<?php
    $conn=mysqli_connect("localhost","root","","jobconnect");
    //Tạo id ngẫu nhiên cho bảng tin tuyển dụng
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idRec = substr(str_shuffle($string), 0, 12);
        //Kiểm tra id có bị trùng không
        $sql = "SELECT * FROM tintuyendung WHERE IDTin='".$idRec."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $idRec = substr(str_shuffle($string), 0, 12);
            $sql = "SELECT * FROM tintuyendung WHERE IDTin='".$idRec."'";
            $res = mysqli_query($conn,$sql);
        }
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

    //Lưu vào CSDL
    $sql = "INSERT INTO tintuyendung (IDTin,TenTin,Nganh,Vitri,MucLuong,LoaiCV,Soluongtuyen,Mota,Kinang,Kinhnghiem,HocVan,Ngayhethan,Ngaydang,Diadiem,Lienhe,IDEmployer,SoLuongDK) VALUES ('".
            $idRec."','".$name."','".$industry."','".$position."','".$salary."','".$worktype."',".$number.",'".$detail."','".$skill."','".$exp."','".$diploma."','".$expDate."','".$currentday."','".$address."','".$contact."','".$_SESSION['id_employer']."',0)";
    $res = mysqli_query($conn,$sql);
    header('Location:/Employer/home');
?>