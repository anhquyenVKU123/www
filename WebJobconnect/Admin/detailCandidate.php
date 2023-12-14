<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM ungvien WHERE IDUngvien='".$_GET['IDCandi']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin ứng viên</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/WebJobconnect/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/WebJobconnect/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="/WebJobconnect/Admin/css/appliForm.css">
</head>
<body>
    <!-- Topbar Start -->
    <?php include('Topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('Navbar.php') ?>
    <!-- Navbar End -->
        <!-- Page Header Start -->
        <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Thông tin ứng viên</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Admin/home/danh-sach-ung-vien">Ứng viên</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['Hovaten']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Hiển thị thông tin cá nhân -->
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin cá nhân</span>
                        <div class="my-5">
                            Họ và tên: <?php echo $row['Hovaten']; ?> <span>Giới tính:<?php echo $row['Gioitinh']; ?></span> <span>Ngày sinh:<?php echo $row['Ngaysinh']; ?></span>
                        </div>
                        <div class="my-5">
                            SĐT: <?php echo $row['SDT']; ?><span>Email: <?php echo $row['Email']; ?></span>
                        </div>
                        <div class="my-5">
                            Địa chỉ:<?php echo $row['Diachi']; ?>
                        </div>  
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-4">
                <?php
                    $sql1 = "SELECT * FROM truongdaihoc WHERE IDTruong='".$row['IDTruong']."'";
                    $res1 = mysqli_query($conn,$sql1);
                    $rowacc = mysqli_fetch_array($res1);
                ?>
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Học vấn</span>
                        <div class="my-5">
                            Trường:<?php echo $rowacc['Tentruong']; ?>
                        </div>
                        <div class="my-5">
                            Ngành học:<?php echo $row['Nganhhoc']; ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hiển thị các đơn đã ứng tuyển -->
    <?php
        $sqlhs = "SELECT * FROM hosotuyendung WHERE IDUngvien='".$_GET['IDCandi']."'";
        $reshs = mysqli_query($conn,$sqlhs);
    ?>
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Danh sách các đơn ứng tuyển</span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex flex-column my-5">
            <?php while ($rowhs = mysqli_fetch_array($reshs)) {?>
            <div id="item">
                <span><?php echo $rowhs['Tenhoso']; ?></span>
                <p>Ngày ứng tuyển: <?php echo $rowhs['Ngaydang']; ?></p>
                <div class="d-flex flex-row">
                    <p><?php echo $rowhs['Tinhtrang']; ?></p>
                    <a href="/Admin/home/chi-tiet-don-ung-tuyen/<?php echo $rowhs['IDHoSo']; ?>" class="btn btn-success">Xem</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!--Footer Component-->
    <?php include('Footer.php') ?>
    <!-- Footer Component -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/WebJobconnect/lib/easing/easing.min.js"></script>
    <script src="/WebJobconnect/lib/waypoints/waypoints.min.js"></script>
    <script src="/WebJobconnect/lib/counterup/counterup.min.js"></script>
    <script src="/WebJobconnect//owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
    <script src="/WebJobconnect/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/WebJobconnect/js/main.js"></script>

</body>
</html>