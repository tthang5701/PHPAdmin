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
	$avatar = $_POST['avatar'];

    $username_query = "SELECT * FROM admin WHERE username='$username' ";
    $username_query_run = mysqli_query($connection, $username_query);
    if(mysqli_num_rows($username_query_run) > 0)
    {
        $_SESSION['status'] = "Tên đăng nhập đã tồn tại";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (fullname, username, email, phonenumber, password)
						VALUES ('$fullname', '$username', '$email', '$phoneNumber', '$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Tạo tài khoản thành công";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Đã có lỗi xảy ra";
                $_SESSION['status_code'] = "error";
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