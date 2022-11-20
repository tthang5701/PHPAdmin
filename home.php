<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tài khoản</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
			  <?php
				$sql = "SELECT id from users ";
				$query = mysqli_query($connection, $sql);
				$totalAccount = mysqli_num_rows($query);
				?>
			   <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo htmlentities($totalAccount); ?></div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu</div>
				<?php
				$sql = "SELECT sum(total_price) as total FROM order_detail ";
				$query = mysqli_query($connection, $sql);
				$totalProduct = $query->fetch_assoc();
				?>
			  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalProduct["total"] == null ? 0 : number_format($totalProduct["total"]); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng</div>
              <?php
				$sql = "SELECT id from orders ";
				$query = mysqli_query($connection, $sql);
				$totalProduct = mysqli_num_rows($query);
				?>
			  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo htmlentities($totalProduct); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sản phẩm</div>
			  <?php
				$sql = "SELECT id from products ";
				$query = mysqli_query($connection, $sql);
				$totalProduct = mysqli_num_rows($query);
				?>
			  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo htmlentities($totalProduct); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>