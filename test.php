<!DOCTYPE html>
<html>

<head>
	<title>Form Submittion without using submit Button</title>
</head>

<body>
	<button type="button" name="edit_btn" class="btn btn-secondary" value="123" id="edit"> Sửa</button>
	<script>
		$('.edit_btn').click(function() {
			var id = document.getElementById("edit");
			alert('id: ' + id);
		});
	</script>
</body>

</html>