<?php $conn=mysqli_connect("localhost","root","","jobconnect"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tìm & Tuyển dụng việc làm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</head>
<style>
    .carousel-item img {
        object-fit: cover;
        height: 600px; /* Đặt kích thước cố định cho hình ảnh */
    }
</style>
<body>
    <!-- Topbar Start -->
    <?php include('WebJobconnect/Topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('WebJobconnect/Navbar.php') ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/WebJobconnect/img/image2.jpg" alt="Image" style="width:500px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-4 display-md-3 text-white mb-md-4">Tin tuyển dụng</h1>
                            <h4 class="text-white mb-md-3">Trải nghiệm trang web của chúng tôi để cập nhật những tin tuyển dụng mới nhất và có cơ hội được lọt vào mắt xanh của các nhà tuyển dụng. Nhanh tay thôi nào !!!</h4>
                            <a href="/home/danh-sach-tin-tuyen-dung" class="btn btn-primary py-md-3 px-md-5 mt-2">Tin tuyển dụng</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/WebJobconnect/img/image3.jpg" alt="Image" style="width:500px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-4 display-md-3 text-white mb-md-4">Đa dạng ngành nghề & lĩnh vực</h1>
                            <h4 class="text-white mb-md-3">Dễ dàng tìm kiếm công việc theo ngành nghề hoặc lĩnh vực của bạn. Nhanh tay vào xem ngành nghề hoặc lĩnh vực của bạn có gì mới nhé !!</h4>
                            <a href="/home/danh-sach-nganh-linh-vuc" class="btn btn-primary py-md-3 px-md-5 mt-2">Xem danh sách</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex">
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Vị trí</h5>
                            <p class="m-0 text-white">470 Trần Đại Nghĩa, Hoà Quý, Đà Nẵng</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email</h5>
                            <p class="m-0 text-white">anhquyenanhvan123@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">SĐT</h5>
                            <p class="m-0 text-white">097 119 2355</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

    
    <!-- Blog Start -->
    <div class="container-fluid mt-5 pb-2">
        <div class="container">
            <h1 class="display-5 text-center mb-5">Tin tuyển dụng</h1>
            <div class="row">
                <?php
                    $sqltin = "SELECT tin.*,emp.*
                                FROM tintuyendung tin
                                JOIN nhatuyendung emp ON emp.IDEmployer=tin.IDEmployer
                                LIMIT 6";
                    $restin = mysqli_query($conn,$sqltin);
                    while ($rowtin=mysqli_fetch_array($restin)) {
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4 border-primary" style="border: 3px solid;">
                        <div class="d-flex flex-column align-items-center py-3">
                            <p class="text-primary font-weight-medium"><?php echo $rowtin['TenTin']; ?></p>
                            <p class="text-success font-italic">Ngày đăng: <?php echo $rowtin['Ngaydang']; ?></p>
                        </div>
                        <div class="d-flex flex-row justify-content-center align-content-center py-2">
                            <a href="/home/danh-sach-tin-tuyen-dung/thong-tin-chi-tiet/<?php echo $rowtin['IDTin']; ?>" class="btn btn-secondary py-2 px-4">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="/home/danh-sach-tin-tuyen-dung">Danh sách tin tuyển dụng >></a>
        </div>
    </div>
    
    <!-- Footer Start -->
    <?php include('WebJobconnect/Footer.php') ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/WebJobconnect/lib/easing/easing.min.js"></script>
    <script src="/WebJobconnect/lib/waypoints/waypoints.min.js"></script>
    <script src="/WebJobconnect/lib/counterup/counterup.min.js"></script>
    <script src="/WebJobconnect/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
    <script src="/WebJobconnect/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/WebJobconnect/js/main.js"></script>
</body>
</html>