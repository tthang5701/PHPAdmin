<?php
include('includes/header.php');
include('includes/navbar.php');

$id = $_GET['id'];
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			
			<h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng
			<a href="exportCartDetail.php?id=<?=$id?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="float: right;"><i
        		class="fas fa-download fa-sm text-white-50"></i> Xuất hóa đơn</a>
			</h6>
		</div>

		<div class="card-body">
			<?php
				$query = "SELECT orders.id as id, orders.created_date as created_date, 
						orders.status as status, payments.name as payment,
						users.name as fullname, users.username as username, 
						users.address as address FROM orders
						JOIN payments ON payments.id = orders.payment_id
						JOIN cart ON orders.cart_id = cart.id
						JOIN users ON cart.user_id = users.id
						WHERE orders.id = $id";
				$query_run = mysqli_query($connection, $query);
				
				if (mysqli_num_rows($query_run) > 0) {
					$row = mysqli_fetch_assoc($query_run)
				?>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="code">Mã đơn hàng</label>
					<input type="text" class="form-control" id="code" disabled value="<?= $row['id']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Tên khách hàng</label>
					<input type="text" class="form-control" id="inputPassword4" disabled 
						value="<?= $row['fullname'] != null ? $row['fullname'] : $row['username']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Ngày đặt</label>
					<input type="text" class="form-control" id="inputEmail4" disabled value="<?= date('d/m/Y', strtotime($row['created_date']))?>">
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Địa chỉ</label>
					<input type="text" class="form-control" id="inputPassword4" disabled value="<?= $row['address']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Phương thức thanh toán</label>
					<input type="text" class="form-control" id="inputEmail4" disabled value="<?= $row['payment']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Trạng thái</label>
					<?php 
						$status = $row['status'];
						if($status == 0){
							$content = 'Chờ xử lý';
						} elseif($status == 1){
							$content = 'Đang vận chuyển';
						} elseif($status == 2){
							$content = 'Đã giao thành công';
						}
					?>
					<input type="text" class="form-control" id="inputPassword4" disabled value="<?= $content ?>">
				</div>
			</div>
			<?php } ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> STT </th>
							<th> Tên sản phẩm </th>
							<th> Số lượng </th>
							<th> Giá </th>
							<th> Tổng </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT products.name as product_name, order_detail.quantity as quantity, order_detail.price as price FROM order_detail 
								JOIN orders ON order_detail.order_id = orders.id
								JOIN products ON order_detail.product_id = products.id
								WHERE order_id = $id";
						$query_run = mysqli_query($connection, $sql);
						$count = 0;
						$total = 0;
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
								$count += 1;
								$total += $row['quantity'] * $row['price'];
						?>
								<tr>
									<td><?= $count ?></td>
									<td><?= $row['product_name'] ?></td>
									<td class="right"><?= number_format($row['quantity']); ?></td>
									<td class="right"><?= number_format($row['price']); ?></td>
									<td class="right"><?= number_format($row['quantity']*$row['price']) ?></td>
								</tr>
						<?php
							}
						?>
						<tr>
							<td colspan="4" style="text-align: right; font-weight: bold;">Thành tiền</td>
							<td class="right"><?= number_format($total) ?></td>
						</tr>
						<?php
						} else {
							echo "<tr><td colspan='5' style='text-align: center;'>Không có bản ghi</td><tr>";
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>