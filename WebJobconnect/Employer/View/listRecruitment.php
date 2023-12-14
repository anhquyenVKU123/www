<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT emp.Avatar,emp.NameCompany,tin.*
                FROM tintuyendung tin
                JOIN nhatuyendung emp ON emp.IDEmployer=tin.IDEmployer
                WHERE tin.IDEmployer='".$_SESSION['id_employer']."'";
    $res = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nhà tuyển dụng</title>
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
    #bolocForm select {
        width:60%;
    }
</style>
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
                    <h1 class="mb-4 mb-md-0 text-white">Danh sách tin tuyển dụng</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Employer/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white">Danh sách tin tuyển dụng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <!--Hiển thị danh sách tin của công ty-->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-primary font-weight-medium">Danh sách tin của công ty</p>
                </div>
                <?php
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="d-flex flex-row mb-5 border-info position-relative" style="border:3px solid;height:100%;">
                        <div class="p-2" style="width:100%;">
                            <div class="border-info d-flex align-items-center justify-item-center" style="border-bottom:3px solid;">
                                <img src="/WebJobconnect/Employer/image/<?php echo $row['Avatar']; ?>" alt="" class="border-info rounded-circle" style="border:3px solid;width:50px;height:50px;">
                                <p class="text-center text-dark font-weight-medium"><?php echo $row['NameCompany']; ?></p>
                            </div>
                            <div id="item" class="col-sm-12" style="height:150px;">
                                <span class="text-primary font-weight-medium"><?php echo $row['TenTin']; ?></span>
                                <p class="text-success font-italic font-weight-medium">Ngày đăng: <?php echo $row['Ngaydang']; ?></p>
                                <p class="text-danger font-italic font-weight-medium">Mức lương: <?php echo $row['MucLuong']; ?></p>
                                <p class="text-dark font-italic font-weight-medium">Ngành/Lĩnh vực: <?php echo $row['Nganh']; ?></p>
                                <div class="d-flex flex-row justify-content-end position-absolute" style="bottom:-50px;left:0;right:0px;">
                                    <?php
                                        $sql1 = "SELECT Ngayhethan FROM tintuyendung WHERE IDTin='".$row['IDTin']."'";
                                        $res1 = mysqli_query($conn,$sql1);
                                        $row1 = mysqli_fetch_array($res1);
                                        $currentDate = date('Y-m-d');
                                        if ($currentDate > $row1['Ngayhethan']) {
                                            echo '<p class="m-2 text-danger">Hết hạn</p>';
                                        } else {
                                            $remainingDays = floor((strtotime($row1['Ngayhethan']) - strtotime($currentDate)) / (60 * 60 * 24));
                                            echo '<p class="m-2 text-info">Còn '.$remainingDays.' ngày</p>';
                                        } 
                                    ?>
                                    <p class="m-2 text-black">
                                        <?php if ($row['SoLuongDK'] == 0) {
                                                    echo '0 đơn';
                                                } else if ($row['Soluongtuyen'] > $row['Duyet']){
                                                            echo $row['SoLuongDK'].' đơn';
                                                        } else if ($row['Soluongtuyen'] == $row['Duyet']){
                                                            echo 'Đã đủ';
                                                        }
                                        ?>
                                    </p>
                                    <a href="/Employer/home/danh-sach-tin-tuyen-dung/chi-tiet-tin-tuyen-dung/<?php echo $row['IDTin']; ?>" class="btn btn-success">Xem</a>
                                    <script>
                                        function confirmDelete(idtin){
                                            if (confirm("Bạn có chắc chắn muốn xóa tin này?")){
                                                window.location.href="/Employer/xoa-tin-tuyen-dung/" + idtin;
                                                }
                                            }
                                    </script>
                                    <a href="" onclick="confirmDelete('<?php echo $row['IDTin']; ?>');" class="btn btn-danger mx-2">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Working Process End -->

    <!-- Nút hiển thị danh sách tin khác -->
    <div class="container-fluid d-flex justify-content-center align-content-center py-5">
        <button class="btn btn-info rounded-pill" id="hiddenBtn">Ẩn các tin khác <<<</button>
    </div>
    <!-- Hiển thị danh sách tin khác-->
    <?php
        $sqlanother = "SELECT emp.Avatar,emp.NameCompany,tin.*
                        FROM tintuyendung tin
                        JOIN nhatuyendung emp ON emp.IDEmployer = tin.IDEmployer
                        WHERE tin.IDEmployer!='".$_SESSION['id_employer']."'";
        $resanother = mysqli_query($conn,$sqlanother);
    ?>
    <div class="container-fluid pt-5" style="display:block;" id="listIndus">
        <div class="container">
            <div class="row">
                <?php
                    while ($rowanother=mysqli_fetch_array($resanother)) {
                ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="d-flex flex-row mb-5 border-info position-relative" style="border:3px solid;height:100%;">
                        <div class="p-2" style="width:100%;">
                            <div class="border-info d-flex align-items-center justify-item-center" style="border-bottom:3px solid;">
                                <img src="/WebJobconnect/Employer/image/<?php echo $rowanother['Avatar']; ?>" alt="" class="border-info rounded-circle" style="border:3px solid;width:50px;height:50px;">
                                <p class="text-center text-dark font-weight-medium"><?php echo $rowanother['NameCompany']; ?></p>
                            </div>
                            <div id="item" class="col-sm-12" style="height:150px;">
                                <span class="text-primary font-weight-medium"><?php echo $rowanother['TenTin']; ?></span>
                                <p class="text-success font-italic font-weight-medium">Ngày đăng: <?php echo $rowanother['Ngaydang']; ?></p>
                                <p class="text-danger font-italic font-weight-medium">Mức lương: <?php echo $rowanother['MucLuong']; ?></p>
                                <p class="text-dark font-italic font-weight-medium">Ngành/Lĩnh vực: <?php echo $rowanother['Nganh']; ?></p>
                                <div class="d-flex flex-row justify-content-end position-absolute" style="bottom:-50px;left:0;right:0px;">
                                    <?php
                                        $sql1 = "SELECT Ngayhethan FROM tintuyendung WHERE IDTin='".$rowanother['IDTin']."'";
                                        $res1 = mysqli_query($conn,$sql1);
                                        $row1 = mysqli_fetch_array($res1);
                                        $currentDate = date('Y-m-d');
                                        if ($currentDate > $row1['Ngayhethan']) {
                                            echo '<p class="m-2 text-danger">Hết hạn</p>';
                                        } else {
                                            $remainingDays = floor((strtotime($row1['Ngayhethan']) - strtotime($currentDate)) / (60 * 60 * 24));
                                            echo '<p class="m-2 text-info">Còn '.$remainingDays.' ngày</p>';
                                        } 
                                    ?>
                                    <p class="m-2 text-black">
                                        <?php if ($rowanother['SoLuongDK'] == 0) {
                                                    echo '0 đơn';
                                                } else if ($rowanother['Soluongtuyen'] > $rowanother['Duyet']){
                                                            echo $rowanother['SoLuongDK'].' đơn';
                                                        } else if ($rowanother['Soluongtuyen'] == $rowanother['Duyet']){
                                                            echo 'Đủ số lượng';
                                                        }
                                        ?>
                                    </p>
                                    <a href="/Employer/home/danh-sach-tin-tuyen-dung/chi-tiet-tin-tuyen-dung/<?php echo $rowanother['IDTin']; ?>" class="btn btn-success">Xem</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!--Footer Component-->
    <?php include('Footer.php') ?>
    <!-- Footer Component -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning back-to-top text-black"><i class="fa fa-angle-double-up"></i></a>

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
            button.innerText = "Danh sách tin khác >>>";
        } else {
            div.style.display = "block";
            button.innerText = "Ẩn các tin khác <<<";
        }
    });
</script>