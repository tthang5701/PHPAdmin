<?php
include('security.php');

if(isset($_POST['editbtn']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];

	$query = "UPDATE categories SET name='$name' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['status'] = "Sửa thành công";
		$_SESSION['status_code'] = "success";
		header('Location: category.php'); 
	}
	else
	{
		$_SESSION['status'] = "Đã xảy ra lỗi";
		$_SESSION['status_code'] = "danger";
		header('Location: category.php'); 
	}

}
