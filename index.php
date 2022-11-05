<?php
include('includes/header.php'); 
session_start();
?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <p class="h4 text-gray-900 mb-4">Đăng nhập</p>
                <?php
					if(isset($_SESSION["status"]) && $_SESSION["status"] != ''){
				?>
				<div class="alert alert-<?=$_SESSION['status_code']?>">
					<?php
						echo $_SESSION['status'];
						unset($_SESSION['status']);
					?>
				</div>
				<?php } ?>
              </div>

                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="emaill" class="form-control form-control-user" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="form-group">
                    <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Mật khẩu" required>
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Đăng nhập </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>