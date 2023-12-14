<?php
//Kết nối cơ sở dữ liệu
    $conn = mysqli_connect("localhost","root","","jobconnect");

//Lấy các thông tin form gửi tới
    $id = $_POST['id'];
    $nameEng = $_POST['nameEng'];
    $nameViet = $_POST['nameViet'];
    $abbreviate = $_POST['abbreviate'];
    $describe = $_POST['textarea'];
//Lấy tên ảnh được gửi đến
    $image  = $_FILES['image']['name'];
    $target ="image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

//Kiểm tra dữ liệu bị trùng lặp trước khi đưa vào CSDL
    $error ="";
    //Kiểm tra xem id có bị trùng không
    $sql = "SELECT * FROM nganhhoc WHERE IDNganh='".$id."'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0){
        $error = "ID đã tồn tại";
    }
    //Kiểm tra ngành đã tồn tại chưa dựa trên tên tiếng việt và tên tiếng anh
    $sql1 = "SELECT * FROM nganhhoc WHERE LOWER(Tentienganh)=LOWER('".$nameEng."')";
    $res1 = mysqli_query($conn,$sql1);
    $sql2 = "SELECT * FROM nganhhoc WHERE LOWER(Tentiengviet)=LOWER('".$nameViet."')";
    $res2 = mysqli_query($conn,$sql2);
    if (mysqli_num_rows($res1) > 0){
        $error = $error." <br> Tên tiếng anh của ngành đã tồn tại";
    } 
    if (mysqli_num_rows($res2) > 0){
        $error = $error." <br> Tên tiếng việt của ngành đã tồn tại";
    } 
    
    if ($error != "") {
        header('Location:/Admin/home/bo-sung-nganh-linh-vuc/'.$error);
    } else {
        //Nếu không có lỗi thì thêm vào CSDL và trở lại trang home
        $sql = "INSERT INTO nganhhoc (IDNganh,Tentienganh,Tentiengviet,Viettat,Hinhanh,Mota) VALUES ('"
        .$id."','".$nameEng."','".$nameViet."','".$abbreviate."','".$image."','".$describe."')";
        $res = mysqli_query($conn,$sql);
        
        header('Location:/Admin/home');
    }
    
?>