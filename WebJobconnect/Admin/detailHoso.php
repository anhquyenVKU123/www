<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM hosotuyendung WHERE IDHoSo='".$_GET['IDHoso']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin đơn ứng tuyền</title>
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
    <link href="/WebJobconnect//WebJobconnect/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <?php include('Topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('Navbar.php') ?>
    <!-- Navbar End -->
    <?php
        $sqluv = "SELECT * FROM ungvien WHERE IDUngvien='".$row['IDUngvien']."'";
        $resuv = mysqli_query($conn,$sqluv);
        $rowuv = mysqli_fetch_array($resuv);
    ?>
    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Đơn ứng tuyển</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Admin/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Admin/home/danh-sach-ung-vien">Ứng viên</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Admin/home/danh-sach-ung-vien/chi-tiet-ung-vien/<?php echo $row['IDUngvien']; ?>"><?php echo $rowuv['Hovaten']; ?></a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="#"><?php echo $row['Tenhoso']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    <!-- Lấy thông tin nhà tuyển dụng -->
    <?php
        $sqlemp = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$row['IDEmployer']."'";
        $resemp = mysqli_query($conn,$sqlemp);
        $rowemp = mysqli_fetch_array($resemp);
    ?>
    <!-- Lấy thông tin tin tuyển dụng-->
    <?php
        $sqltin = "SELECT * FROM tintuyendung WHERE IDTin='".$row['IDTin']."'";
        $restin = mysqli_query($conn,$sqltin);
        $rowtin = mysqli_fetch_array($restin);
    ?>

    <!-- Tiêu đề tin tuyển dụng -->
    <div class="container-fluid bg-primary" style="width:100%;height:auto;margin-top:-100px;">
        <div class="d-flex align-content-center justify-content-center">
            <div class="text-white my-3" style="font-size:40px;"><?php echo $row['Tenhoso']; ?></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around my-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Nhà tuyển dụng: <span><?php echo $rowemp['NameCompany']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Vị trí ứng tuyển: <span><?php echo $row['Vitriungtuyen']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngày đăng: <span><?php echo $row['Ngaydang']; ?></span></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around py-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Tin tuyển dụng: <span><?php echo $rowtin['TenTin']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngành : <span><?php echo $rowtin['Nganh']; ?> </span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Tình trạng: <span><?php echo $row['Tinhtrang']; ?></span></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Bằng cấp/Chứng chỉ</span>
                        <div class="my-5">
                            <p><?php echo $row['Bangcap']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Dự án đã tham gia</span>
                        <div class="my-5">
                            <?php echo $row['Duan']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Kỹ năng mềm</span>
                        <div class="my-5">
                            <p><?php echo $row['Kynangmem']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Kỹ năng chuyên môn</span>
                        <div class="my-5">
                            <p>Cần tuyển: <?php echo $row['Kynangchuyenmon']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Mục tiêu nghề nghiệp</span>
                        <div class="my-5">
                                <div class="my-4" style="width:auto;">
                                <?php echo $row['Muctieu']; ?>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <!--Footer Component-->
    <?php include('Footer.php') ?>
    <!-- Footer Component -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/WebJobconnect//WebJobconnect/lib/easing/easing.min.js"></script>
    <script src="/WebJobconnect//WebJobconnect/lib/waypoints/waypoints.min.js"></script>
    <script src="/WebJobconnect//WebJobconnect/lib/counterup/counterup.min.js"></script>
    <script src="/WebJobconnect//WebJobconnect/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/WebJobconnect//WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
    <script src="/WebJobconnect//WebJobconnect/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/WebJobconnect//WebJobconnect/js/main.js"></script>

</body>
</html>