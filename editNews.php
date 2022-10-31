<?php
include('security.php');

if(isset($_POST['editbtn']))
{
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $content = $_POST['content'];
	$image = $_FILES['image']["name"];

	$username_query = "SELECT * FROM news WHERE code='$code'";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Mã tin tức đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: news.php');  
    } else {
		if($image == null){
			$query = "UPDATE news SET name='$name', content='$content' WHERE id='$id' ";
		}
		else {
			$query = "UPDATE news SET name='$name', content='$content', image='$image' WHERE id='$id' ";
		}
		
		$query_run = mysqli_query($connection, $query);

		if($query_run)
		{
			$uploaddir = './news/';
			$uploadfile = $uploaddir . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
			
			$_SESSION['status'] = "Sửa thành công";
			$_SESSION['status_code'] = "success";
			header('Location: news.php'); 
		}
		else
		{
			$_SESSION['status'] = "Đã xảy ra lỗi";
			$_SESSION['status_code'] = "danger";
			header('Location: news.php'); 
		}
	}

}
