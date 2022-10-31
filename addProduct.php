<?php
include('security.php');

if(isset($_POST['addbtn']))
{
	$code = $_POST['code'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$number = $_POST['number'];
	$type = $_POST['type'];
	$producer = $_POST['producer'];
	$image = $_FILES['image']["name"];
	$description = $_POST['description'];
	$content = $_POST['content'];

	$query = "SELECT * FROM products WHERE code='$code' ";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['status'] = "Mã sản phẩm đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: product.php');  
    }
    else
    {
        $query = "INSERT INTO `products` (`name`, `code`, `image`, `price`,
				`quantity`, `category_id`, `brand_id`, `content`, `description`, `status`)
				VALUES ('$name', '$code', '$image', '$price', '$number', '$type',
				 '$producer','$content', '$description', '1')";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$uploaddir = './img/';
			$uploadfile = $uploaddir . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

			$_SESSION['status'] = "Thêm thành công";
			$_SESSION['status_code'] = "success";
			header('Location: product.php');
		}
		else 
		{
			$_SESSION['status'] = "Đã có lỗi xảy ra";
			$_SESSION['status_code'] = "danger";
			header('Location: product.php');  
		}
    }

	
}

?>