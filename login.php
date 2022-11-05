<?php
include('security.php');
session_start();

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM users WHERE username='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);
	$result = mysqli_fetch_array($query_run);
   if($result > 0)
   {
        $_SESSION['username'] = $email_login;
		$_SESSION['avatar'] = $result['avatar'];
        header('Location: home.php');
   } 
   else
   {
        $_SESSION['status'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
		$_SESSION['status_code'] = "danger";
        header('Location: index.php');
   }
    
}
?>