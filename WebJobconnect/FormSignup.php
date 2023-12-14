<?php
  $conn = mysqli_connect("localhost","root","","jobconnect");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Đăng kí</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css"/>


    <!-- Libraries Stylesheet -->
    <link href="/WebJobconnect/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="/WebJobconnect/css/style.css" >
    <link rel="stylesheet" href="/WebJobconnect/css/formsignup.css">
</head>
<style>
    .align-content-center{
        font-size:5mm;
    }
</style>
<body>
    <?php include('Topbar.php') ?>

    <?php include('Navbar.php') ?>

    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Đăng kí</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/home/dang-ki">Đăng kí</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Phân quyền đăng kí -->
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <div class="align-content-center text-center">
                <i class="fa-solid fa-graduation-cap" style="color: #000000;"></i>
                <p>Sinh viên</p>
                <button class="btn btn-info" id="btnStudent">Đăng kí</button>
            </div>
            <div class="align-content-center text-center">
                <i class="fa-solid fa-user-tie" style="color: #000000;"></i>
                <p>Nhà tuyển dụng</p>
                <button class="btn btn-info" id="btnEmployer">Đăng kí</button>
            </div>
            <div class="align-content-center text-center">
                <i class="fa-solid fa-gear" style="color: #000000;"></i>
                <p>Quản trị viên</p>
                <button class="btn btn-info" id="btnAdmin">Đăng kí</button>
            </div>
        </div>
    </div>
    
    <!-- Form đăng kí cho sinh viên -->
    <div class="title1" id="title1" style="display:none;">
        <span>Sinh viên</span>
    </div>
    <div class="container1" id="signupStudent" style="display:none;"> 
      <form class="form" action="/Candidate/them-ung-vien" method="get">
          <div class="column">
              <div class="input-box">
                <label>Tên đăng nhập</label>
                <input name="username" required="" type="text">
              </div>
              <div class="input-box">
                <label>Mật khẩu</label>
                <input name="password" required="" type="password">
              </div>
          </div>
          <div class="input-box">
              <label>Họ và tên</label>
              <input name="fullname" required="" type="text">
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
          <div class="input-box">
              <label>Email</label>
              <input name="email" required="" type="text">
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
          <div class="input-box address">
            <label> Học vấn </label>
            <div class="column">
            <div class="select-box">
                <select name="university">
                    <option hidden="">Trường Đại học</option>
                    <?php
                            $sql = "SELECT * FROM truongdaihoc ORDER BY IDTinhthanh ASC";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['IDTruong']; ?>"><?php echo $row['Tentruong']; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="select-box">
                <select name="industry">
                    <option hidden="">Ngành/Lĩnh vực</option>
                    <?php
                            $sql = "SELECT * FROM nganhhoc ORDER BY Tentiengviet ASC";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['Tentiengviet']; ?>"><?php echo $row['Tentiengviet']; ?></option>
                        <?php } ?>
                </select>
            </div>
          </div>
          </div>
          <button type="submit">Đăng kí</button>
      </form>
    </div>

    <!-- Form đăng kí cho nhà tuyển dụng -->
    <div class="title1" id="title2" style="display:none;">
        <span>Nhà tuyển dụng</span>
    </div>
    <div class="container1" id="signupEmployer" style="display:none;"> 
      <form class="form" action="/Employer/them-nha-tuyen-dung" method="get">
          <div class="column">
              <div class="input-box">
                <label>Tên đăng nhập</label>
                <input name="username" required="" type="text">
              </div>
              <div class="input-box">
                <label>Mật khẩu</label>
                <input name="password" required="" type="password">
              </div>
          </div>
          <div class="input-box">
              <label>Tên công ty ( tập đoàn, cơ sở )</label>
              <input name="nameComp" required="" type="text">
          </div>
          <div class="column">
              <div class="input-box">
                <label>Giám đốc điều hành ( CEO )</label>
                <input name="ceo" required="" type="text">
              </div>
              <div class="input-box">
                <label>Ngày thành lập</label>
                <input name="dateFoundation" required="" type="text" placeholder="yy-mm-dd">
              </div>
          </div>
          <div class="input-box">
              <label>Email</label>
              <input name="email" required="" type="text">
          </div>
          <div class="input-box address">
            <label>Trụ sở chính</label>
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
          <div class="input-box address">
            <label> Lĩnh vực </label>
            <div class="select-box">
                <select name="industry">
                    <option hidden="">Ngành/Lĩnh vực</option>
                    <?php
                            $sql = "SELECT * FROM nganhhoc ORDER BY Tentiengviet ASC";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['Tentiengviet']; ?>"><?php echo $row['Tentiengviet']; ?></option>
                        <?php } ?>
                </select>
            </div>
          </div>
          <button type="submit">Đăng kí</button>
      </form>
    </div>

    <!-- Form đăng kí cho quản trị viên -->
    <?php if(isset($_GET['error'])) { ?>
        <div class="d-flex align-content-center justify-content-center">
          <p style="color:#dc3545;"><?php echo $_GET['error']; ?></p>
        </div>
    <?php } ?>
    <div class="title1" id="title3" style="display:none;">
        <span>Quản trị viên</span>
    </div>
    <div class="container1" id="signupAdmin" style="display:none;"> 
      <form class="form" action="/Admin/home/xu-li-bo-sung-quan-tri-vien" method="get">
          <div class="column">
              <div class="input-box">
                <label>Tên đăng nhập</label>
                <input name="username" required="" type="text">
              </div>
              <div class="input-box">
                <label>Mật khẩu</label>
                <input name="password" required="" type="password">
              </div>
          </div>
          <div class="input-box">
              <label>Họ và tên</label>
              <input name="fullname" required="" type="text">
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
          <div class="input-box">
              <label>Email</label>
              <input name="email" required="" type="text">
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
                            $sql = "SELECT * FROM truongdaihoc ORDER BY IDTinhthanh ASC";
                            $res = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['IDTruong']; ?>"><?php echo $row['Tentruong']; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="input-box" style="margin-top:0px;">
                <input name="level" required="" type="text" placeholder="Trình độ: kỹ sư, cử nhân,...">
            </div>
          </div>
          <div class="input-box">
              <label>Mã giới thiệu</label>
              <input name="referralCode" required="" type="text" placeholder="Nhập mã giới thiệu của Admin">
          </div>
          </div>
          <button type="submit">Đăng kí</button>
      </form>
    </div>
    <!--Footer Component-->
    <?php include('Footer.php') ?>
    <!-- Footer Component -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/WebJobconnect/lib/easing/easing.min.js"></script>
