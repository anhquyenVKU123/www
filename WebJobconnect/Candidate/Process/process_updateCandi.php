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
    $industry = $_GET['industry'];

    $conn = mysqli_connect("localhost","root","","jobconnect");  
    $sql = "UPDATE ungvien SET 
            Hovaten='".$fullname."', Gioitinh='".$gender."',Ngaysinh='".$birthday."',SDT='".$numberphone."',Email='".$email."',Diachi='".$address."',IDTruong='".$university."',Nganhhoc='".$industry."' 
            WHERE IDUngvien='".$_SESSION['id_candidate']."'";
    echo $sql;
    $_SESSION['candidate'] = $fullname." - Ứng viên";
    $res = mysqli_query($conn,$sql);
    header('Location:/Candidate/home/chi-tiet-ung-vien/'.$_SESSION['id_candidate']);
?>