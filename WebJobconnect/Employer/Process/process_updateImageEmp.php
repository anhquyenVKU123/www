<?php
    session_start();
?>
<?php
    $image  = $_FILES['image']['name'];
    $target ="../image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "UPDATE nhatuyendung SET Avatar='".$image."' WHERE IDEmployer='".$_SESSION['id_employer']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Employer/home/chi-tiet-nha-tuyen-dung/'.$_SESSION['id_employer']);
?>