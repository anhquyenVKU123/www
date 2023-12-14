<?php
    session_start();
?>
<?php
    $conn=mysqli_connect("localhost","root","","jobconnect");

    //Lấy ngày đăng
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = new DateTime();
    $currentday = $day->format('Y-m-d');

    //Lấy thông tin từ form
    $name = $_GET['name'];
    $diploma = $_GET['diploma'];
    $position = $_GET['position'];
    $softskills = $_GET['softskills'];
    $proskills = $_GET['proskills'];
    $target = $_GET['target'];
    $project = $_GET['project'];

    //Cập nhật bảng hosotuyendung
    $sql = "UPDATE hosotuyendung SET 
            Tenhoso='".$name."', Bangcap='".$diploma."',Vitriungtuyen='".$position."',Kynangmem='".$softskills."',Kynangchuyenmon='".$proskills."',Muctieu='".$target."',Duan='".$project."' 
             WHERE IDHoSo='".$_SESSION['idhs']."'";
    echo $sql;
    $res = mysqli_query($conn,$sql);
    unset($_SESSION['idhs']);
    header("Location:/Candidate/home");
?>