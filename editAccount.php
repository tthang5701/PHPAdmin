<?php
include('security.php');

if(isset($_POST['editbtn']))
{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
	$phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
	$avatar = $_FILES['avatar']["name"];
    $address = $_POST['address'];
    $role_id = $_POST['role_id'];

	$username_query = "SELECT * FROM users WHERE username='$username' AND id!='$id' ";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Tên đăng nhập đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: register.php');  
    } else {
		if($password === $cpassword) {
			if($password == null){
				$query = "UPDATE users SET name='$fullname', username='$username', email='$email',
					phone_number='$phoneNumber', address='$address', role_id='$role_id' WHERE id='$id' ";
			}
			else {
				$query = "UPDATE users SET name='$fullname', username='$username', email='$email',
					password='$password', phone_number='$phoneNumber', address='$address', role_id='$role_id' WHERE id='$id' ";
			}
			
			$query_run = mysqli_query($connection, $query);

			if($query_run)
			{
				$uploaddir = './avatar/';
				$uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
				move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);
				
				$_SESSION['status'] = "Sửa thành công";
				$_SESSION['status_code'] = "success";
				header('Location: register.php'); 
			}
			else
			{
				$_SESSION['status'] = "Đã xảy ra lỗi";
				$_SESSION['status_code'] = "danger";
				header('Location: register.php'); 
			}
		} else {
			$_SESSION['status'] = "Nhập lại mật khẩu không chính xác";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
		}
	}

}
