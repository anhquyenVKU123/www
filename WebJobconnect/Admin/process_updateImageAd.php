<?php
    session_start();
?>
<?php
    $image  = $_FILES['image']['name'];
    $target ="image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $conn = mysqli_connect("localhost","root","","jobconnect");
    $sql = "UPDATE quantrivien SET Avatar='".$image."' WHERE IDQuantri='".$_SESSION['id_admin']."'";
    $res = mysqli_query($conn,$sql);
    header('Location:/Admin/home/chi-tiet-quan-tri-vien/'.$_SESSION['id_admin']);
?>