<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $idadmin = $_SESSION['id_admin'];
?>
<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    if ($_GET['IDAdmin'] != $_SESSION['id_admin']) {
        $idadmin = $_GET['IDAdmin'];
    } else {
        $idadmin = $_SESSION['id_admin'];
    }
    $sql = "SELECT * FROM quantrivien WHERE IDQuantri='".$idadmin."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thông tin Quản trị viên</title>
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
    <link href="/WebJobconnect/Admin/css/formUpdateAdmin.css" rel="stylesheet">
    <link rel="stylesheet" href="/WebJobconnect/Admin/css/avatar.css">
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
                    <h1 class="mb-4 mb-md-0 text-white">Thông tin Quản trị viên</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Admin/home/danh-sach-quan-tri-vien">Nhân sự</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['Hovaten']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    

    <!-- Hiển thị hình ảnh và thông tin chung-->
    <div class="container-fluid">
        <div class="d-flex flex-row row">
            <div class="col-md-3">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Ảnh đại diện</span>
                        <div id="avatar">
                            <?php if ($row['Avatar'] != "") {?>
                                <img src="/WebJobconnect/Admin/image/<?php echo $row['Avatar']; ?>" alt="Ảnh đại diện" style="width:300px;height:400px;border-radius:20px;">
                            <?php } else echo 'Chưa có ảnh đại diện'; ?>
                        </div>
                        <?php if($_GET['IDAdmin'] == $_SESSION['id_admin']) { ?>
                        <div class="d-inline">
                            <form action="/Admin/home/xu-li-cap-nhat-avatar-QTV" method="post" enctype="multipart/form-data">                              
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Thông tin cá nhân</span>
                        <div class="my-5">
                            Họ và tên: <?php echo $row['Hovaten']; ?> <span>Giới tính:<?php echo $row['Gioitinh']; ?></span> <span>Ngày sinh:<?php echo $row['Ngaysinh']; ?></span>
                        </div>
                        <div class="my-5">
                            SĐT: <?php echo $row['SDT']; ?><span>Email: <?php echo $row['Email']; ?></span>
                        </div>
                        <div class="my-5">
                            Địa chỉ:<?php echo $row['Diachi']; ?>
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
                <?php
                    $sql1 = "SELECT * FROM truongdaihoc WHERE IDTruong='".$row['IDTruong']."'";
                    $res1 = mysqli_query($conn,$sql1);
                    $rowacc = mysqli_fetch_array($res1);
                ?>
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Học vấn</span>
                        <div class="my-5">
                            Trường:<?php echo $rowacc['Tentruong']; ?>
                        </div>
                        <div class="my-5">
                            Chuyên môn:<?php echo $row  ['Chuyenmon']; ?>
                        </div>  
                    </div>
                </div>
            </div>          
        </div>
    </div>
                
    <!-- Form cập nhật thông tin cá nhân -->
    <?php if($_GET['IDAdmin'] == $_SESSION['id_admin']) { ?>
    <div class="title1" id="title3">
        <span>Cập nhật thông tin</span>
    </div>
    <div class="container1" id="signupAdmin"> 
      <form class="form" action="/Admin/home/xu-li-cap-nhat-thong-tin-QTV" method="get">
          <div class="input-box">
              <label>Họ và tên</label>
              <input name="fullname" required="" type="text">
          </div>
          <div class="input-box">
              <label>Email</label>
              <input name="email" required="" type="text">
          </div>
          <div class="column">
              <div class="input-box">
                <label>Số điện thoại</label>
                <input name="numberphone" required="" type="telephone">
              </div>
              <div class="input-box">
                <label>Ngày sinh</label>
                <input name="birthday" required="" type="text" placeholder="yy-mm-dd">
              </div>
          </div>
          <div class="gender-box">
            <label>Giới tính</label>
            <div class="gender-option">
              <div class="gender">
                <input checked="" name="gender" id="check-male" type="radio" value="Nam">
                <label for="check-male">Nam</label>
              </div>
              <div class="gender">
                <input name="gender" id="check-female" type="radio" value="Nữ">
                <label for="check-female">Nữ</label>
              </div>
            </div>
          </div>
          <div class="input-box address">
            <label>Địa chỉ</label>
            <div class="column">
                <div class="select-box">
                    <select name="city">
                        <option hidden="">Tỉnh/Thành phố</option>
                        <?php
                            $sql = "SELECT * FROM tinhthanh";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['TenTinhthanh']; ?>"><?php echo $row['TenTinhthanh']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            <div class="input-box" style="margin-top:0px;">
                <input name="district" required="" type="text" placeholder="Quận/huyện">
            </div>
            </div>
            <input name="detailAddress" required="" placeholder="Số nhà, đường, xã/phường,..." type="text">
          </div>
          <div class="input-box">
            <label> Học vấn </label>
            <div class="column">
            <div class="select-box">
                <select name="university">
                    <option hidden="">Trường Đại học</option>
                    <?php
                            $sql = "SELECT * FROM truongdaihoc";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['IDTruong']; ?>"><?php echo $row['Tentruong']; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="input-box" style="margin-top:0px;">
                <input name="levelStudy" required="" type="text" placeholder="Trình độ: kỹ sư, cử nhân,...">
            </div>
          </div>
          </div>
          <button type="submit">Cập nhật</button>
      </form>
    </div>
    <?php } ?>
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