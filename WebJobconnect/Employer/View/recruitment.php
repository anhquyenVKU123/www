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
    <link href="/WebJobconnect/Employer/css/formUpdateAdmin.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
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
                    <h1 class="mb-4 mb-md-0 text-white">Tin tuyển dụng</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Employer/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Employer/home/mau-tin-tuyen-dung">Tin tuyển dụng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    
    <!-- Form đăng đơn tuyển dụng -->
    <div class="container1"> 
      <form class="form" action="/Employer/them-tin-tuyen-dung" method="get">
          <div class="input-box">
              <label>Tên tin ứng tuyển<span class="text-danger">(*)</span></label>
              <input name="name" required="" type="text">
          </div>
          <div class="input-box address">
                <label>Ngành/Lĩnh vực tuyển dụng<span class="text-danger">(*)</span></label>
                <div class="select-box">
                <select name="industry">
                    <option value="">Ngành/Lĩnh vực</option>
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
          <div class="column">
            <div class="input-box address">
                    <label>Trình độ học vấn<span class="text-danger">(*)</span></label>
                    <div class="select-box" style="margin-top:5px;">
                        <select name="diploma" >
                            <option value="">Trình độ học vấn</option>
                            <option value="Không yêu cầu">Không yêu cầu</option>
                            <option value="Đại học trở lên">Đại học trở lên</option>
                            <option value="Cao Đẳng trở lên">Cao Đẳng trở lên</option>
                            <option value="THPT trở lên">THPT trở lên</option>
                            <option value="Trung cấp trở lên">Trung cấp trở lên</option>
                            <option value="Cử nhân trở lên">Cử nhân trở lên</option>
                            <option value="Thạc sĩ trở lên">Thạc sĩ trở lên</option>
                        </select>
                    </div>
            </div>
            <div class="input-box address">
                <label>Loại hình công việc<span class="text-danger">(*)</span></label>
                    <div class="select-box" style="margin-top:5px;">
                        <select name="worktype" >
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Online">Online</option>
                            <option value="Hợp đồng">Hợp đồng</option>
                        </select>
                    </div>
            </div>
          </div>
          <div class="column">
            <div class="input-box address">
                    <label>Vị trí công việc<span class="text-danger">(*)</span></label>
                    <div class="select-box" style="margin-top:5px;">
                        <select name="position" >
                            <option value="">Vị trí công việc</option>
                            <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                            <option value="Thực tập sinh">Thực tập sinh</option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Trưởng nhóm">Trưởng nhóm</option>
                            <option value="Phó tổ trưởng">Phó tổ trưởng</option>
                            <option value="Tổ trưởng">Tổ trưởng</option>
                            <option value="Phó trưởng phòng">Phó trưởng phòng</option>
                            <option value="Trưởng phòng">Trưởng phòng</option>
                            <option value="Phó Giám đốc">Phó Giám đốc</option>
                            <option value="Giám đốc">Giám đốc</option>
                        </select>
                    </div>
            </div>
            <div class="input-box">
                <label>Số lượng cần tuyển<span class="text-danger">(*)</span></label>
                <input name="number" required="" type="text">
            </div>
          </div>
          <div class="column">
            <div class="input-box address">
                    <label>Mức lương<span class="text-danger">(*)</span></label>
                    <div class="select-box" style="margin-top:5px;">
                        <select name="salary">
                            <option value="">Mức lương</option>
                            <option value="Thỏa thuận (Thương lượng)">Thỏa thuận (Thương lượng)</option>
                            <option value="3-5 triệu">3-5 triệu</option>
                            <option value="5-7 triệu">5-7 triệu</option>
                            <option value="7-9 triệu">7-9 triệu</option>
                            <option value="10-15 triệu">10-15 triệu</option>
                            <option value="15-20 triệu">15-20 triệu</option>
                            <option value="20-35 triệu">20-35 triệu</option>
                            <option value="35-45 triệu">35-45 triệu</option>
                            <option value="Trên 50 triệu">Trên 50 triệu</option>
                        </select>
                    </div>
            </div>
            <div class="input-box">
                <label>Ngày hết hạn<span class="text-danger">(*)</span></label>
                <input name="expDate" required="" type="text" placeholder="yy-mm-dd">
            </div>
          </div>
            <div class="input-box address">
                <label>Yêu cầu kinh nghiệm<span class="text-danger">(*)</span></label>
                <div class="select-box" style="margin-top:5px;">
                    <select name="exp" >
                        <option value="">Kinh nghiệm</option>
                        <option value="Không yêu cầu kinh nghiệm">Không yêu cầu kinh nghiệm</option>
                        <option value="< 1 năm kinh nghiệm">< 1 năm kinh nghiệm</option>
                        <option value="1 - 2 năm kinh nghiệm">1 - 2 năm kinh nghiệm</option>
                        <option value="2 - 3 năm kinh nghiệm">2 - 3 năm kinh nghiệm</option>
                        <option value="3 - 4 năm kinh nghiệm">3 - 4 năm kinh nghiệm</option>
                        <option value="> 5 năm kinh nghiệm">> 5 năm kinh nghiệm</option>
                    </select>
                </div>
            </div>
          <div class="input-box">
              <label>Mô tả công việc<span class="text-danger">(*)</span></label>
              <textarea name="detail" id="softskills">
                Mô tả:...
              </textarea>
          </div>
          <div class="input-box">
              <label>Mô tả yêu cầu<span class="text-danger">(*)</span></label>
              <textarea name="skill" id="proskills">
                Mô tả :...
              </textarea>
          </div>
          <div class="input-box address">
            <label>Địa chỉ làm việc<span class="text-danger">(*)</span></label>
            <div class="column">
                <div class="select-box">
                    <select name="city">
                        <option value="">Tỉnh/Thành phố</option>
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
              <label>Thông tin liên hệ<span class="text-danger">(*)</span></label>
              <input name="contact" type="text" id="">
          </div>
          <button>Đăng tin tuyển dụng</button>
      </form>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#softskills' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
        .create( document.querySelector( '#proskills' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#target' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
        .create( document.querySelector( '#infor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

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