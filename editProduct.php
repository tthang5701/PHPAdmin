<?php
include('security.php');

if(isset($_POST['editbtn']))
{
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $number = $_POST['number'];
    $type = $_POST['type'];
    $producer = $_POST['producer'];
    $image = $_POST['image'];
    $description = $_POST['description'];

	$query = "UPDATE sanpham SET tenloaisp='$name' WHERE idsanpham='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$uploaddir = './avatar/';
		$uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
		move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);
		$_SESSION['status'] = "Sửa thành công";
		$_SESSION['status_code'] = "success";
		header('Location: category.php'); 
	}
	else
	{
		$_SESSION['status'] = "Đã xảy ra lỗi";
		$_SESSION['status_code'] = "error";
		header('Location: category.php'); 
	}

}
