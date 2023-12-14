<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng tin tức</title>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
    <link href="/WebJobconnect/Employer/css/formUpdateAdmin.css" rel="stylesheet">

</head>
<body>
    <?php include('Topbar.php') ?>
    <?php include('Navbar.php') ?>

    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Đăng tin tức</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container1"> 
        <form class="form" action="/Admin/home/xu-li-dang-bai" method="post" enctype="multipart/form-data">
            <!-- Nội dung mở đầu -->
            <div class="input-box">
                <label>Tiêu đề bài viết<span class="text-danger">(*)</span></label>
                <input name="title" required="" type="text">
            </div>
            <div class="input-box">
                <label>Nội dung mở đầu<span class="text-danger">(*)</span></label>
                <textarea name="content" id="content">
                    Nội dung mở đầu...
                </textarea>
            </div>
            <div class="input-box">
                <label>Hình ảnh mở đầu<span class="text-danger">(*)</span></label>
                <input type="file" name="image">
            </div>

            <!-- Nội dung tiêu đề 1 -->
            <div class="input-box">
                <label>Tiêu đề 1<span class="text-danger">(*)</span></label>
                <input name="title1" required="" type="text">
            </div>
            <div class="input-box">
                <label>Nội dung tiêu đề 1<span class="text-danger">(*)</span></label>
                <textarea name="content1" id="content1">
                    Nội dung tiêu đề 1...
                </textarea>
            </div>
            <div class="input-box">
                <label>Hình ảnh tiêu đề 1<span class="text-danger">(*)</span></label>
                <input type="file" name="image1">
            </div>

            <!-- Nội dung tiêu đề 2 -->
            <div class="input-box">
                <label>Tiêu đề 2<span class="text-danger">(*)</span></label>
                <input name="title2" required="" type="text">
            </div>
            <div class="input-box">
                <label>Nội dung tiêu đề 2<span class="text-danger">(*)</span></label>
                <textarea name="content2" id="content2">
                    Nội dung tiêu đề 2...
                </textarea>
            </div>
            <div class="input-box">
                <label>Hình ảnh tiêu đề 2<span class="text-danger">(*)</span></label>
                <input type="file" name="image2">
            </div>
            <button type="submit">Đăng tin</button>
        </form>
        <script>
            ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#content1' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#content2' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
    </div>

    <?php include('Footer.php') ?>
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