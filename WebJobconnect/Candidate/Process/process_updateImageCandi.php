<?php
    session_start();
?>
<?php
    $image  = $_FILES['image']['name'];
    $target ="../image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "UPDATE ungvien SET Avatar='".$image."' WHERE IDUngvien='".$_SESSION['id_candidate']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Candidate/home/chi-tiet-ung-vien/'.$_SESSION['id_candidate']);
?>