<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","jobconnect");

    $title = $_POST['title'];
    $title1 = $_POST['title1'];
    $title2 = $_POST['title2'];

    $content = $_POST['content'];
    $content1 = $_POST['content1'];
    $content2 = $_POST['content2'];

    $targetDirectory="image_News/";

    $image = $_FILES['image'];
    $image1 = $_FILES['image1'];
    $image2 = $_FILES['image2'];

    $targetPath = $targetDirectory.basename($image['name']);
    $targetPath1 = $targetDirectory.basename($image1['name']);
    $targetPath2 = $targetDirectory.basename($image2['name']);

    move_uploaded_file($image['tmp_name'],$targetPath);
    move_uploaded_file($image1['tmp_name'],$targetPath1);
    move_uploaded_file($image2['tmp_name'],$targetPath2);

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDateTime = date('Y-m-d H:i');


    $sql = "INSERT INTO tintuc(IDQuantri, Tieude, Tieude1, Tieude2, Modau, Noidung1, Noidung2, Anhmodau, Anh1, Anh2, Ngaydang) VALUES
        ('" . $_SESSION['id_admin'] . "', '$title', '$title1', '$title2', '$content', '$content1', '$content2', '" . $image['name'] . "', '" . $image1['name'] . "', '" . $image2['name'] . "', '".$currentDateTime."')";
    mysqli_query($conn, $sql);
?>
<script>
    window.onload = function() {
        setTimeout(function() {
            alert("Đăng tin thành công");
            window.location.href = "/Admin/home/danh-sach-tin-tuc";
        }, 100); // Thời gian chờ trước khi chuyển hướng (đơn vị: milliseconds)
    };
</script>