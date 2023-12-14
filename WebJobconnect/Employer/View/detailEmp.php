<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $idemp = $_SESSION['id_employer'];
?>
<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    if ($_GET['IDEmp'] != $_SESSION['id_employer']) {
        $idemp = $_GET['IDEmp'];
    } else {
        $idemp = $_SESSION['id_employer'];
    }
    $sql = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$idemp."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin Nhà tuyển dụng</title>
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
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
    <link href="/WebJobconnect/Employer/css/formUpdateAdmin.css" rel="stylesheet">
    <link rel="stylesheet" href="/WebJobconnect/Employer/css/avatar.css">
    <link rel="stylesheet" href="/WebJobconnect/Employer/css/appliForm.css">
</head>
<style>
#header-carousel .carousel-item img {
  max-width: 100%;
  max-height: 100%;
  width: auto;
  height: auto;
  object-fit: contain;
  object-position: center;
}
#header-carousel .carousel-item img {
  width: 600px;
  height: 400px;
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
                    <h1 class="mb-4 mb-md-0 text-white">Thông tin Nhà tuyển dụng</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Employer/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['NameCompany']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    

    <!-- Hiển thị hình ảnh và thông tin chung-->
    <div class="container-fluid">
        <div class="d-flex flex-row row">
            <div class="col-lg-3">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Ảnh đại diện</span>
                        <div id="avatar">
                            <?php if ($row['Avatar'] != "") {?>
                                <img src="/WebJobconnect/Employer/image/<?php echo $row['Avatar']; ?>" alt="Ảnh đại diện" style="width:300px;height:400px;border-radius:20px;">
                            <?php } else echo 'Chưa có ảnh đại diện'; ?>
                        </div>
                        <div class="d-inline">
                            <form action="/Employer/cap-nhat-anh-dai-dien" method="post" enctype="multipart/form-data">                              
                                <input type="file" name="image" id="imageInput">
                                <input type="submit" id="btnSubImage" style="display:none;">
                            </form>
                            <script>
                                var imageInput = document.getElementById('imageInput');
                                var imageContainer = document.getElementById('avatar');

                                imageInput.addEventListener('change', function(event) {
                                    var file = event.target.files[0];
                                    var reader = new FileReader();
                                    
                                    reader.onload = function(e) {
                                        var img = document.createElement('img');
                                        img.src = e.target.result;
                                        // Điều chỉnh kích thước ảnh
                                        img.style.maxWidth = '300px';
                                        img.style.maxHeight = '400px';
                                        img.style.borderRadius = '20px'; 
                                    
                                        imageContainer.innerHTML = '';
                                        imageContainer.appendChild(img);
                                    };
                                    reader.readAsDataURL(file);
                                });
                            </script>
                        </div>
                        <div id="button">
                            <script>
                                function submitImage() {
                                    document.getElementById("btnSubImage").click();
                                }
                            </script>
                            <button class="btn btn-info" onclick="submitImage()">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin chung</span>
                        <div class="my-5">
                            <p>ID Công ty:<?php echo $row['IDEmployer']; ?></p>
                            <p>Tên công ty: <?php echo $row['NameCompany']; ?> </p>
                            <p>Giám đốc điều hành:<?php echo $row['CEO']; ?></p>
                            <p>Ngày thành lập:<?php echo $row['DateFoundation']; ?></p>
                            <p>Email: <?php echo $row['Email']; ?></p>
                            <p>Địa chỉ:<?php echo $row['Address']; ?></p>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>

    <?php
        $sql1 = "SELECT * FROM accountqt WHERE IDTaikhoan='".$row['IDTaikhoan']."'";
        $res1 = mysqli_query($conn,$sql1);
        $rowacc = mysqli_fetch_array($res1);
    ?>
    <!-- Hiển thị thông tin tài khoản và học vấn-->
    <div class="container-fluid">
        <div class="d-flex flex-row row">
            <div class="col-md-6">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin tài khoản</span>
                        <div class="my-5">
                            ID Tài khoản: <?php echo $rowacc['IDTaikhoan']; ?>
                        </div>
                        <div class="my-5">
                            Tên đăng nhập: <?php echo $rowacc['Tendangnhap']; ?>
                        </div>
                        <div class="my-5">
                            Mật khẩu: <?php echo $rowacc['Matkhau']; ?>
                        </div>    
                        <div class="my-5">
                            Vai trò: <?php echo $rowacc['Vaitro']; ?>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Ngành/Lĩnh vực</span>
                        <div class="my-5">
                            <?php echo $row['Industry']; ?>
                        </div>  
                    </div>
                </div>
            </div>          
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Tổng quan về nhà tuyển dụng</span>
            </div>
        </div>
        <?php if ($row['DetailComp'] == "") { echo '<p class="text-center text-danger font-italic font-weight-bolder">Không có thông tin !!!</p>'; } else {?>
        <div id="item" class="my-4" style="width:auto;">
        <?php echo $row['DetailComp']; ?>
        </div>
        <?php  } ?>
    </div>
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Một số hình ảnh</span>
            </div>
        </div>
    </div>
    <?php 
        $sqlimage = "SELECT*FROM hinhanhnhatuyendung WHERE IDEmployer='".$_SESSION['id_employer']."' LIMIT 1";
        $resimage = mysqli_query($conn,$sqlimage);
        $rowimage=mysqli_fetch_array($resimage);
        if (mysqli_num_rows($resimage) <= 0) {
    ?>
    <div class="d-flex align-content-center justify-content-center">
        <p class="text-danger font-italic font-weight-bolder">Chưa cập nhật hình ảnh!!!</p>
    </div>
    <?php } else {?>
    <div class="container-fluid my-5 py-3">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/WebJobconnect/Employer/image/<?php echo $rowimage['NameImage']; ?>" alt="Image">
                </div>
                <?php 
                    $sqlimage = "SELECT*FROM hinhanhnhatuyendung WHERE IDEmployer='".$_SESSION['id_employer']."' LIMIT 999999999 OFFSET 1";
                    $resimage = mysqli_query($conn,$sqlimage);
                    while ($rowimage=mysqli_fetch_array($resimage)) {
                ?>
                <div class="carousel-item">
                    <img class="w-100" src="/WebJobconnect/Employer/image/<?php echo $rowimage['NameImage']; ?>" alt="Image">
                </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-warning" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary btn btn-warning" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="d-flex align-content-center justify-content-center">
        <form class="d-flex align-content-center justify-content-center" id="imageForm" action="/Employer/xu-li-them-hinh-anh" method="post" enctype="multipart/form-data">
            <input type="file" id="imageInput" name="images[]" multiple class="btn btn-success"> <br>
            <button type="submit" class="btn btn-danger">Thêm hình ảnh</button>
        </form>
    </div>
    

    <!-- Form cập nhật thông tin cá nhân -->
    <div class="title1" id="title3">
        <span>Cập nhật thông tin</span>
    </div>
    <div class="container1" id="signupEmployer"> 
      <form class="form" action="/Employer/cap-nhat-thong-tin" method="get">
          <div class="input-box">
              <label>Tên công ty ( tập đoàn, cơ sở )</label>
              <input name="nameComp" required="" type="text" value="<?php echo $row['NameCompany']; ?>">
          </div>
          <div class="column">
              <div class="input-box">
                <label>Giám đốc điều hành ( CEO )</label>
                <input name="ceo" required="" type="text" value="<?php echo $row['CEO']; ?>">
              </div>
              <div class="input-box">
                <label>Ngày thành lập</label>
                <input name="dateFoundation" required="" type="text" placeholder="yy-mm-dd" value="<?php echo $row['DateFoundation']; ?>">
              </div>
          </div>
          <div class="input-box">
              <label>Email</label>
              <input name="email" required="" type="text" value="<?php echo $row['Email']; ?>">
          </div>
          <div class="input-box address">
            <label>Trụ sở chính</label>
            <div class="column">
                <div class="select-box">
                    <select name="city">
                        <option hidden="">Tỉnh/Thành phố</option>
                        <?php
                            $sqlcity = "SELECT * FROM tinhthanh";
                            $rescity = mysqli_query($conn,$sqlcity);
                            while ($rowcity=mysqli_fetch_array($rescity)){
                        ?>
                        <option value="<?php echo $rowcity['TenTinhthanh']; ?>"><?php echo $rowcity['TenTinhthanh']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-box" style="margin-top:0px;">
                  <input name="district" required="" type="text" placeholder="Quận/huyện">
                </div>
            </div>
            <input name="detailAddress" required="" placeholder="Số nhà, đường, xã/phường,..." type="text" value="<?php echo $row['Address']; ?>">
          </div>
          <div class="input-box address">
            <label> Lĩnh vực </label>
            <div class="select-box">
                <select name="industry">
                    <option hidden="">Ngành/Lĩnh vực</option>
                    <?php
                            $sqlin = "SELECT * FROM nganhhoc";
                            $resin = mysqli_query($conn,$sqlin);
                            while ($rowin=mysqli_fetch_array($resin)){
                        ?>
                        <option value="<?php echo $rowin['Tentiengviet']; ?>"><?php echo $rowin['Tentiengviet']; ?></option>
                        <?php } ?>
                </select>
            </div>
          </div>
          <div class="input-box">
              <label>Số lượng nhân viên</label>
              <input name="employees" required="" type="text" value="<?php echo $row['TotalEmployees']; ?>">
          </div>
          <div class="input-box">
              <label>Thông tin chi tiết</label>
              <textarea name="detail" id="detailCompany" type="text" placeholder="Giới thiệu tổng quan về công ty"><?php echo $row['DetailComp']; ?></textarea>
          </div>
          <button>Cập nhật</button>
          <script>
            ClassicEditor
            .create( document.querySelector( '#detailCompany' ) )
            .catch( error => {
                console.error( error );
            } );
          </script>
      </form>
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

<!-- Gắn sự kiện hiển thị Form -->
<script>
    var button1 = document.getElementById("btnUpdate");

    var div1 = document.getElementById("title1");

    button1.addEventListener("click", function() {
      // Kiểm tra trạng thái hiển thị của các thẻ div trước đó
      if (div1.style.display == "none") {
        // Nếu div đang ẩn, thì hiển thị nó
        div1.style.display = "block";
      } else {
        div1.style.display = "none";
      }
    });
</script>

<!-- Gắn sự kiện cuộn trang tự động đến thẻ div -->
<script>
    function scrollToDiv() {
        var divElement = document.getElementById("title1");
        divElement.scrollIntoView({ behavior: "smooth" });
    }
</script>