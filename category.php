<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- add form -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tạo danh mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="addCategory.php" method="POST">

				<div class="modal-body">
					<div class="form-group">
						<label> Tên danh mục </label>
						<input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					<button type="submit" name="addbtn" class="btn btn-primary">Lưu</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="editCategory.php" method="POST">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label> Tên danh mục </label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục" required>
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
				<h5 class="modal-title" id="exampleModalLabel"> Xóa danh mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="deleteCategory.php" method="POST">

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
		if (isset($_SESSION["status"]) && $_SESSION["status"] != '') {
		?>
			<div class="alert alert-<?= $_SESSION['status_code'] ?>">
				<?php
				echo $_SESSION['status'];
				unset($_SESSION['status']);
				?>
			</div>
		<?php } ?>
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Danh mục
				<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="searchCategory.php" method="POST">
					<div class="input-group">
						<input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" name="searchBtn">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form> -->
				<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addadminprofile">
					Thêm
				</button>
			</h6>
		</div>

		<div class="card-body">

			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM categories";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã danh mục </th>
							<th> Tên danh mục </th>
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
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td class="center">
										<button type="button" class="btn btn-secondary editBtn" id="editBtn" value="<?php echo $row['i']; ?>"> Sửa</button>
									</td>
									<td class="center">
										<button type="button" class="btn btn-danger deleteBtn" id="deleteBtn" value="<?php echo $row['id']; ?>"> Xóa </button>
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


<script>
	$(document).ready(function() {
		$('.editBtn').on('click', function() {
			$('#editmodal').modal('show');
			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();

			$('#id').val(data[0]);
			$('#name').val(data[1]);
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