<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT uv.IDUngvien, uv.Hovaten, uv.Nganhhoc, uni.Tentruong, tin.IDTin, tin.TenTin,hs.*
                FROM hosotuyendung hs
                JOIN ungvien uv ON uv.IDUngvien=hs.IDUngvien
                JOIN truongdaihoc uni ON uni.IDTruong=uv.IDTruong
                JOIN tintuyendung tin ON tin.IDTin=hs.IDTin
            WHERE IDHoSo='".$_GET['IDHoso']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin đơn ứng tuyển</title>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="/WebJobconnect/Employer/css/appliForm.css">

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
                    <h1 class="mb-4 mb-md-0 text-white">Đơn ứng tuyển</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Employer/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Employer/home/danh-sach-tin-tuyen-dung">Danh sách tin tuyển dụng</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Employer/home/danh-sach-tin-tuyen-dung/chi-tiet-tin-tuyen-dung/<?php echo $row['IDTin']; ?>"><?php echo $row['TenTin']; ?></a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="#"><?php echo $row['Tenhoso']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Tiêu đề tin tuyển dụng -->
    <div class="container-fluid bg-primary" style="width:100%;height:auto;margin-top:-100px;">
        <div class="d-flex align-content-center justify-content-center">
            <div class="text-white my-3" style="font-size:40px;"><?php echo $row['Tenhoso']; ?></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around my-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ứng viên: <span><?php echo $row['Hovaten']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Vị trí ứng tuyển: <span><?php echo $row['Vitriungtuyen']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngày đăng: <span><?php echo $row['Ngaydang']; ?></span></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around py-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Trường : <span><?php echo $row['Tentruong']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngành : <span><?php echo $row['Nganhhoc']; ?> </span></div>
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
                            <p><?php echo $row['Kynangchuyenmon']; ?></p>
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
    
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <?php  if ($row['Tinhtrang'] == "Chấp nhận") {?>
                    <p class="text-success font-italic font-weight-medium">
                        Đã duyệt
                    </p>
                <?php } else {?>
                    <a href="/Employer/duyet-ho-so/yes"  class="btn btn-success">
                        Duyệt
                    </a>
                <?php } ?>
                <?php  if ($row['Tinhtrang'] == "Từ chối") {?>
                    <p class="text-danger font-italic font-weight-medium" id="btnUpdateForm">
                        Không chấp nhận
                    </p>
                <?php } else {?>
                    <a href="/Employer/duyet-ho-so/no"  class="btn btn-danger">
                        Từ chối
                    </a>
                <?php } ?>
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