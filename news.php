<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- add form -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tạo tin tức</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="addNews.php" method="POST" enctype = "multipart/form-data">

				<div class="modal-body">
					<div class="form-group">
						<label> Mã </label>
						<input type="text" name="code" class="form-control" placeholder="Nhập mã" required>
					</div>
					<div class="form-group">
						<label> Tiêu đề </label>
						<input type="text" name="name" class="form-control" placeholder="Nhập tiêu đề" required>
					</div>
					<div class="form-group">
						<label> Ảnh </label>
						<input type="file" name="image" class="form-control-file">
					</div>
					<div class="form-group">
						<label> Nội dung </label>
						<textarea type="text" name="content" class="form-control" placeholder="Nhập nội dung" rows="5"></textarea>
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
				<h5 class="modal-title" id="exampleModalLabel">Sửa tin tức</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="editNews.php" method="POST" enctype = "multipart/form-data">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label> Mã </label>
						<input type="text" name="code" id="code" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label> Tiêu đề </label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Nhập tiêu đề" required>
					</div>
					<div class="form-group">
						<label> Ảnh </label>
						<input type="file" name="image" id="image" class="form-control-file">
					</div>
					<div class="form-group">
						<label> Nội dung </label>
						<textarea type="text" name="content" id="content1" class="form-control" 
							rows="5" placeholder="Nhập nội dung"></textarea>
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
				<h5 class="modal-title" id="exampleModalLabel"> Xóa tin tức</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="deleteNews.php" method="POST">

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
			
			<h6 class="m-0 font-weight-bold text-primary">Tin tức
				<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addadminprofile">
					Thêm
				</button>
			</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM news";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã </th>
							<th> Tiêu đề </th>
							<th> Nội dung </th>
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
									<td><?php echo $row['content']; ?></td>
									<td class="center">
										<button type="button" class="btn btn-secondary editBtn" id="editBtn" 
											value="<?php echo $row['id']; ?>"> Sửa</button>
									</td>
									<td class="center">
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
			$('#code').val(data[0]);
			$('#name').val(data[1]);
			$('#content1').val(data[2]);
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