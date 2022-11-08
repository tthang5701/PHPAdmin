<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- add form -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tạo tài khoản</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="addAccount.php" method="POST" enctype = "multipart/form-data">

				<div class="modal-body">
					<div class="form-group">
						<label> Họ và tên </label>
						<input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên">
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="email" name="email" class="form-control" placeholder="Nhập email">
					</div>
					<div class="form-group">
						<label> Số điện thoại </label>
						<input  type="number" pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b" name="phonenumber" class="form-control" placeholder="Nhập số điện thoại">
					</div>
					<div class="form-group">
						<label> Tên đăng nhập </label>
						<input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
					</div>
					<div class="form-group">
						<label> Mật khẩu </label>
						<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
					</div>
					<div class="form-group">
						<label> Xác nhận mật khẩu </label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
					</div>
					<div class="form-group">
						<label> Địa chỉ </label>
						<input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
					</div>
					<div class="form-group">
						<label> Vai trò </label>
						<select id="type" class="form-control" aria-label="Default select example" name="role_id" required>
							<option value="" selected disabled hidden>Chọn vai trò</option>
							<?php
							$query = "SELECT * FROM roles";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					<button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
				</div>
			</form>

		</div>
	</div>
</div>


<!-- edit form -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sửa tài khoản</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="editAccount.php" method="POST" enctype = "multipart/form-data">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label> Họ và tên </label>
						<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập họ và tên">
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
					</div>
					<div class="form-group">
						<label> Số điện thoại </label>
						<input type="number" pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b" name="phonenumber" id="phonenumber" class="form-control" placeholder="Nhập số điện thoại">
					</div>
					<div class="form-group">
						<label> Tên đăng nhập </label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
					</div>
					<div class="form-group">
						<label> Mật khẩu </label>
						<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
					</div>
					<div class="form-group">
						<label> Xác nhận mật khẩu</label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu">
					</div>
					<div class="form-group">
						<label> Địa chỉ </label>
						<input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
					</div>
					<div class="form-group">
						<label> Vai trò </label>
						<select id="role" class="form-control" aria-label="Default select example" name="role_id" required>
							<option value="" selected disabled hidden>Chọn vai trò</option>
							<?php
							$query = "SELECT * FROM roles";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					<button type="submit" name="editbtn" class="btn btn-primary">Lưu</button>
				</div>
			</form>

		</div>
	</div>
</div>


<!-- delete form -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Xóa tài khoản</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="deleteAccount.php" method="POST">

				<div class="modal-body">

					<input type="hidden" name="delete_id" id="delete_id">

					<h4> Bạn chắc chắn muốn xóa?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> Hủy </button>
					<button type="submit" name="deletedata" class="btn btn-primary"> Xóa </button>
				</div>
			</form>

		</div>
	</div>
</div>



<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
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
		<div class="card-header py-3">
			
			<h6 class="m-0 font-weight-bold text-primary">Tài khoản
				<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addadminprofile">
					Thêm
				</button>
			</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM users";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Họ và tên </th>
							<th> Tên đăng nhập </th>
							<th> Email </th>
							<th> Số điện thoại </th>
							<th> Sửa </th>
							<th> Xóa </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
						?>
								<tr>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['phone_number']; ?></td>
									<td class="center">
										<button type="button" class="btn btn-secondary editBtn" id="editBtn" value="<?php echo $row['id']; ?>"
										data-address="<?php echo $row['address']; ?>" data-role="<?php echo $row['role_id']; ?>"> Sửa</button>
									</td>
									<td class="center">
										<!-- <a href="#" class="deleteBtn" id="deleteBtn" value="<?php echo $row['id']; ?>">
											<i class="fa fa-trash" aria-hidden="true" style="color: #f14c4c;"></i>
										</a> -->
										<button type="button" class="btn btn-danger deleteBtn" 
											id="deleteBtn" value="<?php echo $row['id']; ?>"> Xóa </button>
									</td>
								</tr>
						<?php
							}
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


<script type="text/javascript">
	$(document).ready(function() {
		$('.editBtn').on('click', function() {
			$('#editmodal').modal('show');
			var id = $(this).val();
			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();

			$('#id').val(id);
			$('#fullname').val(data[0]);
			$('#username').val(data[1]);
			$('#email').val(data[2]);
			$('#phonenumber').val(data[3]);

			var address = $(this).attr("data-address");
			$('#address').val(address);
			var role = $(this).attr("data-role");
			$('#role').val(role);
		});
	});
</script>

<script>
	$(document).ready(function() {

		$('.deleteBtn').on('click', function() {
			$('#deletemodal').modal('show');
			var id = $(this).val();
			$('#delete_id').val(id);
		});
	});
</script>

<script>
	$('#addadminprofile').on('hidden.bs.modal', function() {
		$('#addadminprofile form')[0].reset();
	});
	$('#editmodal').on('hidden.bs.modal', function() {
		$('#editmodal form')[0].reset();
	});
</script>