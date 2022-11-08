<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=HoaDon.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	include('security.php');
	$id = $_GET['id'];
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Tổng tiền</th>
				</tr>
			<tbody>
	";
 
	$sql = "SELECT products.name as product_name, order_detail.quantity as quantity,
							order_detail.price as price FROM order_detail 
							JOIN orders ON order_detail.order_id = orders.id
							JOIN products ON order_detail.product_id = products.id
							WHERE order_id = $id";
	$query_run = mysqli_query($connection, $sql);
	$count = 0;
	$total = 0;
	if (mysqli_num_rows($query_run) > 0) {
		while ($row = mysqli_fetch_assoc($query_run)) {
			$count += 1;
			$output .= "
					<tr>
						<td>".$count."</td>
						<td>".$row['product_name']."</td>
						<td>".number_format($row['quantity'])."</td>
						<td>".number_format($row['price'])."</td>
						<td>".number_format($row['quantity'] * $row['price'])."</td>
					</tr>
				";
		}
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>