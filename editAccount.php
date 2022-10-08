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
	$avatar = $_POST['avatar'];

	$username_query = "SELECT * FROM admin WHERE username='$username' AND idadmin!='$id' ";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Tên đăng nhập đã tồn tại";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    } else {
		if($password === $cpassword) {
			$query = "UPDATE admin SET fullname='$fullname', username='$username', email='$email',
				password='$password', phonenumber='$phoneNumber', avatar='$avatar' WHERE idadmin='$id' ";
			$query_run = mysqli_query($connection, $query);

			if($query_run)
			{
				$_SESSION['status'] = "Sửa thành công";
				$_SESSION['status_code'] = "success";
				header('Location: register.php'); 
			}
			else
			{
				$_SESSION['status'] = "Đã xảy ra lỗi";
				$_SESSION['status_code'] = "error";
				header('Location: register.php'); 
			}
		} else {
			$_SESSION['status'] = "Nhập lại mật khẩu không chính xác";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
		}
	}

}