<script src="/WebJobconnect/lib/waypoints/waypoints.min.js"></script>
<script src="/WebJobconnect/lib/counterup/counterup.min.js"></script>
<script src="/WebJobconnect/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="/WebJobconnect/mail/jqBootstrapValidation.min.js"></script>
<script src="/WebJobconnect/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="/WebJobconnect/js/main.js"></script>
</body>
</html>
<!-- Sự kiện hiển thị form đăng kí -->
<script>
    // Lấy tham chiếu đến button và div
    var button1 = document.getElementById("btnStudent");
    var button2 = document.getElementById("btnEmployer");
    var button3 = document.getElementById("btnAdmin");

    var div1 = document.getElementById("title1");
    var div2 = document.getElementById("title2");
    var div3 = document.getElementById("title3");
    
    var div11 = document.getElementById("signupStudent");
    var div22 = document.getElementById("signupEmployer");
    var div33 = document.getElementById("signupAdmin");

    button1.addEventListener("click", function() {
      // Kiểm tra trạng thái hiển thị của các thẻ div trước đó
      if (div2.style.display == "block" || div3.style.display == "block") {
        // Nếu div đang ẩn, thì hiển thị nó
        div1.style.display = "block";
        div11.style.display = "block";

        div2.style.display = "none";
        div3.style.display = "none";
        div22.style.display = "none";
        div33.style.display = "none";
      } else {
        div1.style.display = "block";
        div11.style.display = "block";
        return;
      }
    });

    button2.addEventListener("click", function() {
      // Kiểm tra trạng thái hiển thị của các thẻ div trước đó
      if (div1.style.display == "block" || div3.style.display == "block") {
        // Nếu div đang ẩn, thì hiển thị nó
        div2.style.display = "block";
        div22.style.display = "block";

        div1.style.display = "none";
        div3.style.display = "none";
        div11.style.display = "none";
        div33.style.display = "none";
      } else {
        div2.style.display = "block";
        div22.style.display = "block";
        return;
      }
    });

    button3.addEventListener("click", function() {
      // Kiểm tra trạng thái hiển thị của các thẻ div trước đó
      if (div2.style.display == "block" || div1.style.display == "block") {
        // Nếu div đang ẩn, thì hiển thị nó
        div3.style.display = "block";
        div33.style.display = "block";

        div2.style.display = "none";
        div1.style.display = "none";
        div22.style.display = "none";
        div11.style.display = "none";
      } else {
        div3.style.display = "block";
        div33.style.display = "block";
        return;
      }
    });
</script>