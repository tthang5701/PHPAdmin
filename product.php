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
			<form action="addProduct.php" method="POST">

				<div class="modal-body">
					<div class="form-group">
						<label> Mã sản phẩm </label>
						<input type="text" name="product_code" class="form-control" placeholder="Nhập mã sản phẩm">
					</div>
					<div class="form-group">
						<label> Tên sản phẩm </label>
						<input type="text" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm">
					</div>
					<div class="form-group">
						<label> Giá </label>
						<input type="phone" name="price" class="form-control" placeholder="Nhập giá">
					</div>
					<div class="form-group">
						<label> Số lượng </label>
						<input type="text" name="number" class="form-control" placeholder="Nhập tên đăng nhập">
					</div>
					<div class="form-group">
						<label> Loại sản phẩm </label>
						<input type="text" name="product_type" class="form-control" placeholder="Nhập mật khẩu">
					</div>
					<div class="form-group">
						<label> Nhà sản xuất</label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu">
					</div>
					<!-- <div class="form-group">
						<label> Ảnh đại diện </label>
						<input type="file" name="avatar" class="form-control" placeholder="Nhập lại mật khẩu">
					</div> -->

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
			<form action="editAccount.php" method="POST">
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
						<input type="phone" name="phonenumber" id="phonenumber" class="form-control" placeholder="Nhập số điện thoại">
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
					<!-- <div class="form-group">
						<label> Ảnh đại diện </label>
						<input type="file" name="avatar" class="form-control" placeholder="Nhập lại mật khẩu">
					</div> -->

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
		<!-- <?php
			if(isset($_SESSION["status"]) && $_SESSION["status"] != ''){
				echo '<div class="alert alert-'.$_SESSION['status_code'].'" role="alert">'
						.$_SESSION['status'].
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button></div>';
			}
		?> -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sản phẩm
				<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addadminprofile">
					Thêm
				</button>
			</h6>
		</div>

		<div class="card-body">

			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM sanpham";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã sản phẩm </th>
							<th> Tên sản phẩm </th>
							<th> Giá </th>
							<th> Số lượng </th>
							<th> Edit </th>
							<th> Delete </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
						?>
								<tr>
									<td><?php echo $row['masp']; ?></td>
									<td><?php echo $row['tensp']; ?></td>
									<td><?php echo $row['giadexuat']; ?></td>
									<td><?php echo $row['soluong']; ?></td>
									<td>
										<button type="button" class="btn btn-secondary editBtn" id="editBtn" value="<?php echo $row['idsanpham']; ?>"> Sửa </button>
									</td>
									<td>
										<!-- <a href="#" class="deleteBtn" id="deleteBtn" value="<?php echo $row['idadmin']; ?>">
											<i class="fa fa-trash" aria-hidden="true" style="color: #f14c4c;"></i>
										</a> -->
										<button type="button" class="btn btn-danger deleteBtn" 
											id="deleteBtn" value="<?php echo $row['idsanpham']; ?>"> Xóa </button>
									</td>
								</tr>
						<?php
							}
						} else {
							echo "No Record Found";
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


<script>
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