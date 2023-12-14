<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quản trị viên</title>
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
                    <h1 class="mb-4 mb-md-0 text-white">Ngành / Lĩnh vực</h1>
                    <a href="/Admin/home/bo-sung-nganh-linh-vuc/" class="btn btn-danger mx-5 my-3 p-2 rounded-pill">Thêm ngành/lĩnh vực</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Thanh tìm kiếm ngành học -->
    <div class="container-fluid d-flex align-content-center justify-content-center">
        <div id="containerForm">
            <form action="/Admin/home" method="post" id="formsearch">
                <input type="text" name="keywords" id="" placeholder="Nhập tên ngành hoặc mã ngành">
                <button type="submit" name="searchBtn" class="btn btn-danger">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['searchBtn'])) {
            $keywords = $_POST['keywords'];
            $sqlsearch = "SELECT * FROM nganhhoc WHERE 
                        IDNganh LIKE '%$keywords%'
                        OR Tentiengviet LIKE '%$keywords%'
                        OR Tentienganh LIKE '%$keywords%'";
            $ressearch = mysqli_query($conn,$sqlsearch);
            if(mysqli_num_rows($ressearch) <= 0) {
        ?>
        <div class="container-fluid d-flex align-content-center justify-content-center">
            <p class="text-danger font-weight-bolder">Không tìm thấy kết quả theo yêu cầu của bạn !!!</p>
        </div>
        <?php } else {?>
    <!-- Khu vực hiển thị kết quả tìm kiềm -->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-sm-12">
                <p class="text-center text-success font-italic font-weight-medium">Danh sách có <?php echo mysqli_num_rows($ressearch); ?> kết quả được tìm thấy</p>
            </div>
        <?php 
            while($rowsearch=mysqli_fetch_array($ressearch)){
        ?>
            <div class="col-sm-3 d-flex align-content-center justify-content-center">
                <div class="card my-5 border border-primary" style="width:18rem; height:450px;border-radius:20px;">
                    <img src="/WebJobconnect/Admin/image/<?php echo $rowsearch['Hinhanh']; ?>" class="card-img-top border border-primary" style="height:200px;border-radius:20px;">
                    <div class="card-body">
                        <h5 class="card-title">Mã ngành: <?php echo $rowsearch['IDNganh']; ?></h5>
                        <p class="card-text text-danger font-italic font-weight-medium"><?php echo $rowsearch['Tentiengviet']; ?></p>
                        <p class="card-text text-info font-italic font-weight-medium"><?php echo $rowsearch['Tentienganh']; ?></p>
                        <div class="d-flex align-content-center justify-content-center">
                            <a href="/Employer/home/danh-sach-nganh-linh-vuc/thong-tin-chi-tiet/<?php echo $rowsearch['IDNganh']; ?>" class="btn btn-primary mx-2 p-2 flex-grow-1 rounded-pill">Thông tin chi tiết</a>
                            <script>
                                function confirmDelete(idNganh){
                                if (confirm("Bạn có chắc chắn muốn xóa ngành này ra khỏi hệ thống?")){
                                window.location.href="/Admin/home/xu-li-xoa-nganh-linh-vuc/" + idNganh;
                                }
                                }
                            </script>
                            <a href="#" onclick="confirmDelete(<?php echo $rowsearch['IDNganh']; ?>);" class="btn btn-danger rounded-pill">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } } }?>
        </div>
    </div>
    <!-- Nút hiển thị danh sách ngành/lĩnh vực -->
    <div class="container-fluid d-flex justify-content-center align-content-center py-5">
        <button class="btn btn-info rounded-pill" id="hiddenBtn">Hiển thị danh sách >>></button>
    </div>
    <!-- Liệt kê danh sách các ngành / lĩnh vực -->
    <div class="container-fluid my-5" style="display:none;" id="listIndus">
        <div class="row">
            <?php
                $conn = mysqli_connect("localhost","root","","jobconnect");
                $sql = "SELECT * FROM nganhhoc";
                $res = mysqli_query($conn,$sql);
                if (mysqli_num_rows($res) <= 0) echo '<div>Dữ liệu đang trống</div>';
                else {
                    while ($row=mysqli_fetch_array($res)){
            ?>
            <div class="col-sm-3 d-flex align-content-center justify-content-center">
                <div class="card my-5 border border-primary" style="width:18rem; height:450px;border-radius:20px;">
                    <img src="/WebJobconnect/Admin/image/<?php echo $row['Hinhanh']?>" class="card-img-top border border-primary" style="height:200px;border-radius:20px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Tentiengviet']?></h5>
                        <p class="m-0 p-2">Mã ngành: <?php echo $row['IDNganh']; ?></p>
                        <p class="m-0 p-2"><?php echo $row['Tentienganh'].' '; ?></p>
                        <div class="d-inline-flex">
                            <a href="/Admin/home/nganh-linhvuc/chi-tiet-nganh-linh-vuc/<?php echo $row['IDNganh']; ?>" class="btn btn-primary mx-2 p-2 flex-grow-1 rounded-pill">Thông tin chi tiết</a>
                            <script>
                                function confirmDelete(idNganh){
                                if (confirm("Bạn có chắc chắn muốn xóa ngành này ra khỏi hệ thống?")){
                                window.location.href="/Admin/home/xu-li-xoa-nganh-linh-vuc/" + idNganh;
                                }
                                }
                            </script>
                            <a href="#" onclick="confirmDelete(<?php echo $row['IDNganh']; ?>);" class="btn btn-danger rounded-pill">Xóa</a>
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
    <script src="/WebJobconnect//owlcarousel/owl.carousel.min.js"></script>

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