<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT*FROM quantrivien WHERE IDQuantri='".$_SESSION['id_admin']."'";
    $res = mysqli_query($conn,$sql);
    $row= mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tương tác</title>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


    <!-- Libraries Stylesheet -->
    <link href="/WebJobconnect/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
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
                    <h1 class="mb-4 mb-md-0 text-white">Tương tác</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="">Tương tác - Ứng viên</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <div class="container-fluid">
        <?php 
            $sqlcom = "SELECT*FROM binhluanqtv WHERE Vaitro='Ứng viên'";
            $rescom = mysqli_query($conn,$sqlcom);
            while ($rowcom=(mysqli_fetch_array($rescom))) {
                $sqluv = "SELECT*FROM ungvien WHERE IDUngvien='".$rowcom['IDUser']."'";
                $resuv = mysqli_query($conn,$sqluv);
                $rowuv= mysqli_fetch_array($resuv);
        ?>
        <div class="container-fluid row">
            <div class="col-sm-9 col-lg-4 bg-secondary my-3" style="border-radius:30px;">
                <div class="p-3">
                    <span>
                        <img src="/WebJobconnect/Candidate/image/<?php echo $rowuv['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                        <span class="text-dark font-italic font-weight-medium"><?php echo $rowuv['Hovaten']; ?></span>
                        <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowcom['Ngaydang']; ?></p>
                    </span>
                </div>
                <div class="p-2 mx-5 text-white">
                    <?php echo $rowcom['Noidung']; ?>
                </div>
            </div>
                <?php 
                    $sqlrep = "SELECT*FROM phanhoiuv WHERE IDComment='".$rowcom['IDComment']."'";
                    $resrep = mysqli_query($conn,$sqlrep);
                    while ($rowrep=(mysqli_fetch_array($resrep))) {
                ?>
                <div class="container-fluid row mx-5 my-3">
                    <div class="col-sm-9 col-lg-4 bg-secondary" style="border-radius:30px;">
                        <div class="p-3">
                            <span>
                                <img src="/WebJobconnect/Admin/image/<?php echo $row['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                                <span class="text-dark font-italic font-weight-medium">Quản trị viên</span>
                                <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowrep['Ngaydang']; ?></p>
                            </span>
                        </div>
                        <div class="p-2 mx-5 text-white">
                            <?php echo $rowrep['Noidung']; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
        <div class="d-flex-row">
            <span class="mx-5">
                <form action="/Admin/home/xu-li-phan-hoi-ung-vien/<?php echo $rowcom['IDComment']; ?>" method="get" id="myForm">
                    <textarea type="text" name="reply" id="comment<?php echo $rowcom['IDComment']; ?>" placeholder="Gửi phản hồi" rows="5" cols="30"></textarea>
                    <button class="btn btn-outline-primary px-3 my-3">Phản hồi</button>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#comment<?php echo $rowcom['IDComment']; ?>' ) )
                            .catch( error => {
                            console.error( error );
                        } );
                    </script>
                </form>
            </span>
        </div>
        <?php } ?>
    </div>


    <!-- Footer Start -->
    <?php include('Footer.php') ?>
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