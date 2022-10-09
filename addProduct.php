<?php
include('security.php');

if(isset($_POST['addbtn']))
{
	$code = $_POST['code'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$number = $_POST['number'];
	$type = $_POST['type'];
	$producer = $_POST['producer'];
	$image = $_POST['image'];
	$description = $_POST['description'];

	$query = "SELECT * FROM sanpham WHERE masp='$code' ";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['status'] = "Mã sản phẩm đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: product.php');  
    }
    else
    {
        $query = "INSERT INTO `sanpham` (`tensp`, `masp`, `hinhanh`, `giadexuat`,
				`giagiam`, `soluong`, `loaisp`, `nhasx`, `noidung`, `tinhtrang`)
				VALUES ('$name', '$code', '$image', '$price', '$discount', 
				'$number', '$type', '$producer', '$description', '1+r54');";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$uploaddir = './img/';
			$uploadfile = $uploaddir . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

			$_SESSION['success'] = "Thêm thành công";
			$_SESSION['status_code'] = "success";
			header('Location: product.php');
		}
		else 
		{
			$_SESSION['error'] = "Đã có lỗi xảy ra";
			$_SESSION['status_code'] = "danger";
			header('Location: product.php');  
		}
    }

	
}

?>