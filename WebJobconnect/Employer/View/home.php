<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$_SESSION['id_employer']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nhà tuyển dụng</title>
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
                    <?php
                        $image = "";
                        if ($row['Avatar'] == "") $image = "background2.jpg"; else $image = $row['Avatar']; 
                    ?>
                    <img class="w-100" src="/WebJobconnect/Employer/image/<?php echo $image; ?>" alt="Image" style="width:100%;height:800px;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3"><?php echo $row['CEO']; ?></h4>
                            <h1 class="display-3 text-white mb-md-4"><?php echo $row['NameCompany']; ?></h1>
                            <a href="/Employer/home/chi-tiet-nha-tuyen-dung/<?php echo $_SESSION['id_employer']; ?>" class="btn btn-primary py-md-3 px-md-5 mt-2">Xem thông tin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex">
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Trụ sở chính</h5>
                            <p class="m-0 text-white"><?php echo $row['Address']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email</h5>
                            <p class="m-0 text-white"><?php echo $row['Email']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-0 my-lg-5 pt-0 pt-lg-5 pr-lg-5">
                    <h6 class="text-secondary text-uppercase font-weight-medium mb-3"><?php echo $row['NameCompany']; ?></h6>
                    <h1 class="mb-4">Chất lượng công ty</h1>
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">
                                <?php 
                                    $current = date("Y-m-d");
                                    $sqlyear = "SELECT TIMESTAMPDIFF(YEAR,'".$row['DateFoundation']."','".$current."') AS years"; 
                                    $resyear = mysqli_query($conn,$sqlyear);
                                    $rowyear = mysqli_fetch_array($resyear);
                                    echo $rowyear['years'];
                                ?>
                            </h1>
                            <h5 class="font-weight-bold">Năm kinh nghiệm</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">
                                <?php
                                    $sqltotal = "SELECT COUNT(*) AS total FROM tintuyendung WHERE IDEmployer='".$_SESSION['id_employer']."'"; 
                                    $restotal = mysqli_query($conn,$sqltotal);
                                    $rowtotal = mysqli_fetch_array($restotal);
                                    echo $rowtotal['total'];
                                ?>
                            </h1>
                            <h5 class="font-weight-bold">Tin tuyển dụng</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">
                                <?php
                                    $sqlsum = "SELECT SUM(SoLuongDK) AS total FROM tintuyendung WHERE IDEmployer ='".$_SESSION['id_employer']."'"; 
                                    $ressum = mysqli_query($conn,$sqlsum);
                                    $rowsum = mysqli_fetch_array($ressum);
                                    echo $rowsum['total'];
                                ?>
                            </h1>
                            <h5 class="font-weight-bold">Đơn ứng tuyển</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">
                                <?php
                                    $sqlsum = "SELECT SUM(Duyet) AS total FROM tintuyendung WHERE IDEmployer ='".$_SESSION['id_employer']."'"; 
                                    $ressum = mysqli_query($conn,$sqlsum);
                                    $rowsum = mysqli_fetch_array($ressum);
                                    echo $rowsum['total'];
                                ?>
                            </h1>
                            <h5 class="font-weight-bold">Đơn được chấp nhận</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center bg-secondary h-100 py-5 px-3">
                        <i class="fa fa-5x fa-certificate text-white mb-5"></i>
                        <h1 class="display-1 text-white mb-3"><?php echo $row['TotalEmployees']; ?></h1>
                        <h1 class="text-white m-0">Nhân viên</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
    <?php
        $sqltin = "SELECT * FROM tintuyendung WHERE IDEmployer='".$_SESSION['id_employer']."' LIMIT 6";
        $restin = mysqli_query($conn,$sqltin);
    ?>
    
    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3"><?php echo $row['NameCompany']; ?></h6>
            <h1 class="display-4 text-center mb-5">Tin Tuyển Dụng</h1>
            <div class="row">
                <?php if (mysqli_num_rows($restin) <= 0 ) { echo 'Chưa có tin tuyển dụng'; } else { while ($rowtin = mysqli_fetch_array($restin)) {?>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-flex flex-column align-items-center py-3">
                            <p><?php echo $rowtin['TenTin']; ?></p>
                            <p>Ngày đăng: <?php echo $rowtin['Ngaydang']; ?></p>
                        </div>
                        <a href="/Employer/home/danh-sach-tin-tuyen-dung/chi-tiet-tin-tuyen-dung/<?php echo $rowtin['IDTin']?>" class="btn btn-secondary py-2 px-4">Chi tiết</a>
                        <script>
                            function confirmDelete(idtin){
                                if (confirm("Bạn có chắc chắn muốn xóa tin này?")){
                                    window.location.href="/Employer/xoa-tin-tuyen-dung/" + idtin;
                                    }
                                }
                        </script>
                        <a href="" onclick="confirmDelete('<?php echo $rowtin['IDTin']; ?>');" class="btn btn-primary py-2 px-4">Xóa</a>
                    </div>
                </div>
                <?php } }?>
            </div>
            <a href="/Employer/home/danh-sach-tin-tuyen-dung">Danh sách tin tuyển dụng >></a>
        </div>
    </div>
    <!-- Pricing Plan End -->
    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3"><?php echo $row['NameCompany']; ?></h6>
            <h1 class="display-4 text-center mb-5">Đơn ứng tuyển</h1>
            <div class="row">
            <?php
                $sqlhs="SELECT uv.*,hs.*
                        FROM hosotuyendung hs
                        JOIN ungvien uv ON hs.IDUngvien = uv.IDUngvien
                        WHERE hs.IDEmployer='".$_SESSION['id_employer']."' LIMIT 6";
                $reshs = mysqli_query($conn,$sqlhs);
                while($rowhs=mysqli_fetch_array($reshs)){
            ?>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center">
                            <img src="/WebJobconnect/Candidate/image/<?php echo $rowhs['Avatar']; ?>" alt="Avatar" srcset="" class="rounded-circle border-primary" style="border:5px solid;width:100px;height:100px;">
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p class="text-uppercase text-primary font-weight-medium"><?php echo $rowhs['Hovaten']; ?></p>
                            <p class="text-uppercase text-success font-weight-medium font-italic"><?php echo $rowhs['Tenhoso']; ?></p>
                            <p class="text-uppercase text-dark font-weight-medium font-italic">Ngày đăng: <?php echo $rowhs['Ngaydang']; ?></p>
                            <p class="text-uppercase text-dark font-weight-medium font-italic">Vị trí ứng tuyển: <?php echo $rowhs['Vitriungtuyen']; ?></p>
                        </div>
                        <a href="/Employer/home/danh-sach-don-ung-tuyen/thong-tin-chi-tiet/<?php echo $rowhs['IDHoSo']; ?>" class="btn btn-secondary py-2 px-4">Chi tiết</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="/Employer/home/danh-sach-don-ung-tuyen" class="float-left">Danh sách đơn ứng tuyển >></a>
        </div>
    </div>
    <!-- Pricing Plan End -->

    
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