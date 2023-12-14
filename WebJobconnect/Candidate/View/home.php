<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ứng viên</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

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
</head>
<body>
    <!-- Topbar Start -->
    <?php include('Topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('Navbar.php') ?>
    <!-- Navbar End -->
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/WebJobconnect/img/image2.jpg" alt="Image" style="width:500px;height:700px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-4 display-md-3 text-white mb-md-4">Tin tuyển dụng</h1>
                            <h4 class="text-white mb-md-3">Trải nghiệm trang web của chúng tôi để cập nhật những tin tuyển dụng mới nhất và có cơ hội được lọt vào mắt xanh của các nhà tuyển dụng. Nhanh tay thôi nào !!!</h4>
                            <a href="/Candidate/home/danh-sach-tin-tuyen-dung" class="btn btn-primary py-md-3 px-md-5 mt-2">Tin tuyển dụng</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/WebJobconnect/img/image3.jpg" alt="Image" style="width:500px;height:700px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-4 display-md-3 text-white mb-md-4">Đa dạng ngành nghề & lĩnh vực</h1>
                            <h4 class="text-white mb-md-3">Dễ dàng tìm kiếm công việc theo ngành nghề hoặc lĩnh vực của bạn. Nhanh tay vào xem ngành nghề hoặc lĩnh vực của bạn có gì mới nhé !!</h4>
                            <a href="/Candidate/home/danh-sach-nganh-linh-vuc" class="btn btn-primary py-md-3 px-md-5 mt-2">Xem danh sách</a>
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
    <?php
        $sqltin = "SELECT * FROM tintuyendung LIMIT 6";
        $restin = mysqli_query($conn,$sqltin);
    ?>
    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h1 class="display-4 text-center mb-5">Tin Tuyển Dụng</h1>
            <div class="row">
                <?php while($rowtin = mysqli_fetch_array($restin)) { ?>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4 border-primary" style="border: 3px solid;">
                        <div class="d-flex flex-column align-items-center py-3">
                            <p class="text-primary font-weight-medium"><?php echo $rowtin['TenTin']; ?></p>
                            <p class="text-success font-italic">Ngày đăng: <?php echo $rowtin['Ngaydang']; ?></p>
                        </div>
                        <div class="d-flex flex-row justify-content-center align-content-center py-2">
                            <a href="/Candidate/home/danh-sach-tin-tuyen-dung/thong-tin-chi-tiet/<?php echo $rowtin['IDTin']; ?>" class="btn btn-secondary py-2 px-4">Chi tiết</a>
                            <a href="/Candidate/home/don-ung-tuyen/<?php echo $rowtin['IDTin']; ?>" class="btn btn-primary mx-2 py-2 px-4">Ứng tuyển</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="/Candidate/home/danh-sach-tin-tuyen-dung">Danh sách tin tuyển dụng >></a>
        </div>
    </div>
    <!-- Pricing Plan End -->

     <!-- Blog Start -->
     <?php
        $sqlindus = "SELECT * FROM nganhhoc LIMIT 6";
        $resindus = mysqli_query($conn,$sqlindus);
    ?>
     <div class="container-fluid mt-5 pb-2">
        <div class="container">
            <h1 class="display-4 text-center mb-5">Ngành / Lĩnh vực</h1>
            <div class="row">
                <?php while($rowindus = mysqli_fetch_array($resindus)) {?>
                <div class="col-lg-4 mb-2">
                    <div class="shadow mb-4 border border-3 border-warning rounded" style="height: 300px;">
                        <div class="position-relative">
                            <img class="img-fluid w-100 rounded-top" src="/WebJobconnect/Admin/image/<?php echo $rowindus['Hinhanh']; ?>" alt="" style="height:200px;">
                            <a href="/Candidate/home/danh-sach-nganh-linh-vuc/thong-tin-chi-tiet/<?php echo $rowindus['IDNganh']; ?>" class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center   text-decoration-none p-4" style="top: 0; left: 0; background: rgba(0, 0, 0, .4);">
                                <h4 class="text-center text-white font-weight-medium mb-3"><?php echo $rowindus['Tentiengviet']; ?></h4>
                            </a>
                        </div>
                        <p class="m-0 p-2 text-danger font-weight-medium">Mã ngành: <?php echo $rowindus['IDNganh']; ?></p>
                        <p class="m-0 p-2 text-info font-italic font-weight-medium"><?php echo $rowindus['Tentienganh'].' '; ?>(<?php echo $rowindus['Viettat']; ?>)</p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="/Candidate/home/danh-sach-nganh-linh-vuc">Tất cả ngành/lĩnh vực >></a>
        </div>
    </div>
    <!-- Blog End -->

    <?php
        $sqlhs = "SELECT emp.NameCompany,hs.* 
                    FROM hosotuyendung hs
                    JOIN nhatuyendung emp ON emp.IDEmployer=hs.IDEmployer
                    WHERE IDUngvien='".$_SESSION['id_candidate']."'";
        $reshs = mysqli_query($conn,$sqlhs);
    ?>
     <div class="container-fluid mt-5 pb-2">
        <div class="container">
            <h1 class="display-4 text-center mb-5">Đơn ứng tuyển</h1>
            <div class="row">
                <?php if (mysqli_num_rows($reshs) <= 0 ) {echo 'Chưa có đơn ứng tuyển';} else { while ($rowhs = mysqli_fetch_array($reshs)) {?>
                <div class="col-lg-4 mb-2">
                    <div class="shadow mb-4 border-info" style="border:3px solid; border-radius:20px;overflow:hidden;">
                        <div class="position-relative">
                            <img class="w-100" src="/WebJobconnect/Candidate/image/bg4.jpg" alt="" style="height:200px;">
                            <a href="" class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center   text-decoration-none p-4" style="top: 0; left: 0; background: rgba(0, 0, 0, .4);">
                                <h4 class="text-center text-white font-weight-medium mb-3"><?php echo $rowhs['Tenhoso']; ?></h4>
                            </a>
                        </div>
                        <p class="m-0 p-4 text-center text-danger font-weight-medium"><?php echo $rowhs['NameCompany']; ?></p>
                        <p class="m-0 p-4 text-success font-italic font-weight-medium">Ngày đăng: <?php echo $rowhs['Ngaydang']; ?></p>
                        <div class="d-flex flex-row align-content-center justify-content-center py-2">
                            <a href="/Candidate/home/chi-tiet-don-ung-tuyen/<?php echo $rowhs['IDHoSo']; ?>" class="btn btn-primary">Chi tiết</a>
                            <script>
                                function confirmDelete(){
                                    if (confirm("Bạn có chắc chắn muốn xóa đơn ứng tuyển này không?")){
                                        window.location.href="/Candidate/xu-li-xoa-ho-so/<?php echo $rowhs['IDHoSo']; ?>";
                                    }
                                }
                            </script>
                            <button class="btn btn-danger mx-2" onclick="confirmDelete()">Xóa</button>
                        </div>
                    </div>
                </div>
                <?php }}?>
            </div>
            <a href="/Candidate/home/danh-sach-don-ung-tuyen">Tất cả đơn ứng tuyển >></a>
        </div>
    </div>

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <h1 class="display-5 text-center mb-5">Ứng viên</h1>
            <div class="owl-carousel testimonial-carousel">
                <?php
                    $sqluv = "SELECT truong.*,uv.*
                                FROM ungvien uv
                                JOIN truongdaihoc truong ON truong.IDTruong=uv.IDTruong
                                LIMIT 8";
                    $resuv = mysqli_query($conn,$sqluv);
                    while ($rowuv=mysqli_fetch_array($resuv)){
                ?>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="/WebJobconnect/Candidate/image/<?php echo $rowuv['Avatar']; ?>" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0" style="height:250px;">
                        <a href="/Candidate/home/chi-tiet-ung-vien/<?php echo $rowuv['IDUngvien']; ?>"><h5 class="font-weight-medium mt-5"><?php echo $rowuv['Hovaten']; ?></h5></a>
                        <p class="text-primary font-italic"><?php echo $rowuv['Tentruong']; ?></p>
                        <p class="m-0 text-success font-weight-medium"><?php echo $rowuv['Nganhhoc']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="/Candidate/home/danh-sach-ung-vien">Danh sách ứng viên >></a>
        </div>
    </div>
    <!-- Testimonial End -->

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
    <script src="/WebJobconnect/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
    <script src="/WebJobconnect/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/WebJobconnect/js/main.js"></script>

</body>
</html>