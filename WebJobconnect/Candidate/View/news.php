<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT admin.IDQuantri,admin.Hovaten,admin.Avatar,admin.Chuyenmon,news.*
            FROM tintuc news
            JOIN quantrivien admin ON admin.IDQuantri=news.IDQuantri
            WHERE IDNews='".$_GET['IDNews']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $row['Tieude']; ?></title>
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

    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Tin tức</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Candidate/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Candidate/home/danh-sach-tin-tuc">Danh sách tin tức</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['Tieude']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row">
            <!-- Blog Detail Start -->
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-4">
                    <h6 class="text-primary font-weight-normal text-uppercase mb-3">Blog Detail Page</h6>
                    <h1 class="mb-4 section-title"><?php echo $row['Tieude']; ?></h1>
                    <div class="d-index-flex mb-2">
                        <span class="mr-3"><i class="fa fa-folder text-primary"></i> Ngày đăng: <?php echo $row['Ngaydang']; ?></span>
                    </div>
                </div>
                <div class="mb-5">
                    <img class="img-fluid w-100 mb-4" src="/WebJobconnect/Admin/image_News/<?php echo $row['Anhmodau']; ?>" alt="Image">
                    <div class="font-italic text-dark" style="font-size:5mm;"> <?php echo $row['Modau']; ?></div>
                    <h2 class="mb-4"><?php echo $row['Tieude1']; ?></h2>
                    <img class="img-fluid w-50 float-left mr-4 mb-3" src="/WebJobconnect/Admin/image_News/<?php echo $row['Anh1']; ?>" alt="Image">
                    <div class="text-dark" style="font-size:5mm;"> <?php echo $row['Noidung1']; ?></div>
                    <h2 class="mb-4"> <?php echo $row['Tieude2']; ?> </h2>
                    <img class="img-fluid w-50 float-right ml-4 mb-3" src="/WebJobconnect/Admin/image_News/<?php echo $row['Anh2']; ?>" alt="Image">
                    <div class="text-dark" style="font-size:5mm;"> <?php echo $row['Noidung2']; ?></div>
                </div>
            </div>
            <!-- Blog Detail End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Start -->
                <div class="d-flex flex-column text-center bg-secondary mb-5 py-5 px-4">
                    <img class="rounded-circle bg-white shadow mx-auto mb-4" src="/WebJobconnect/Admin/image/<?php echo $row['Avatar']; ?>" style="width: 100px; height: 100px; padding: 12px;" alt="">
                    <h3 class="text-primary mb-3"><?php echo $row['Hovaten']; ?></h3>
                    <p class="text-white m-0"><?php echo $row['Chuyenmon']; ?></p>
                </div>
                <!-- Author End -->
            
                <!-- Recent Post Start -->
                <?php
                    $sqlnews = "SELECT*FROM tintuc ORDER BY Ngaydang DESC LIMIT 6";
                    $resnews = mysqli_query($conn,$sqlnews);
                ?>
                <div class="mb-5">
                    <h3 class="font-weight-bold mb-4">Tin tức gần đây</h3>
                    <?php while ($rownews = mysqli_fetch_array($resnews)) {?>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="/WebJobconnect/Admin/image_News/<?php echo $rownews['Anhmodau']; ?>" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="/Candidate/home/danh-sach-tin-tuc/noi-dung/<?php echo $rownews['IDNews']; ?>"><?php echo $rownews['Tieude']; ?></a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Ngày đăng: <?php echo $rownews['Ngaydang']; ?></small>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- Recent Post End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Detail End -->
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
