<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$_GET['IDEmp']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin nhà tuyển dụng</title>
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
    <link rel="stylesheet" href="/WebJobconnect/Candidate/css/appliForm.css">
</head>
<style>
    #header-carousel .carousel-item img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        object-position: center;
    }
    #header-carousel .carousel-item img {
        width: 600px;
        height: 400px;
    }
</style>
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
                    <h1 class="mb-4 mb-md-0 text-white">Thông tin Nhà tuyển dụng</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/home/danh-sach-nha-tuyen-dung">Nhà tuyển dụng</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['NameCompany']; ?></a>
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
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin Nhà tuyển dụng</span>
                        <div class="my-5">
                            <p>Tên công ty: <?php echo $row['NameCompany']; ?> </p>
                            <p>Ngày thành lập:<?php echo $row['DateFoundation']; ?></p>
                            <p>Giám đốc điều hành:<?php echo $row['CEO']; ?></p> 
                            <p>Email: <?php echo $row['Email']; ?></p>
                            <p>Địa chỉ:<?php echo $row['Address']; ?></p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Lĩnh vực ứng tuyển</span>
                        <div class="my-5">
                            <?php echo $row['Industry']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hiển thị mô tả của nhà tuyển dụng -->
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Tổng quan về nhà tuyển dụng</span>
            </div>
        </div>
        <?php if ($row['DetailComp'] == "") { echo '<p class="text-center text-danger font-italic font-weight-bolder">Không có thông tin !!!</p>'; } else {?>
        <div id="item" class="my-4" style="width:auto;">
        <?php echo $row['DetailComp']; ?>
        </div>
        <?php  } ?>
    </div>
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Một số hình ảnh</span>
            </div>
        </div>
    </div>
    <?php 
        $sqlimage = "SELECT*FROM hinhanhnhatuyendung WHERE IDEmployer='".$row['IDEmployer']."' LIMIT 1";
        $resimage = mysqli_query($conn,$sqlimage);
        $rowimage=mysqli_fetch_array($resimage);
        if(mysqli_num_rows($resimage) <= 0){
    ?>
    <div class="d-lex align-content-center justify-content-center">
        <p class="text-center text-danger font-italic font-weight-bolder">Chưa cập nhật hình ảnh</p>
    </div>
    <?php } else {?>
    <div class="container-fluid my-5 py-3">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/WebJobconnect/Employer/image/<?php echo $rowimage['NameImage']; ?>" alt="Image">
                </div>
                <?php 
                    $sqlimage = "SELECT*FROM hinhanhnhatuyendung WHERE IDEmployer='".$row['IDEmployer']."' LIMIT 999999999 OFFSET 1";
                    $resimage = mysqli_query($conn,$sqlimage);
                    while ($rowimage=mysqli_fetch_array($resimage)) {
                ?>
                <div class="carousel-item">
                    <img class="w-100" src="/WebJobconnect/Employer/image/<?php echo $rowimage['NameImage']; ?>" alt="Image">
                </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-warning" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary btn btn-warning" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <?php } ?>

    <!-- Hiển thị các tin tuyển dụng -->
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 30px 0 10px 95px;">Danh sách tin ứng tuyển</span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex flex-column my-5 row">
        <?php
            $sql = "SELECT*FROM tintuyendung WHERE IDEmployer='".$_GET['IDEmp']."'";
            $res = mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
        ?>
            <div id="item" class="col-sm-12">
                <span><?php echo $row['TenTin']; ?></span>
                <p>Ngày đăng: <?php echo $row['Ngaydang']; ?></p>
                <div class="d-flex flex-row">
                    <p><?php if ($row['SoLuongDK'] == 0) {
                                echo 'Chưa có ứng viên đăng kí';
                            } else {
                                echo $row['SoLuongDK'].' ứng viên đăng kí';
                            }
                    ?></p>
                    <a href="/home/danh-sach-tin-tuyen-dung/thong-tin-chi-tiet/<?php echo $row['IDTin']; ?>" class="btn btn-success">Xem</a>
                </div>
            </div>
        <?php } ?>
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
    <script src="/WebJobconnect/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
    <script src="/WebJobconnect/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/WebJobconnect/js/main.js"></script>

</body>
</html>