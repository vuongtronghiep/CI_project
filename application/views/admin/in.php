<!DOCTYPE html>
<html>
<head>
	<title>In hóa đơn</title>
	<style type="text/css" media="print">
	#print_button{
	display:none;
	}
</style>
<base href="<?php echo ARSENAL_BASE_URL; ?>" />
	<link rel="stylesheet" type="text/css" href="public/template/back-end/css/inhoadon.css">

</head>
<body>
	<div class="main">
		<div class="img"><img src="public/template/back-end/image/logo.png" width="140px" height="130px"></div>
		<div class="top">
			<p class="ten">CỬA HÀNG SHOPARSENAL</p><br>
			<P class="diachi">Địa Chỉ: &nbsp;&nbsp;Học viện tài chính - Đức Thắng - Bắc Từ Liêm - Hà Nội.</P><br>
			<p class="dienthoai"> Điện thoại: &nbsp;(04) 38959050.</p><br>
			<p class="email"> Email: &nbsp;shoparsenal@gmail.com.</p><br>
		</div>
		<div class="hoadon">
			HÓA ĐƠN BÁN HÀNG
			<p class="id">Số:<?php foreach($info->result_array() as $row){
				echo $row['order_id'];
				} ?></p>
		</div>
		<div class="khachhang">
		<?php foreach($info->result_array() as $row){

			?>
			<p class="tenkh">Tên khách hàng: <?php echo $row['hoten'];?></p>
			<p class="dc">Địa chỉ: <?php echo $row['diachi'];?></p>
			<p class="dt">Điện thoại: <?php echo $row['dienthoai'];?></p>
			<p class="ngaydat">Ngày đặt:  <?php echo $row['ngay_tao'];?></p>
			<?php }?>
		</div>
		<div class="noidung">
			<table border="1px">
				<tr text-align="center">
					<td>Tên sản phẩm</td>
					<td>Số lượng</td>
					<td>Đơn giá</td>
					<td>Thành tiền</td>
				</tr>
		<?php foreach($test->result_array() as $row){
			$thanhtien = $row['soluong'] * $row['giasaukhuyenmai'];
			?>
				<tr>
					<th><?php echo $row['tensanpham'];?></th>
					<th><?php echo $row['soluong'];?></th>
					<th><?php echo number_format(round(floor($row['giasaukhuyenmai']),-3));?></th>
					<th><?php echo number_format(round(floor($thanhtien),-3));?></th>
				</tr>
				<?php }?>
			</table>
			 <?php foreach ($tongtien as $row) {

			?>
			<p class="tongtien">Tổng tiền:<?php echo number_format(round(floor($row['tong']),-3)).' VNĐ';} ?> </div></p>
		<div class="foot">
			<p class="kykh">Khách hàng</p>
			<p class="ngay">Ngày... Tháng... Năm 20..</p>
			<p class="kynv">Người lập đơn</p>
		</div>
		
	 <input type="submit" name="aa" Value="In Hóa Đơn" onclick="window.print()" id="print_button" class="inhd"/>
	</div>
	<div class="a" id="print_button"><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang">Danh sách đơn hàng</a></div>

</body>
</html>
