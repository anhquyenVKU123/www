<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT * FROM tintuyendung WHERE IDTin='".$_GET['IDRec']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- Libraries Stylesheet -->
    <link href="/WebJobconnect/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/WebJobconnect/css/style.css" rel="stylesheet">
    <link href="/WebJobconnect/css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="/WebJobconnect/Employer/css/appliForm.css">
    <link rel="stylesheet" href="/WebJobconnect/Employer/css/formUpdateAdmin.css">
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
                        <a class="btn text-white" href="/Employer/home/danh-sach-tin-tuyen-dung">Danh sách tin tuyển dụng</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white"><?php echo $row['TenTin']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    <?php
        $sqlemp = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$row['IDEmployer']."'";
        $resemp = mysqli_query($conn,$sqlemp);
        $rowemp = mysqli_fetch_array($resemp);
    ?>
    <!-- Tiêu đề tin tuyển dụng -->
    <div class="container-fluid bg-primary" style="width:100%;height:auto;margin-top:-100px;">
        <div class="d-flex align-content-center justify-content-center">
            <div class="text-white text-uppercase font-weight-bolder my-3" style="font-size:40px;"><?php echo $row['TenTin']; ?></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around my-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Công ty: <span><?php echo $rowemp['NameCompany']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Giám đốc điều hành: <span><?php echo $rowemp['CEO']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngày hết hạn: <span><?php echo $row['Ngayhethan']; ?></span></div>
        </div>
        <div class="d-flex flex-row align-content-center justify-content-center justify-content-around py-3">
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Ngành: <span><?php echo $row['Nganh']; ?></span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Mức lương: <span><?php echo $row['MucLuong']; ?> VNĐ</span></div>
            <div class="text-white text-uppercase font-weight-medium" style="width:400px;">Loại hình công việc: <span><?php echo $row['LoaiCV']; ?></span></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Vị trí ứng tuyển</span>
                        <div class="my-5">
                            <p><?php echo $row['Vitri']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Kinh nghiệm</span>
                        <div class="my-5">
                            <?php echo $row['Kinhnghiem']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Bằng cấp/Chứng chỉ</span>
                        <div class="my-5">
                            <p><?php echo $row['HocVan']; ?> </p>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Tiến trình ứng tuyển</span>
                        <div class="my-5">
                            <p>Cần tuyển: <?php echo $row['Soluongtuyen']; ?></p>
                            <p>Chờ duyệt: <?php echo $row['SoLuongDK']; ?></p>
                            <p>Đã duyệt: <?php echo $row['Duyet']; ?></p>
                            <p>Còn lại: <?php echo $row['Soluongtuyen']-$row['Duyet']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 col-sm-4">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Mô tả công việc</span>
                        <div class="my-5">
                                <div class="my-4" style="width:auto;">
                                <?php echo $row['Mota']; ?>
                                </div>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-md-6 col-sm-8">
                <div id="detail" class="d-sm-flex my-3 mx-5">
                    <div class="flex-grow-1 ms-3 mx-5 float-md-right">
                        <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;">Yêu cầu kĩ năng</span>
                        <div class="my-5">
                            <div class="my-4" style="width:auto;">
                                <?php echo $row['Kinang']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Địa điểm làm việc</span>
            </div>
        </div>

        <div class="my-4" style="width:auto;padding-left:95px;">
        <?php echo $row['Diadiem']; ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 10px 0 10px 95px;">Liên hệ</span>
            </div>
        </div>

        <div class="my-4" style="width:auto;padding-left:95px;">
        <?php echo $row['Lienhe']; ?>
        </div>
    </div>

    <?php 
        $sqlup = "SELECT*FROM tintuyendung WHERE IDTin='".$row['IDTin']."' AND IDEmployer='".$_SESSION['id_employer']."'";
        $resup = mysqli_query($conn,$sqlup);
        if (mysqli_num_rows($resup) > 0){
    ?>
    <div class="d-flex align-content-center justify-content-center">
        <button class="btn btn-success" id="btnUpdate">Cập nhật</button>
    </div>
    <?php } ?>

    <!-- Form đăng cập nhật tin tuyển dụng -->
    <div class="font-italic font-weight-medium text-info text-uppercase my-3"  id="title" style="display:none;">
        <span style="border-bottom:2px solid #17a2b8;margin: 10px 0 10px 100px;">Cập nhật thông tin tuyển dụng</span>
    </div>
    <div class="container1" id="form" style="display:none;">
      <form class="form" action="/Employer/xu-li-cap-nhat-tin-tuyen-dung/<?php echo $row['IDTin']; ?>" method="get">
          <div class="input-box">
              <label>Tên tin ứng tuyển<span class="text-danger">(*)</span></label>
              <input name="name" required="" type="text" value="<?php echo $row['TenTin']; ?>">
          </div>
          <div class="input-box address">
                <label>Ngành/Lĩnh vực tuyển dụng<span class="text-danger">(*)</span></label>
                <div class="select-box">
                <select name="industry">
                    <option hidden="">Ngành/Lĩnh vực</option>
                    <?php
                            $sqlin = "SELECT * FROM nganhhoc ORDER BY Tentiengviet ASC";
                            $resin = mysqli_query($conn,$sqlin);
                            while ($rowin=mysqli_fetch_array($resin)){
                        ?>
                        <option value="<?php echo $rowin['Tentiengviet']; ?>"><?php echo $rowin['Tentiengviet']; ?></option>
                        <?php } ?>
                </select>
            </div>
          </div>
          <div class="column">
            <div class="input-box address">
                <label>Trình độ học vấn<span class="text-danger">(*)</span></label>
                <div class="select-box" style="margin-top:5px;">
                    <select name="diploma" >
                        <option hidden="">Trình độ học vấn</option>
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
                        <option hidden="">Vị trí công việc</option>
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
                <input name="number" required="" type="text" value="<?php echo $row['Soluongtuyen']; ?>">
              </div>
          </div>
          <div class="column">
            <div class="input-box address">
                    <label>Mức lương<span class="text-danger">(*)</span></label>
                    <div class="select-box" style="margin-top:5px;">
                        <select name="salary" >
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
                <input name="expDate" required="" type="text" placeholder="yy-mm-dd" value="<?php echo $row['Ngayhethan']; ?>">
              </div>
          </div>
          <div class="input-box address">
            <label>Yêu cầu kinh nghiệm<span class="text-danger">(*)</span></label>
            <div class="select-box" style="margin-top:5px;">
                <select name="exp" >
                    <option hidden="">Kinh nghiệm</option>
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
                <?php echo $row['Mota']; ?>
              </textarea>
          </div>
          <div class="input-box">
              <label>Mô tả yêu cầu<span class="text-danger">(*)</span></label>
              <textarea name="skill" id="proskills">
              <?php echo $row['Kinang']; ?>
              </textarea>
          </div>
          <div class="input-box address">
            <label>Địa chỉ làm việc<span class="text-danger">(*)</span></label>
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
            <input name="detailAddress" required="" placeholder="Số nhà, đường, xã/phường,..." type="text" value="<?php echo $row['Diadiem']; ?>">
          </div>
          <div class="input-box">
              <label>Thông tin liên hệ<span class="text-danger">(*)</span></label>
              <input name="contact" type="text" id="" value="<?php echo $row['Lienhe']; ?>">
          </div>
          <button>Cập nhật tin tuyển dụng</button>
      </form>
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
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 30px 0 10px 95px;">Đơn ứng tuyển</span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex flex-column my-5 row">
        <?php
            $sqlhoso = "SELECT*FROM hosotuyendung WHERE IDTin='".$row['IDTin']."'";
            $reshoso = mysqli_query($conn,$sqlhoso);
            if(mysqli_num_rows($reshoso) <= 0) {
        ?>
        <p class="text-center text-primary font-italic">Chưa có đơn ứng tuyển !!!</p>
        <?php
            } else while ($rowhoso=mysqli_fetch_array($reshoso)) {
        ?>
            <div id="item" class="col-sm-12">
                <span><?php echo $rowhoso['Tenhoso']; ?></span>
                <p>Ứng viên: <?php 
                                $sql = "SELECT*FROM ungvien WHERE IDUngvien='".$rowhoso['IDUngvien']."'";
                                $res = mysqli_query($conn,$sql);
                                $row =mysqli_fetch_array($res);
                                echo $row['Hovaten'];
                            ?></p>
                <p>Ngày ứng tuyển: <?php echo $rowhoso['Ngaydang']; ?></p>
                <div class="d-flex flex-row">
                    <?php if ($rowhoso['Tinhtrang'] == "Chưa duyệt") {
                                echo '<p class="text-warning font-weight-medium">Chưa xem</p>';
                            } else if ($rowhoso['Tinhtrang'] == "Chấp nhận") {
                                echo '<p class="text-success font-weight-medium">Chấp nhận</p>';
                            } else {
                                echo '<p class="text-danger font-weight-medium">Không chấp nhận</p>';
                            }
                    ?>
                    <a href="/Employer/home/danh-sach-don-ung-tuyen/thong-tin-chi-tiet/<?php echo $rowhoso['IDHoSo']; ?>" class="btn btn-success">Xem hồ sơ</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <span style="font-weight:bold;color:black;border-bottom:3px solid #dc3545;margin: 30px 0 10px 95px;">Bình luận</span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php 
            $sqlcom = "SELECT*FROM binhluantintuyendung WHERE Tinhtrang='Chưa xem' AND IDTin='".$_GET['IDRec']."'";
            $rescom = mysqli_query($conn,$sqlcom);
            if (mysqli_num_rows($rescom) <= 0 ) {echo '<p class="mx-3 text-center text-primary font-italic">Chưa có bình luận mới để phản hồi</p>';} else {
            while ($rowcom=(mysqli_fetch_array($rescom))) {
                $sqluv = "SELECT*FROM ungvien WHERE IDUngvien='".$rowcom['IDUngvien']."'";
                $resuv = mysqli_query($conn,$sqluv);
                $rowuv= mysqli_fetch_array($resuv);
        ?>
        <div class="container-fluid row">
            <div class="col-sm-9 col-lg-4 bg-secondary my-3" style="border-radius:30px;">
                <div class="p-3">
                    <span>
                        <img src="/WebJobconnect/Candidate/image/<?php echo $rowuv['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                        <span class="text-dark font-italic font-weight-medium"><?php echo $rowuv['Hovaten']; ?></span>
                        <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowcom['Ngaydang']; ?></p>
                    </span>
                </div>
                <div class="p-2 mx-5 text-white">
                    <?php echo $rowcom['Noidung']; ?>
                </div>
            </div>
                <?php 
                    $sqlrep = "SELECT*FROM phanhoitintuyendung WHERE IDComment='".$rowcom['IDComment']."'";
                    $resrep = mysqli_query($conn,$sqlrep);
                    while ($rowrep=(mysqli_fetch_array($resrep))) {
                ?>
                <div class="container-fluid row mx-5 my-3">
                    <div class="col-sm-9 col-lg-4 bg-secondary" style="border-radius:30px;">
                        <div class="p-3">
                            <span>
                                <img src="/WebJobconnect/Employer/image/<?php echo $rowemp['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                                <span class="text-dark font-italic font-weight-medium"><?php echo $rowemp['NameCompany']; ?></span>
                                <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowrep['Ngaydang']; ?></p>
                            </span>
                        </div>
                        <div class="p-2 mx-5 text-white">
                            <?php echo $rowrep['Noidung']; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
        <div class="d-flex-row">
            <span class="mx-5">
                <form action="/Employer/xu-li-phan-hoi-ung-vien/<?php echo $rowcom['IDComment']; ?>" method="get" id="myForm">
                    <textarea type="text" name="reply" id="comment<?php echo $rowcom['IDComment']; ?>" placeholder="Gửi phản hồi"></textarea>
                    <button class="btn btn-outline-primary px-3 my-3">Phản hồi</button>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#comment<?php echo $rowcom['IDComment']; ?>' ) )
                            .catch( error => {
                            console.error( error );
                        } );
                    </script>
                </form>
            </span>
        </div>
        <?php } }?>
        <button class="btn btn-outline-dark my-3" id="btncomment"> Tất cả bình luận >></button>
    </div>

    <div class="container-fluid" style="display:none;" id="allcomments">
        <?php 
            $sqlcom = "SELECT*FROM binhluantintuyendung WHERE Tinhtrang='Đã xem' AND IDTin='".$_GET['IDRec']."' ORDER BY IDComment DESC";
            $rescom = mysqli_query($conn,$sqlcom);
            while ($rowcom=(mysqli_fetch_array($rescom))) {
                $sqluv = "SELECT*FROM ungvien WHERE IDUngvien='".$rowcom['IDUngvien']."'";
                $resuv = mysqli_query($conn,$sqluv);
                $rowuv= mysqli_fetch_array($resuv);
        ?>
        <div class="container-fluid row">
            <div class="col-sm-9 col-lg-4 bg-secondary my-3" style="border-radius:30px;">
                <div class="p-3">
                    <span>
                        <img src="/WebJobconnect/Candidate/image/<?php echo $rowuv['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                        <span class="text-dark font-italic font-weight-medium"><?php echo $rowuv['Hovaten']; ?></span>
                        <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowcom['Ngaydang']; ?></p>
                    </span>
                </div>
                <div class="p-2 mx-5 text-white">
                    <?php echo $rowcom['Noidung']; ?>
                </div>
            </div>
                <?php 
                    $sqlrep = "SELECT*FROM phanhoitintuyendung WHERE IDComment='".$rowcom['IDComment']."'";
                    $resrep = mysqli_query($conn,$sqlrep);
                    while ($rowrep=(mysqli_fetch_array($resrep))) {
                ?>
                <div class="container-fluid row mx-5 my-3">
                    <div class="col-sm-9 col-lg-4 bg-secondary" style="border-radius:30px;">
                        <div class="p-3">
                            <span>
                                <img src="/WebJobconnect/Employer/image/<?php echo $rowemp['Avatar']; ?>" alt="" style="border-radius:50%;width:60px;height:60px;">
                                <span class="text-dark font-italic font-weight-medium"><?php echo $rowemp['NameCompany']; ?></span>
                                <p class="text-success font-italic font-weight-medium" style="margin: -15px 0 0 70px;font-size:smaller;">Ngày đăng: <?php echo $rowrep['Ngaydang']; ?></p>
                            </span>
                        </div>
                        <div class="p-2 mx-5 text-white">
                            <?php echo $rowrep['Noidung']; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
        <div class="d-flex-row">
            <span class="mx-5">
                <form action="/Employer/xu-li-phan-hoi-ung-vien/<?php echo $rowcom['IDComment']; ?>" method="get" id="myForm">
                    <textarea type="text" name="reply" id="comment<?php echo $rowcom['IDComment']; ?>" placeholder="Gửi phản hồi"></textarea>
                    <button class="btn btn-outline-primary px-3 my-3">Phản hồi</button>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#comment<?php echo $rowcom['IDComment']; ?>' ) )
                            .catch( error => {
                            console.error( error );
                        } );
                    </script>
                </form>
            </span>
        </div>
        <?php } ?>
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
    var button = document.getElementById("btnUpdate");
    var div1 = document.getElementById("title");
    var div2 = document.getElementById("form");

    button.addEventListener("click", function() {
      if (div1.style.display == "none" && div2.style.display == "none") {
        // Nếu div đang ẩn, thì hiển thị nó
        div1.style.display = "block";
        div2.style.display = "block";
      } else {
        div1.style.display = "none";
        div2.style.display = "none";
      }
    });

    var buttonComment = document.getElementById('btncomment');
    var div = document.getElementById('allcomments')

    buttonComment.addEventListener("click", function() {
      if (div.style.display == "none") {
        // Nếu div đang ẩn, thì hiển thị nó
        div.style.display = "block";
        buttonComment.innerText="Ẩn bình luận";
      } else {
        div.style.display = "none";
        buttonComment.innerText = "Tất cả bình luận";
      }
    });
</script>