<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "SELECT emp.NameCompany,emp.Avatar,tin.MucLuong,tin.Vitri,tin.Nganh,hs.*
                FROM hosotuyendung hs
                JOIN tintuyendung tin ON tin.IDTin=hs.IDTin
                JOIN nhatuyendung emp ON emp.IDEmployer=hs.IDEmployer
                WHERE hs.IDUngvien='".$_SESSION['id_candidate']."'";
    $res = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hồ sơ tuyển dụng</title>
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
                    <h1 class="mb-4 mb-md-0 text-white">Danh sách hồ sơ</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Candidate/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white">Danh sách hồ sơ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Thanh tìm kiếm hồ sơ -->
    <div class="container-fluid d-flex align-content-center justify-content-center py-2">
        <span>--------------------------------------------------</span>
        <p class="text-primary font-italic">Tìm kiếm theo bộ lọc</p>
        <span>--------------------------------------------------</span>
    </div>

    <div class="container-fluid d-flex align-content-center justify-content-center py-2">
        <form action="/Candidate/home/danh-sach-don-ung-tuyen" id="bolocForm" method="POST">
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
                    <select name="namecompany" id="" class="btn btn-primary rounded-pill my-2">
                        <option value="">Tên công ty</option>
                        <?php 
                            $sqlemp = "SELECT * FROM nhatuyendung";
                            $resemp = mysqli_query($conn,$sqlemp);
                            while ($rowemp=mysqli_fetch_array($resemp)){
                        ?>
                        <option value="<?php echo $rowemp['NameCompany']; ?>"><?php echo $rowemp['NameCompany']; ?></option>
                        <?php } ?>
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
                    <select name="status" id="" class="btn btn-primary rounded-pill my-2">
                        <option value="">Tình trạng</option>
                        <option value="Chưa duyệt">Chưa duyệt</option>
                        <option value="Chấp nhận">Chấp nhận</option>
                        <option value="Từ chối">Từ chối</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <select name="time" id="" class="btn btn-info rounded-pill my-2">
                        <option value="">Thời gian đăng</option>
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
        if (isset($_POST['fillsearchBtn'])){
            $selectedCity = $_POST['city'];
            $selectedPosition = $_POST['position'];
            $selectedSalary = $_POST['salary'];
            $selectedType = $_POST['type'];
            $selectedCompany = $_POST['namecompany'];
            $selectedIndustry = $_POST['industry'];
            $selectedStatus = $_POST['status'];
            $selectedTime = $_POST['time'];

            $sqlsearch = "SELECT emp.Avatar,emp.NameCompany, tin.MucLuong,tin.Nganh,tin.LoaiCV,tin.Diadiem, hs.*
                            FROM hosotuyendung hs
                            JOIN nhatuyendung emp ON emp.IDEmployer=hs.IDEmployer
                            JOIN tintuyendung tin ON tin.IDTin=hs.IDTin
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
            if (!empty($selectedCompany)) {
                $sqlsearch .= " AND NameCompany LIKE '%$selectedCompany%'";
            }
            if (!empty($selectedIndustry)) {
                $sqlsearch .= " AND Nganh LIKE '%$selectedIndustry%'";
            }
            if (!empty($selectedStatus)) {
                $sqlsearch .= " AND Tinhtrang LIKE '%$selectedStatus%'";
            }
            if (!empty($selectedTime)) {
                switch ($selectedTime) {
                    case "1 ngày":
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 1 day) AND hs.Ngaydang <= date(now())";
                        break;
                    case "3 ngày":
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 3 day) AND hs.Ngaydang <= date(now())";                       
                        break;
                    case "1 tuần":
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 1 week) AND hs.Ngaydang <= date(now())";                        
                        break;
                    case "2 tuần":
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 2 week) AND hs.Ngaydang <= date(now())";                        
                        break;
                    case "1 tháng":
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 1 month) AND hs.Ngaydang <= date(now())";                        
                        break;
                    default:
                        $sqlsearch .= " AND hs.Ngaydang >= date(now() - interval 1 month) AND hs.Ngaydang <= date(now())";                        
                        break;
                }
            }
            $ressearch = mysqli_query($conn, $sqlsearch);
            if(mysqli_num_rows($ressearch) <= 0){
    ?>
    <div class="container-fluid d-flex align-content-center justify-content-center">
        <p class="text-danger font-weight-bolder">Không tìm thấy kết quả theo yêu cầu của bạn !!!</p>
    </div>
    <?php } else { ?>
        <div class="container-fluid pt-5">
            <div class="container">
            <div class="row">
                <p class="col-md-12 text-success font-italic font-weight-medium">Danh sách có <?php echo mysqli_num_rows($ressearch); ?> kết quả được tìm thấy</p>
                <?php
                    while ($rowsearch=mysqli_fetch_array($ressearch)) {
                ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="d-flex flex-row mb-5 border-primary position-relative" style="border:3px solid;height:100%;border-radius:40px;">
                        <div class="p-2" style="width:100%;">
                            <div class="border-primary d-flex align-items-center justify-item-center" style="border-bottom:3px solid;">
                                <img src="/WebJobconnect/Employer/image/<?php echo $rowsearch['Avatar']; ?>" alt="" class="border-primary rounded-circle" style="border:3px solid;width:50px;height:50px;">
                                <p class="text-center text-dark font-weight-medium"><?php echo $rowsearch['NameCompany']; ?></p>
                            </div>
                            <div id="item" class="col-sm-12" style="height:250px;">
                                <p class="text-primary font-weight-medium"><?php echo $rowsearch['Tenhoso']; ?></p>
                                <p class="text-success font-italic font-weight-medium">Ngày đăng: <?php echo $rowsearch['Ngaydang']; ?></p>
                                <p class="text-danger font-italic font-weight-medium">Mức lương: <?php echo $rowsearch['MucLuong']; ?></p>
                                <p class="text-info font-italic font-weight-medium">Vị trí: <?php echo $rowsearch['Vitriungtuyen']; ?></p>
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
                                        <?php 
                                            if ($rowsearch['Tinhtrang'] == "Chấp nhận"){
                                                
                                        ?>
                                        <p class="m-2 text-success font-italic font-weight-medium">
                                            Chấp nhận
                                        </p>
                                        <?php
                                            } else if ($rowsearch['Tinhtrang'] == "Từ chối") {
                                        ?>
                                        <p class="m-2 text-danger font-italic font-weight-medium">
                                            Bị từ chối
                                        </p>
                                        <?php } else {?>
                                            <p class="m-2 text-black font-italic font-weight-medium">
                                                Chưa duyệt
                                            </p>
                                        <?php } ?>
                                    <a href="/Candidate/home/chi-tiet-don-ung-tuyen/<?php echo $rowsearch['IDHoSo']; ?>" class="btn btn-primary" style="border-radius:40px;">Chi tiết</a>
                                    <script>
                                        function confirmDelete(id){
                                            if (confirm("Bạn có chắc chắn muốn xóa đơn ứng tuyển này không?")){
                                                window.location.href="/Candidate/xu-li-xoa-ho-so/" + id;
                                            }
                                        }
                                    </script>
                                    <a href="" onclick="confirmDelete('<?php echo $rowsearch['IDHoSo']; ?>');" class="btn btn-danger mx-2" style="border-radius:40px;">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } } ?>
    <!-- Nút hiển thị danh sách -->
    <div class="container-fluid d-flex justify-content-center align-content-center py-5">
        <button class="btn btn-info rounded-pill" id="hiddenBtn">Ẩn danh sách <<<</button>
    </div>
    <!-- Working Process Start -->
    <div class="container-fluid pt-5" id="listHoso">
        <div class="container">
            <div class="row">
                <?php
                    while ($row=mysqli_fetch_array($res)) {
                ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="d-flex flex-row mb-5 border-primary position-relative" style="border:3px solid;height:100%;border-radius:40px;">
                        <div class="p-2" style="width:100%;">
                            <div class="border-primary d-flex align-items-center justify-item-center" style="border-bottom:3px solid;">
                                <img src="/WebJobconnect/Employer/image/<?php echo $row['Avatar']; ?>" alt="" class="border-primary rounded-circle" style="border:3px solid;width:50px;height:50px;">
                                <p class="text-center text-dark font-weight-medium"><?php echo $row['NameCompany']; ?></p>
                            </div>
                            <div id="item" class="col-sm-12" style="height:250px;">
                                <p class="text-primary font-weight-medium"><?php echo $row['Tenhoso']; ?></p>
                                <p class="text-success font-italic font-weight-medium">Ngày đăng: <?php echo $row['Ngaydang']; ?></p>
                                <p class="text-danger font-italic font-weight-medium">Mức lương: <?php echo $row['MucLuong']; ?></p>
                                <p class="text-info font-italic font-weight-medium">Vị trí: <?php echo $row['Vitri']; ?></p>
                                <p class="text-dark font-italic font-weight-medium"><?php echo $row['Nganh']; ?></p>
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
                                        <?php 
                                            if ($row['Tinhtrang'] == "Chấp nhận"){
                                                
                                        ?>
                                        <p class="m-2 text-success font-italic font-weight-medium">
                                            Chấp nhận
                                        </p>
                                        <?php
                                            } else if ($row['Tinhtrang'] == "Từ chối") {
                                        ?>
                                        <p class="m-2 text-danger font-italic font-weight-medium">
                                            Bị từ chối
                                        </p>
                                        <?php } else {?>
                                            <p class="m-2 text-black font-italic font-weight-medium">
                                                Chưa duyệt
                                            </p>
                                        <?php } ?>
                                    <a href="/Candidate/home/chi-tiet-don-ung-tuyen/<?php echo $row['IDHoSo']; ?>" class="btn btn-primary" style="border-radius:40px;">Chi tiết</a>
                                    <script>
                                        function confirmDelete(){
                                            if (confirm("Bạn có chắc chắn muốn xóa đơn ứng tuyển này không?")){
                                                window.location.href="/Candidate/xu-li-xoa-ho-so/<?php echo $rowhs['IDHoSo']; ?>";
                                            }
                                        }
                                    </script>
                                    <a href="" onclick="confirmDelete('<?php echo $row['IDHoSo']; ?>');" class="btn btn-danger mx-2" style="border-radius:40px;">Xóa</a>
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
    var div = document.getElementById("listHoso");
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