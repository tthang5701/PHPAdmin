<?php
include('security.php');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

	$query = "DELETE FROM loaisp WHERE idloaisp='$id' ";
    $query_run = mysqli_query($connection, $query);
 
	if($query_run)
	{
		$_SESSION['status'] = "Xóa thành công";
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
