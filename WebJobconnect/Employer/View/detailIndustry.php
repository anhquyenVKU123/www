<?php
    $id = $_GET['IDIndus'];
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM nganhhoc WHERE IDNganh=".$id;
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin chi tiết</title>
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
    <link rel="stylesheet" href="/WebJobconnect/Admin/css/formUpdate.css">
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
                    <h1 class="mb-4 mb-md-0 text-white">Thông tin chi tiết</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Employer/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Employer/home/danh-sach-nganh-linh-vuc">Ngành/Lĩnh vực</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Employer/home/danh-sach-nganh-linh-vuc/thong-tin-chi-tiet/<?php echo $row['IDNganh']; ?>"><?php echo $row['Tentiengviet']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    
    <!-- Hiển thị hình ảnh và thông tin chung-->
    <div id="detail" class="d-sm-flex my-3 mx-5">
        <div class="flex-shrink-0">
            <img src="/WebJobconnect/Admin/image/<?php echo $row['Hinhanh']; ?>" alt="IT - Phần mềm" style="width:300px;height:300px;">
        </div>
        <div class="flex-grow-1 ms-3 mx-5 float-md-right">
            <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin chung</span>
            <div class="my-5">
                ID Ngành/Lĩnh vực: <?php echo $row['IDNganh']; ?>
            </div>
            <div class="my-5">
                Tên tiếng anh: <?php echo $row['Tentienganh']; ?>
            </div>
            <div class="my-5">
                Tên tiếng việt: <?php echo $row['Tentiengviet']; ?>
            </div>    
            <div class="my-5">
                Viết tắt: <?php echo $row['Viettat']; ?>
            </div>  
        </div>
    </div>

    <!-- Hiển thị mô tả ngành -->
    <div class="d-sm-flex mx-5">
        <div class="flex-shrink-0" style="width:300px;">
        </div>
        <div class="flex-grow-1 ms-3 mx-5">
            <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Mô tả</span>
            <div class="my-3">
            <?php echo $row['Mota']; ?>
            </div>
        </div>
    </div>

    <!-- Hiển thị danh sách các tin tuyển dụng -->
    <?php
        $sqltin = "SELECT*FROM tintuyendung WHERE LOWER(Nganh)=LOWER('".$row['Tentiengviet']."');";
        $restin = mysqli_query($conn,$sqltin);
    ?>
    <!-- Hiển thị danh sách các nhà tuyển dụng -->
    <div class="d-sm-flex my-3 mx-5">
        <div class="flex-shrink-0" style="width:300px;">
        </div>
        <div class="flex-grow-1 ms-3 mx-5">
            <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Tin tuyển dụng</span>
            <?php if (mysqli_num_rows($restin) <= 0) {echo 'Chưa có tin tuyển dụng';} else while ($rowtin=mysqli_fetch_array($restin)) {?>
            <div class="my-3">
                <a href="/Employer/home/danh-sach-tin-tuyen-dung/chi-tiet-tin-tuyen-dung/<?php echo $rowtin['IDTin']; ?>" class="text-decoration-none"><?php echo $rowtin['TenTin']; ?></a>
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