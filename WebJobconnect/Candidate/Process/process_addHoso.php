<?php
    session_start();
?>
<?php
    $conn=mysqli_connect("localhost","root","","jobconnect");
    //Tạo id ngẫu nhiên cho hồ sơ tuyển dụng
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idHoso = substr(str_shuffle($string), 0, 15);
        //Kiểm tra id có bị trùng không
        $sql = "SELECT * FROM hosotuyendung WHERE IDHoSo='".$idHoso."'";
        $res = mysqli_query($conn,$sql);
        while (mysqli_num_rows($res) > 0){
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $idHoso = substr(str_shuffle($string), 0, 15);
            $sql = "SELECT * FROM hosotuyendung WHERE IDHoSo='".$idHoso."'";
            $res = mysqli_query($conn,$sql);
        }
    //Lấy ngày đăng
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentday = $day->format('Y-m-d');

    //Lấy thông tin từ form
    $name = $_GET['name'];
    $diploma = $_GET['diploma'];
    $position = $_GET['position'];
    $company = $_GET['company'];
    $recruitment = $_GET['recruitment'];
    $softskills = $_GET['softskills'];
    $proskills = $_GET['proskills'];
    $target = $_GET['target'];
    $project = $_GET['project'];

    //Lưu vào CSDL
    $sql = "INSERT INTO hosotuyendung (IDHoSo,Tenhoso,IDUngvien,Bangcap,Vitriungtuyen,Kynangmem,Kynangchuyenmon,Muctieu,Duan,Ngaydang,Tinhtrang,IDEmployer,IDTin) VALUES ('".
            $idHoso."','".$name."','".$_SESSION['id_candidate']."','".$diploma."','".$position."','".$softskills."','".$proskills."','".$target."','".$project."','".$currentday."','Chưa duyệt','".$company."','".$recruitment."')";
    $res = mysqli_query($conn,$sql);

    //Cập nhật số lượng đăng kí ứng tuyển của tin tuyển dụng
    $sql = "SELECT*FROM tintuyendung WHERE IDTin='".$recruitment."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    
    $num = $row['SoLuongDK']+1;
    $update = "UPDATE tintuyendung SET SoLuongDK=$num WHERE IDTin='".$recruitment."'";
    $resUp = mysqli_query($conn,$update);
    header("Location:/Candidate/home");
?>