<?php
include('security.php');

if(isset($_POST['editbtn']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $number = $_POST['number'];
    $type = $_POST['type'];
    $producer = $_POST['producer'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $content = $_POST['content'];

	if($image == null){
		$query = "UPDATE products SET name='$name', price='$price', quantity='$number', category_id='$type',
			brand_id='$producer', content='$content', description='$description' WHERE id='$id' ";
	} else {
		$query = "UPDATE products SET name='$name', image='$image', price='$price', quantity='$number', 
			category_id='$type', brand_id='$producer', content='$content', description='$description' WHERE id='$id' ";
	}
	
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$uploaddir = './img/';
		$uploadfile = $uploaddir . basename($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
		$_SESSION['status'] = "Sửa thành công";
		$_SESSION['status_code'] = "success";
		header('Location: product.php'); 
	}
	else
	{
		$_SESSION['status'] = "Đã xảy ra lỗi";
		$_SESSION['status_code'] = "danger";
		header('Location: product.php'); 
	}

}
