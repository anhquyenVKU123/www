<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Danh sách nhân sự</title>
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

    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Nhân sự</h1>
                </div>
            </div>
        </div>
    </div>

    <?php
        $sql = "SELECT * FROM quantrivien";
        $res = mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) <= 0) {
    ?>
        <p class="text-danger font-weight-bolder">Không có dữ liệu để hiển thị</p>
    <?php
        } else {
    ?>
        <div class="d-flex align-items-center justify-content-center">
            <p class="text-primary font-weight-bold">Danh sách này có <?php echo mysqli_num_rows($res); ?> quản trị viên</p>
        </div>
    <!-- Liệt kê danh sách quản trị viên -->
    <div class="container-fluid my-5">
        <div class="row">
        <?php while ($row=mysqli_fetch_array($res)){ ?>
            <div class="col-sm-3 d-flex align-content-center justify-content-center">
                <div class="card my-5 border-primary" style="width:18rem;border:3px solid;border-radius:25px;overflow:hidden;">
                    <img src="/WebJobconnect/Admin/image/<?php echo $row['Avatar']; ?>" class="card-img-top border-primary" style="border-bottom:3px solid;height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Hovaten']; ?></h5>
                        <p class="card-text"><?php echo $row['SDT']; ?></p>
                        <p class="card-text"><?php echo $row['Chuyenmon']; ?></p>
                        <div class="d-flex align-content-center justify-content-center">
                            <a href="/Admin/home/danh-sach-ung-vien/chi-tiet-ung-vien/<?php echo $row['IDQuantri']; ?>" class="btn btn-primary mx-2 p-2 flex-grow-1 rounded-pill">Thông tin chi tiết</a>
                            <?php if ($row['IDQuantri'] != $_SESSION['id_admin']) {?>
                            <script>
                                function confirmDelete(id){
                                if (confirm("Bạn có chắc chắn muốn xóa quản trị viên này ra khỏi hệ thống?")){
                                    window.location.href="/Admin/home/xu-li-quan-tri-vien/" + id;
                                    }
                                }
                            </script>
                            <a href="#" onclick="confirmDelete('<?php echo $row['IDQuantri']; ?>');" class="btn btn-danger rounded-pill">Xóa</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }}?>
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