<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM tintuyendung WHERE IDTin='".$_GET['IDRec']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tin tuyển dụng</title>
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
    <?php
        $sqlind = "SELECT * FROM nganhhoc WHERE Tentiengviet='".$row['Nganh']."'";
        $resind = mysqli_query($conn,$sqlind);
        $rowind = mysqli_fetch_array($resind);
    ?>
    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Tin tuyển dụng</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Admin/home">Ngành/Lĩnh vực</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Admin/home/nganh-linhvuc/chi-tiet-nganh-linh-vuc/<?php echo $rowind['IDNganh']; ?>"><?php echo $row['Nganh']; ?></a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['TenTin']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    <?php
        $sqlemp = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$row['IDEmployer']."'";
        $resemp = mysqli_query($conn,$sqlemp);
        $rowemp = mysqli_fetch_array($resemp);
    ?>
    <!-- Tiêu đề tin tuyển dụng -->
    <div class="container-fluid bg-primary" style="width:100%;height:auto;margin-top:-100px;">
        <div class="d-flex align-content-center justify-content-center">
            <div class="text-white text-uppercase my-3" style="font-size:40px;"><?php echo $row['TenTin']; ?></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around my-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Công ty: <span><?php echo $rowemp['NameCompany']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Giám đốc điều hành: <span><?php echo $rowemp['CEO']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngày hết hạn: <span><?php echo $row['Ngayhethan']; ?></span></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around py-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngành: <span><?php echo $row['Nganh']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Mức lương: <span><?php echo $row['MucLuong']; ?> VNĐ</span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Loại hình công việc: <span><?php echo $row['LoaiCV']; ?></span></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Vị trí ứng tuyển</span>
                        <div class="my-5">
                            <p><?php echo $row['Vitri']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Kinh nghiệm</span>
                        <div class="my-5">
                            <?php echo $row['Kinhnghiem']; ?>
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
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Bằng cấp/Chứng chỉ</span>
                        <div class="my-5">
                            <p><?php echo $row['HocVan']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Tiến trình ứng tuyển</span>
                        <div class="my-5">
                            <p>Cần tuyển: <?php echo $row['Soluongtuyen']; ?></p>
                            <p>Chờ duyệt: <?php echo $row['SoLuongDK']; ?></p>
                            <p>Còn lại: <?php echo $row['Soluongtuyen']-$row['SoLuongDK']; ?></p>
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
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Mô tả công việc</span>
                        <div class="my-5">
                                <div class="my-4" style="width:auto;">
                                <?php echo $row['Mota']; ?>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Yêu cầu kĩ năng</span>
                        <div class="my-5">
                            <div class="my-4" style="width:auto;">
                                <?php echo $row['Kinang']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Địa điểm làm việc</span>
            </div>
        </div>

        <div class="my-4" style="width:auto;padding-left:95px;">
        <?php echo $row['Diadiem']; ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Liên hệ</span>
            </div>
        </div>

        <div class="my-4" style="width:auto;padding-left:95px;">
        <?php echo $row['Lienhe']; ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 30px 0 10px 95px;">Đơn ứng tuyển</span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex flex-column my-5 row">
        <?php
            $sqlhoso = "SELECT*FROM hosotuyendung WHERE IDTin='".$row['IDTin']."'";
            $reshoso = mysqli_query($conn,$sqlhoso);
            while ($rowhoso=mysqli_fetch_array($reshoso)) {
        ?>
            <div id="item" class="col-sm-12">
                <span><?php echo $rowhoso['Tenhoso']; ?></span>
                <p>Ứng viên: <?php 
                                $sql = "SELECT*FROM ungvien WHERE IDUngvien='".$rowhoso['IDUngvien']."'";
                                $res = mysqli_query($conn,$sql);
                                $row =mysqli_fetch_array($res);
                                echo $row['Hovaten'];
                            ?></p>
                <p>Ngày ứng tuyển: <?php echo $rowhoso['Ngaydang']; ?></p>
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