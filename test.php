<!DOCTYPE html>
<html>

<head>
	<title>Form Submittion without using submit Button</title>
</head>

<body>
	<button type="button" name="edit_btn" class="btn btn-success" value="123" id="edit"> EDIT</button>
	<script>
		$('.edit_btn').click(function() {
			var id = document.getElementById("edit");
			alert('id: ' + id);
		});
	</script>
</body>

</html>