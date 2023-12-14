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
    <title>Danh sách nhà tuyển dụng</title>
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
<style>
    #containerForm{
        width:50%;
        height:50%;
    }
    #formsearch input{
        padding:10px;
        width: 85%;
        height:100%;
        outline:none;
        border-radius:30px;
        border: 2px solid blue;
    }
    #formsearch button{
        height:46px;
        border-radius:30px;
        border: 2px solid; 
    }
</style>
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
                    <h1 class="mb-4 mb-md-0 text-white">Nhà tuyển dụng</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Thanh tìm kiếm nhà tuyển dụng -->
    <div class="container-fluid d-flex align-content-center justify-content-center">
        <div id="containerForm">
            <form action="/Candidate/home/danh-sach-nha-tuyen-dung" method="post" id="formsearch">
                <input type="text" name="keywords" id="" placeholder="Nhập tên công ty, lĩnh vực hoặc địa điểm">
                <button type="submit" name="searchBtn" class="btn btn-danger">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['searchBtn'])) {
            $keywords = $_POST['keywords'];
            $sqlsearch = "SELECT * FROM nhatuyendung WHERE 
                        NameCompany LIKE '%$keywords%'
                        OR Industry LIKE '%$keywords%'
                        OR Address LIKE '%$keywords%'";
            $ressearch = mysqli_query($conn,$sqlsearch);
            if(mysqli_num_rows($ressearch) <= 0) {
        ?>
        <div class="container-fluid d-flex align-content-center justify-content-center">
            <p class="text-danger font-weight-bolder">Không tìm thấy kết quả theo yêu cầu của bạn !!!</p>
        </div>
        <?php } else {?>
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-center text-success font-italic font-weight-medium">Danh sách có <?php echo mysqli_num_rows($ressearch); ?> kết quả được tìm thấy</p>
                </div>
                <?php 
                    while($rowsearch=mysqli_fetch_array($ressearch)){
                ?>
                <div class="col-sm-3 d-flex align-content-center justify-content-center">
                <div class="card my-5 border-primary" style="width:18rem;border:3px solid;border-radius:25px;overflow:hidden;">
                    <img src="/WebJobconnect/Employer/image/<?php echo $rowsearch['Avatar']; ?>" class="card-img-top border-primary" style="border-bottom:3px solid;height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rowsearch['NameCompany']; ?></h5>
                        <p class="card-text">Giám đốc điều hành: <?php echo $rowsearch['CEO']; ?></p>
                        <p class="card-text">Lĩnh vực: <?php echo $rowsearch['Industry']; ?></p>
                        <div class="d-flex align-content-center justify-content-center">
                            <a href="/Candidate/home/danh-sach-nha-tuyen-dung/thong-tin-chi-tiet/<?php echo $rowsearch['IDEmployer']; ?>" class="btn btn-primary mx-2 p-2 flex-grow-1 rounded-pill">Thông tin chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } }?>
        </div>
    </div>
    
    <!-- Nút hiển thị danh sách -->
    <div class="container-fluid d-flex justify-content-center align-content-center py-5">
        <button class="btn btn-info rounded-pill" id="hiddenBtn">Ẩn danh sách <<<</button>
    </div>
    <!-- Liệt kê danh sách nhà tuyển dụng -->
    <div class="container-fluid my-5" style="display:block;" id="listIndus">
        <div class="row">
            <?php
                $sql = "SELECT * FROM nhatuyendung";
                $res = mysqli_query($conn,$sql);
                if (mysqli_num_rows($res) <= 0) echo '<div>Dữ liệu đang trống</div>';
                else {
                    while ($row=mysqli_fetch_array($res)){
            ?>
            <div class="col-sm-3 d-flex align-content-center justify-content-center">
                <div class="card my-5 border-primary" style="width:18rem;border:3px solid;border-radius:25px;overflow:hidden;">
                    <img src="/WebJobconnect/Employer/image/<?php echo $row['Avatar']; ?>" class="card-img-top border-primary" style="border-bottom:3px solid;height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['NameCompany']; ?></h5>
                        <p class="card-text">Giám đốc điều hành: <?php echo $row['CEO']; ?></p>
                        <p class="card-text">Lĩnh vực: <?php echo $row['Industry']; ?></p>
                        <div class="d-flex align-content-center justify-content-center">
                            <a href="/Candidate/home/danh-sach-nha-tuyen-dung/thong-tin-chi-tiet/<?php echo $row['IDEmployer']; ?>" class="btn btn-primary mx-2 p-2 flex-grow-1 rounded-pill">Thông tin chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } }?>
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
<script>
    var button = document.getElementById("hiddenBtn");
    var div = document.getElementById("listIndus");
    button.addEventListener("click",function(){
        if(div.style.display=="block"){
            div.style.display = "none";
            button.innerText = "Hiển thị danh sách >>>";
        } else {
            div.style.display = "block";
            button.innerText = "Ẩn danh sách <<<";
        }
    });
</script>