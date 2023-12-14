<?php
    session_start();
?>
<?php
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql1 = "SELECT * FROM accountqt WHERE Tendangnhap='".$_GET['username']."'";
    $res1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM accountqt WHERE Matkhau='".$_GET['password']."'";
    $res2 = mysqli_query($conn, $sql2);

    $error ="";
    if (mysqli_num_rows($res1) <= 0) {
        if (mysqli_num_rows($res2) <= 0) {
            $error = 'Tên đăng nhập và mật khẩu sai !!!';
            header('Location:/home/dang-nhap/'.$error);
        } else {
            $error = "Tên đăng nhập sai !!!";
            header('Location:/home/dang-nhap/'.$error);
        }
    } else {
        if (mysqli_num_rows($res2) <= 0){
            $error = "Mật khẩu sai !!!";
            header('Location:/home/dang-nhap/'.$error);
        } else{
            //Kiểm tra xem tài khoản của ai
            $sql = "SELECT * FROM accountqt WHERE Tendangnhap='".$_GET['username']."' AND Matkhau='".$_GET['password']."'";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($res);
            if ( $row['Vaitro'] == 'Quản trị viên'){
                $idaccount = $row['IDTaikhoan'];
                $admin = "SELECT * FROM quantrivien WHERE IDTaikhoan='".$idaccount."'";
                $resadmin = mysqli_query($conn,$admin);
                $rowadmin = mysqli_fetch_array($resadmin);
                $_SESSION['admin'] = $rowadmin['Hovaten']." - Quản trị viên";
                $_SESSION['id_admin'] = $rowadmin['IDQuantri'];
                echo $_SESSION['admin'];
                echo $_SESSION['id_admin'];
                header("Location:/Admin/home");
            }
            if ( $row['Vaitro'] == 'Ứng viên'){
                $idaccount = $row['IDTaikhoan'];
                $candidate = "SELECT * FROM ungvien WHERE IDTaikhoan='".$idaccount."'";
                $rescandi = mysqli_query($conn,$candidate);
                $rowcandi = mysqli_fetch_array($rescandi);
                $_SESSION['candidate'] = $rowcandi['Hovaten']." - Ứng viên";
                $_SESSION['id_candidate'] = $rowcandi['IDUngvien'];
                header("Location:/Candidate/home");
            }
            if ( $row['Vaitro'] == 'Nhà tuyển dụng'){
                $idaccount = $row['IDTaikhoan'];
                $employer = "SELECT * FROM nhatuyendung WHERE IDTaikhoan='".$idaccount."'";
                $resemp = mysqli_query($conn,$employer);
                $rowemp = mysqli_fetch_array($resemp);
                $_SESSION['employer'] = $rowemp['NameCompany']." - Nhà tuyển dụng";
                $_SESSION['id_employer'] = $rowemp['IDEmployer'];
                header("Location:/Employer/home");
            }
        }
    }
?>