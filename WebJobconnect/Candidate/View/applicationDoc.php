<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_GET['IDRec'] != "0"){
        $conn = mysqli_connect("localhost","root","","jobconnect");
        $sql = "SELECT * FROM tintuyendung WHERE IDTin='".$_GET['IDRec']."'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($res);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hồ sơ ứng tuyển</title>
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
    <link href="/WebJobconnect/Candidate/css/formUpdateAdmin.css" rel="stylesheet">

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
                    <h1 class="mb-4 mb-md-0 text-white">Đơn ứng tuyển</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="/Candidate/home">Trang chủ</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white" href="/Candidate/home/don-ung-tuyen/<?php echo $row['IDTin']; ?>">Đơn ứng tuyển</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    
    <!-- Form đăng đơn tuyển dụng -->
    <?php
    if ($_GET['IDRec'] != "0"){
        $sqlemp = "SELECT * FROM nhatuyendung WHERE IDEmployer='".$row['IDEmployer']."'";
        $resemp = mysqli_query($conn,$sqlemp);
        $rowemp = mysqli_fetch_array($resemp);
    }
    ?>
    <div class="container1" id="signupStudent"> 
      <form class="form" action="/Candidate/xu-li-them-don-ung-tuyen" method="get" onsubmit="updateHiddenInput()">
          <div class="input-box">
              <label>Tên đơn ứng tuyển <span class="text-danger">(*)</span></label>
              <input name="name" required="" type="text">
          </div>
          <div class="column">
              <div class="input-box">
                <label>Trình độ học vấn <span class="text-danger">(*)</span></label>
                <input name="diploma" required="" type="text" value="<?php if ($_GET['IDRec'] != "0"){ echo $row['HocVan']; } ?>">
              </div>
              <div class="input-box">
                <label>Vị trí ứng tuyển <span class="text-danger">(*)</span></label>
                <input name="position" required="" type="text" value="<?php if ($_GET['IDRec'] != "0"){ echo $row['Vitri']; } ?>">
              </div>
          </div>
          <div class="input-box">
                <label>Công ty <span class="text-danger">(*)</span></label>
                <input name="company" id="company" value="<?php if ($_GET['IDRec'] != "0"){ echo $rowemp['NameCompany']; } ?>" type="text">
          </div>
          <div class="input-box">
              <label>Tin ứng tuyển <span class="text-danger">(*)</span></label>
              <input name="recruitment" id="recruitment" value="<?php if ($_GET['IDRec'] != "0"){ echo $row['TenTin']; } ?>" type="text">
          </div>
          <div class="input-box">
              <label>Kỹ năng<span class="text-danger">(*)</span></label>
              <textarea name="softskills" id="softskills">
                Mô tả kỹ năng mềm, chuyên môn...
              </textarea>
          </div>
          <div class="input-box">
              <label>Bằng cấp/Chứng chỉ liên quan (nếu có)</label>
              <textarea name="proskills" id="proskills">
                Liệt kê...
              </textarea>
          </div>
          <div class="input-box">
              <label>Mục tiêu nghề nghiệp <span class="text-danger">(*)</span></label>
              <textarea name="target" id="target">
                Mục tiêu....
              </textarea>
          </div>
          <div class="input-box">
              <label>Dự án đã tham gia<span class="text-danger">(*)</span></label>
              <textarea name="project" id="project">
                    Mục tiêu
              </textarea>
          </div>
          <button>Đăng đơn ứng tuyển</button>
      </form>
    </div>
    <script>
    function updateHiddenInput() {

        var companyName = document.getElementById("company");
        var recruitment = document.getElementById("recruitment");

        companyName.value="<?php echo $rowemp['IDEmployer']; ?>";
        recruitment.value="<?php echo $row['IDTin']; ?>";
        return true;

    }
</script>
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
        .create( document.querySelector( '#project' ) )
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