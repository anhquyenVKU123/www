<?php
    session_start();
?>
<?php
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
    $levelStudy = $_GET['levelStudy'];

    $conn = mysqli_connect("localhost","root","","jobconnect");  
    $sql = "UPDATE quantrivien SET 
            Hovaten='".$fullname."', Gioitinh='".$gender."',Ngaysinh='".$birthday."',SDT='".$numberphone."',Email='".$email."',Diachi='".$address."',IDTruong='".$university."',Chuyenmon='".$levelStudy."' 
            WHERE IDQuantri='".$_SESSION['id_admin']."'";
    echo $sql;
    $_SESSION['admin'] = $fullname." - Quản trị viên";
    $res = mysqli_query($conn,$sql);
    header('Location:/Admin/home/chi-tiet-quan-tri-vien/'.$_SESSION['id_admin']);
?>