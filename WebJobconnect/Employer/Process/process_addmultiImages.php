<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jobconnect");
    $targetDirectory = "D:laragon/www/WebJobconnect/Employer/image/";

    // Kiểm tra xem có tệp tin đã được chọn không
    if (!empty($_FILES["images"]["tmp_name"][0])) {
        $images = $_FILES["images"];

        // Lặp qua từng hình ảnh
        for ($i = 0; $i < count($images['tmp_name']); $i++) {
            $tmp_name = $images["tmp_name"][$i];
            $path_parts = pathinfo($images["name"][$i]);

            // Kiểm tra loại tệp tin
            $image_info = getimagesize($tmp_name);
            if ($image_info != false) {
                // Hợp lệ là hình ảnh
                $extension = $path_parts['extension'];
                $name = $path_parts['filename'] . '.' . $extension;
                //Kiểm tra xem hình ảnh đã tồn tại chưa
                $sqlCheck = "SELECT * FROM hinhanhnhatuyendung WHERE NameImage = '$name'";
                $resCheck = mysqli_query($conn,$sqlCheck);
                if (mysqli_num_rows($resCheck) > 0) continue;
                $targetPath = $targetDirectory . $name;

                // Di chuyển hình ảnh vào thư mục đích
                if (move_uploaded_file($tmp_name, $targetPath)) {
                    $sql="INSERT INTO hinhanhNhatuyendung(IDEmployer,NameImage) VALUES (
                        '".$_SESSION['id_employer']."','".$name."')";
                    $res = mysqli_query($conn,$sql);
                } else {
                    echo "Có lỗi khi di chuyển hình ảnh $name!<br>";
                }
            } else {
                // Không phải là hình ảnh
                echo "File không phải là hình ảnh: " . $path_parts['filename'] . "." . $path_parts['extension'] . "<br>";
            }
        }
    } else {
        // Không có tệp tin nào được chọn
        echo "Vui lòng chọn ít nhất một hình ảnh.";
    }
    echo '<script>window.history.back();</script>';
?>
