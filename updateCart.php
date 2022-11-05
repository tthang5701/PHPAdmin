<?php
include('security.php');

$id = $_GET['id'];

$username_query = "SELECT status FROM orders WHERE id='$id' ";
$username_query_run = mysqli_query($connection, $username_query);
$data = mysqli_fetch_assoc($username_query_run);
if(mysqli_num_rows($username_query_run) > 0)
{
	$status = $data['status'] + 1;
	$query = "UPDATE `orders` SET `status` = $status WHERE `orders`.`id` = $id";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		$_SESSION['status'] = "Cập nhật trạng thái thành công";
		$_SESSION['status_code'] = "success";
		header('Location: cart.php');
	} else {
		$_SESSION['status'] = "Đã có lỗi xảy ra";
		$_SESSION['status_code'] = "danger";
		header('Location: cart.php');  
	}
}
else
{
	$_SESSION['status'] = "Không tìm thấy đơn hàng";
	$_SESSION['status_code'] = "danger";
	header('Location: cart.php');  
}

?>