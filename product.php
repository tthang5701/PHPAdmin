<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- add form -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tạo sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="addProduct.php" method="POST" enctype = "multipart/form-data">

				<div class="modal-body">
					<div class="form-group">
						<label> Mã sản phẩm </label>
						<input type="text" name="code" class="form-control" placeholder="Nhập mã sản phẩm" required>
					</div>
					<div class="form-group">
						<label> Tên sản phẩm </label>
						<input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
					</div>
					<div class="form-group">
						<label> Giá </label>
						<input type="number" name="price" class="form-control" placeholder="Nhập giá " required>
					</div>
					<div class="form-group">
						<label> Số lượng </label>
						<input type="text" name="number" class="form-control" placeholder="Nhập số lượng">
					</div>
					<div class="form-group">
						<label> Loại sản phẩm </label>
						<select class="form-control" aria-label="Default select example" name="type" required>
							<option value="" selected disabled hidden>Chọn loại sản phẩm</option>
							<?php
							$query = "SELECT * FROM categories";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label> Nhà sản xuất</label>
						<select class="form-control" aria-label="Default select example" name="producer" required>
							<option value="" selected disabled hidden>Chọn nhà sản xuất</option>
							<?php
							$query = "SELECT * FROM brands";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label> Hình ảnh </label>
						<input type="file" name="image" class="form-control-file" placeholder="Chọn ảnh" required>
					</div>
					<div class="form-group">
						<label> Mô tả ngắn </label>
						<textarea type="text" name="content" class="form-control" placeholder="Nhập mô tả ngắn" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label> Mô tả chi tiết </label>
						<textarea type="text" name="description" class="form-control" placeholder="Nhập mô tả chi tiết" rows="5"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="editProduct.php" method="POST" enctype = "multipart/form-data">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label> Mã sản phẩm </label>
						<input id="code" disabled type="text" name="code" class="form-control" placeholder="Nhập mã sản phẩm">
					</div>
					<div class="form-group">
						<label> Tên sản phẩm </label>
						<input id="name" type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
					</div>
					<div class="form-group">
						<label> Giá </label>
						<input id="price" type="number" name="price" class="form-control" placeholder="Nhập giá">
					</div>
					<div class="form-group">
						<label> Số lượng </label>
						<input id="number" type="text" name="number" class="form-control" placeholder="Nhập số lượng">
					</div>
					<div class="form-group">
						<label> Loại sản phẩm </label>
						<select id="type" class="form-control" aria-label="Default select example" name="type">
							<option value="" selected disabled hidden>Chọn loại sản phẩm</option>
							<?php
							$query = "SELECT * FROM categories";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label> Nhà sản xuất</label>
						<select id="producer" class="form-control" aria-label="Default select example" name="producer">
							<option value="" selected disabled hidden>Chọn nhà sản xuất</option>
							<?php
							$query = "SELECT * FROM brands";
							$query_run = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($query_run)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label> Hình ảnh </label>
						<input id="image" type="file" name="image" class="form-control-file" placeholder="Chọn ảnh">
					</div>
					<div class="form-group">
						<label> Mô tả ngắn </label>
						<textarea id="content12" type="text" name="content" class="form-control" placeholder="Nhập mô tả ngắn" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label> Mô tả chi tiết </label>
						<textarea id="description" type="text" name="description" class="form-control" placeholder="Nhập mô tả chi tiết" rows="5"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
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
				<h5 class="modal-title" id="exampleModalLabel"> Xóa sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="deleteProduct.php" method="POST">

				<div class="modal-body">

					<input type="hidden" name="delete_id" id="delete_id">

					<h4> Bạn chắc chắn muốn xóa?</h4>
				</div>
				<div class="modal-footer">
					<button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal"> Hủy </button>
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
			<h6 class="m-0 font-weight-bold text-primary">Sản phẩm
				<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addadminprofile">
					Thêm
				</button>
			</h6>
		</div>

		<div class="card-body">

			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM products";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã sản phẩm </th>
							<th> Tên sản phẩm </th>
							<th> Giá </th>
							<th> Số lượng </th>
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
									<td><?php echo $row['code']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td class="right"><?php echo number_format($row['price']); ?></td>
									<td class="right"><?php echo number_format($row['quantity']); ?></td>
									<td class="center">
										<button type="button" class="btn btn-secondary editBtn" id="editBtn" value="<?php echo $row['id']; ?>"
											data-category="<?php echo $row['category_id']; ?>" data-brand="<?php echo $row['brand_id']; ?>"
											data-content="<?php echo $row['content']; ?>" data-description="<?php echo $row['description']; ?>"
											data-image="<?php echo $row['image']; ?>"> Sửa </button>
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
			var id = $(this).val();
			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();

			$('#id').val(id);
			$('#code').val(data[0]);
			$('#name').val(data[1]);
			$('#price').val(data[2]);
			$('#number').val(data[3]);
			
			var category = $(this).attr("data-category");
			$('#type').val(category);
			var brand = $(this).attr("data-brand");
			$('#producer').val(brand);
			var content = $(this).attr("data-content");
			$('#content12').val(content);
			var description = $(this).attr("data-description");
			$('#description').val(description);
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