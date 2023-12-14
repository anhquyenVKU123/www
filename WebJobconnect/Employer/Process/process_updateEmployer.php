<?php
    session_start();
?>
<?php
    $nameComp = $_GET['nameComp'];
    $email = $_GET['email'];
    $dateFoundation = $_GET['dateFoundation'];
    $ceo = $_GET['ceo'];
    $employees =$_GET['employees'];
    $district = $_GET['district'];
    $detailAddress = $_GET['detailAddress'];
    $city = $_GET['city'];
    $address = $detailAddress.', '.$district.', '.$city;
    $industry = $_GET['industry'];
    $detail = $_GET['detail'];

    $conn = mysqli_connect("localhost","root","","jobconnect");  
    $sql = "UPDATE nhatuyendung SET 
            NameCompany='".$nameComp."', CEO='".$ceo."',DateFoundation='".$dateFoundation."',TotalEmployees='".$employees."',Email='".$email."',Address='".$address."',Industry='".$industry."', DetailComp='".$detail."' 
            WHERE IDEmployer='".$_SESSION['id_employer']."'";
    echo $sql;
    $_SESSION['employer'] = $nameComp." - Nhà tuyển dụng";
    $res = mysqli_query($conn,$sql);
    header('Location:/Employer/home/chi-tiet-nha-tuyen-dung/'.$_SESSION['id_employer']);
?>