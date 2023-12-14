<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT emp.Avatar,emp.NameCompany,tin.*
                FROM tintuyendung tin
                JOIN nhatuyendung emp ON emp.IDEmployer=tin.IDEmployer";
    $res = mysqli_query($conn,$sql);
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
                        <a class="btn text-white" href="/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white">Danh sách tin tuyển dụng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Thanh tìm kiếm -->
    <div class="container-fluid d-flex align-content-center justify-content-center">
        <div id="containerForm">
            <form action="/home/danh-sach-tin-tuyen-dung" method="post" id="formsearch">
                <input type="text" name="keywords" id="" placeholder="Nhập vị trí công việc, lĩnh vực hoặc địa điểm">
                <button type="submit" name="searchBtn" class="btn btn-danger">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <div class="container-fluid d-flex align-content-center justify-content-center py-2">
        <span>--------------------------------------------------</span>
        <p class="text-primary font-italic">Tìm kiếm theo bộ lọc</p>
        <span>--------------------------------------------------</span>
    </div>

    <div class="container-fluid d-flex align-content-center justify-content-center py-2">
        <form action="/home/danh-sach-tin-tuyen-dung" id="bolocForm" method="POST">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center">
                    <?php
                        $sqlcity = "SELECT*FROM tinhthanh";
                        $rescity = mysqli_query($conn,$sqlcity);
                    ?>
                    <select name="city" id="" class="btn btn-primary rounded-pill my-2">
                        <option value="">Tỉnh thành</option>
                        <?php while($rowcity=mysqli_fetch_array($rescity)){ ?>
                        <option value="<?php echo $rowcity['TenTinhthanh']; ?>"><?php echo  $rowcity['TenTinhthanh']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="position" id="" class="btn btn-info rounded-pill my-2">
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
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="salary" id="" class="btn btn-primary rounded-pill my-2">
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
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="type" id="" class="btn btn-info rounded-pill my-2">
                        <option value="">Hình thức</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="online">Online</option>
                        <option value="hợp đồng">Hợp đồng</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="diploma" id="" class="btn btn-primary rounded-pill my-2">
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
                <div class="col-md-3 d-flex justify-content-center">
                    <?php
                        $sqlin = "SELECT*FROM nganhhoc ORDER BY Tentiengviet ASC";
                        $resin = mysqli_query($conn,$sqlin);
                    ?>
                    <select name="industry" id="" class="btn btn-info rounded-pill my-2">
                        <option value="">Ngành/Lĩnh vực</option>
                    <?php while($rowin=mysqli_fetch_array($resin)){ ?>
                        <option value="<?php echo $rowin['Tentiengviet']; ?>"><?php echo  $rowin['Tentiengviet']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="exp" id="" class="btn btn-primary rounded-pill my-2">
                        <option value="">Kinh nghiệm</option>
                        <option value="Không yêu cầu kinh nghiệm">Không yêu cầu kinh nghiệm</option>
                        <option value="< 1 năm kinh nghiệm">< 1 năm kinh nghiệm</option>
                        <option value="1 - 2 năm kinh nghiệm">1 - 2 năm kinh nghiệm</option>
                        <option value="2 - 3 năm kinh nghiệm">2 - 3 năm kinh nghiệm</option>
                        <option value="3 - 4 năm kinh nghiệm">3 - 4 năm kinh nghiệm</option>
                        <option value="> 5 năm kinh nghiệm">> 5 năm kinh nghiệm</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="time" id="" class="btn btn-info rounded-pill my-2">
                        <option value="">Thời gian</option>
                        <option value="1 ngày">Gần đây</option>
                        <option value="3 ngày">3 ngày trước</option>
                        <option value="1 tuần">1 tuần trước</option>
                        <option value="2 tuần">2 tuần trước</option>
                        <option value="1 tháng">1 tháng trước</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center align-content-center py-3">
                <button type="submit" name="fillsearchBtn" class="btn btn-warning rounded-pill">Tìm kiếm</button>
            </div>
        </form>
    </div>

    <?php
        $number = 0;
        if(isset($_POST['searchBtn']) || isset($_POST['fillsearchBtn'])){
        if (isset($_POST['fillsearchBtn'])){
            $selectedCity = $_POST['city'];
            $selectedPosition = $_POST['position'];
            $selectedSalary = $_POST['salary'];
            $selectedType = $_POST['type'];
            $selectedEducation = $_POST['diploma'];
            $selectedIndustry = $_POST['industry'];
            $selectedExperience = $_POST['exp'];
            $selectedTime = $_POST['time'];

            $sqlsearch = "SELECT emp.Avatar,emp.NameCompany, tin.*
                            FROM tintuyendung tin
                            JOIN nhatuyendung emp ON emp.IDEmployer=tin.IDEmployer
                            WHERE 1";
            if (!empty($selectedCity)) {
                $sqlsearch .= " AND Diadiem LIKE '%$selectedCity%'";
            }
            if (!empty($selectedPosition)) {
                $sqlsearch .= " AND Vitri LIKE '%$selectedPosition%'";
            }
            if (!empty($selectedSalary)) {
                $sqlsearch .= " AND MucLuong LIKE '%$selectedSalary%'";
            }
            if (!empty($selectedType)) {
                $sqlsearch .= " AND LoaiCV LIKE '%$selectedType%'";
            }
            if (!empty($selectedEducation)) {
                $sqlsearch .= " AND HocVan LIKE '%$selectedEducation%'";
            }
            if (!empty($selectedIndustry)) {
                $sqlsearch .= " AND Nganh LIKE '%$selectedIndustry%'";
            }
            if (!empty($selectedExperience)) {
                $sqlsearch .= " AND Kinhnghiem LIKE '%$selectedExperience%'";
            }
            if (!empty($selectedTime)) {
                switch ($selectedTime) {
                    case "1 ngày":
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 1 day) AND Ngaydang <= date(now())";
                        break;
                    case "3 ngày":
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 3 day) AND Ngaydang <= date(now())";                       
                        break;
                    case "1 tuần":
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 1 week) AND Ngaydang <= date(now())";                        
                        break;
                    case "2 tuần":
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 2 week) AND Ngaydang <= date(now())";                        
                        break;
                    case "1 tháng":
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 1 month) AND Ngaydang <= date(now())";                        
                        break;
                    default:
                        $sqlsearch .= " AND Ngaydang >= date(now() - interval 1 month) AND Ngaydang <= date(now())";                        
                        break;
                }
            }
            $ressearch = mysqli_query($conn, $sqlsearch);
            $number = mysqli_num_rows($ressearch);
        }

        if (isset($_POST['searchBtn'])) {
            $keywords = $_POST['keywords'];
            $sqlsearch = "SELECT emp.Avatar,emp.NameCompany, tin.*
                            FROM tintuyendung tin
                            JOIN nhatuyendung emp ON emp.IDEmployer=tin.IDEmployer
                            WHERE 
                                Vitri LIKE '%$keywords%'
                                OR Nganh LIKE '%$keywords%'
                                OR Diadiem LIKE '%$keywords%'";
            $ressearch = mysqli_query($conn,$sqlsearch);
            $number = mysqli_num_rows($ressearch);
        }

        if (mysqli_num_rows($ressearch) <= 0) {
        ?>
        <div class="container-fluid d-flex align-content-center justify-content-center">
            <p class="text-danger font-weight-bolder">Không tìm thấy kết quả theo yêu cầu của bạn !!!</p>
        </div>
        <?php } else {?>
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="row">
                <p class="col-md-12 text-success font-italic font-weight-medium">Danh sách có <?php echo $number; ?> kết quả được tìm thấy</p>
                <?php 
                    while ($rowsearch=mysqli_fetch_array($ressearch)){
                ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="d-flex flex-row mb-5 border-info position-relative" style="border:3px solid;height:100%;">
                        <div class="p-2" style="width:100%;">
                            <div class="border-info d-flex align-items-center justify-item-center" style="border-bottom:3px solid;">
                                <img src="/WebJobconnect/Employer/image/<?php echo $rowsearch['Avatar']; ?>" alt="" class="border-info rounded-circle" style="border:3px solid;width:50px;height:50px;">
                                <p class="text-center text-dark font-weight-medium"><?php echo $rowsearch['NameCompany']; ?></p>
                            </div>
                            <div id="item" class="col-sm-12" style="height:150px;">
                                <span class="text-primary font-weight-medium"><?php echo $rowsearch['TenTin']; ?></span>
                                <p class="text-success font-italic font-weight-medium">Ngày đăng: <?php echo $rowsearch['Ngaydang']; ?></p>
                                <p class="text-danger font-italic font-weight-medium">Mức lương: <?php echo $rowsearch['MucLuong']; ?></p>
                                <p class="text-dark font-italic font-weight-medium"><?php echo $rowsearch['Nganh']; ?></p>
                                <div class="d-flex flex-row justify-content-end position-absolute" style="bottom:-50px;left:0;right:0px;">
                                    <?php
                                        $sql1 = "SELECT Ngayhethan FROM tintuyendung WHERE IDTin='".$rowsearch['IDTin']."'";
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
                                        <?php if ($rowsearch['SoLuongDK'] == 0) {
                                                    echo '0 đơn';
                                                } else if ($rowsearch['Soluongtuyen'] > $rowsearch['Duyet']){
                                                            echo $rowsearch['SoLuongDK'].' đơn';
                                                        } else if ($rowsearch['Soluongtuyen'] == $rowsearch['Duyet']){
                                                            echo 'Đủ số lượng';
                                                        }
                                        ?>
                                    </p>
                                    <a href="/home/danh-sach-tin-tuyen-dung/thong-tin-chi-tiet/<?php echo $rowsearch['IDTin']; ?>" class="btn btn-success">Xem</a>
                                </div>
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
    <!-- Hiển thị danh sách tin -->
    <div class="container-fluid pt-5" style="display:block;" id="listIndus">
        <div class="container">
            <div class="row">
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
                                                            echo 'Đủ số lượng';
                                                        }
                                        ?>
                                    </p>
                                    <a href="/home/danh-sach-tin-tuyen-dung/thong-tin-chi-tiet/<?php echo $row['IDTin']; ?>" class="btn btn-success">Xem</a>
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
            button.innerText = "Hiển thị danh sách >>>";
        } else {
            div.style.display = "block";
            button.innerText = "Ẩn danh sách <<<";
        }
    });
</script>