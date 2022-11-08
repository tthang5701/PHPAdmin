<?php
	header("Content-Type: application/xls");    
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	include('security.php');
	$id = $_GET['id'];
 
	$output = "";

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
		$row = mysqli_fetch_assoc($query_run);
		$file_name = "HoaDon_".($row['fullname'] != null ? $row['fullname'] : $row['username'])."_".date('d/m/Y');
		header("Content-Disposition: attachment; filename=$file_name.xls");  
		$status = $row['status'];
		if($status == 0){
			$content = 'Chờ xử lý';
		} elseif($status == 1){
			$content = 'Đang vận chuyển';
		} elseif($status == 2){
			$content = 'Đã giao thành công';
		}
		$output .= "<div style='font-family: Times New Roman'><label>Mã đơn hàng: ".$id."</label>
					<label>Tên khách hàng: ".($row['fullname'] != null ? $row['fullname'] : $row['username'])."</label></div>
					<div style='font-family: Times New Roman'><label>Ngày đặt: ".date('d/m/Y', strtotime($row['created_date']))."</label>
					<label>Địa chỉ: ".$row['address']."</label></div>
					<div style='font-family: Times New Roman'><label>Phương thức thanh toán: ".$row['payment']."</label>
					<label>Trạng thái: ".$content."</label></div>
					";
	}
 
	$output .="
		<table style='font-family: Times New Roman' border='1px solid'>
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
			$total += $row['quantity'] * $row['price'];
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
				<tr>
					<td colspan='4' style='text-align: right; font-weight: bold;'>Thành tiền</td>
					<td style='text-align: right'>".number_format($total)."</td>
				</tr>
			</tbody>
 
		</table>
	";
 
	echo $output;
?>