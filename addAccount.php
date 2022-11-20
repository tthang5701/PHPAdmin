<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
	$fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
	$phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $address = $_POST['address'];
    $role_id = $_POST['role_id'];
	$avatar = $_FILES['avatar']["name"];

    $username_query = "SELECT * FROM users WHERE username='$username' ";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Tên đăng nhập đã tồn tại";
        $_SESSION['status_code'] = "danger";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO users (name, username, email, phone_number, password, address, role_id, status)
						VALUES ('$fullname', '$username', '$email', '$phoneNumber', '$password', '$address', '$role_id', '1')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                $uploaddir = './avatar/';
				$uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
				move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);

                $_SESSION['status'] = "Thêm thành công";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Đã có lỗi xảy ra";
                $_SESSION['status_code'] = "danger";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Nhập lại mật khẩu không chính xác";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}
?>