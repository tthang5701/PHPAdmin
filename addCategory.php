<?php
include('security.php');

if(isset($_POST['addbtn']))
{
	$name = $_POST['name'];

	$query = "INSERT INTO categories(name) VALUES ('$name')";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		// echo "Saved";
		$_SESSION['success'] = "Thêm thành công";
		$_SESSION['status_code'] = "success";
		header('Location: category.php');
	}
	else 
	{
		$_SESSION['error'] = "Đã có lỗi xảy ra";
		$_SESSION['status_code'] = "danger";
		header('Location: category.php');  
	}
}

?>