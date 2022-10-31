<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
	$code = $_POST['code'];
    $name = $_POST['name'];
    $content = $_POST['content'];
	$image = $_FILES['image']["name"];

    $username_query = "SELECT * FROM news WHERE code='$code' ";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Mã tin tức đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: news.php');  
    }
    else
    {
		$query = "INSERT INTO news (name, code, image, content, status)
					VALUES ('$name', '$code', '$image', '$content', '1')";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$uploaddir = './news/';
			$uploadfile = $uploaddir . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

			$_SESSION['status'] = "Thêm thành công";
			$_SESSION['status_code'] = "success";
			header('Location: news.php');
		}
		else 
		{
			$_SESSION['status'] = "Đã có lỗi xảy ra";
			$_SESSION['status_code'] = "danger";
			header('Location: news.php');  
		}
    }

}
?>