<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thêm ngành/lĩnh vực</title>
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
                    <h1 class="mb-4 mb-md-0 text-white">Thêm ngành/lĩnh vực</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Admin/home">Ngành/Lĩnh vực</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Admin/home/bo-sung-nganh-linh-vuc">Thêm ngành/lĩnh vực</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
  
    
    <!-- Form thêm ngành / lĩnh vực vào trang web -->
    <div id="title2" class="container">
        <div style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Bổ sung ngành/lĩnh vực</div>
        <div class="containerForm">
        <div class="card">
                <form class="form" method="post" action="/Admin/home/xu-li-bo-sung-nganh-linh-vuc" enctype="multipart/form-data">
                    <div class="group">
                        <input placeholder="" name="id" type="text" required="">
                        <label>ID Ngành/Lĩnh vực</label>
                    </div>
                    <div class="group">
                        <input placeholder="" name="nameEng" type="text" required="">
                        <label>Tên Tiếng Anh</label>
                    </div>
                    <div class="group">
                        <input placeholder="" name="nameViet" type="text" required="">
                        <label>Tên Tiếng việt</label>
                    </div>
                    <div class="group">
                        <input placeholder="" name="abbreviate" type="text" required="">
                        <label>Viết tắt</label>
                    </div>
                    <div class="group">
                        <input type="file" name="image" id="">
                        <label>Hình ảnh</label>
                    </div>
                    <div class="group">
                        <textarea placeholder="" type="textarea" id="textarea" name="textarea" required="" rows="5"></textarea>
                        <label>Mô tả</label>
                    </div>
                    <button type="submit">Thêm ngành/lĩnh vực</button>
                </form>
                <div style="color:red;">
                    <?php if (isset($_GET['error'])) echo $_GET['error']; ?>
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
