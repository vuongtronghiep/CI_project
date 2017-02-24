<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Thông tin chi tiết đơn hàng</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
  	<link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="jquery/jquery-1.11.2.min.js"/></script>
    <link rel="stylesheet" href="public/template/back-end/css/sanpham.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style type="text/css">
    	.table{
		  width: 100%;
		  max-width: 100%;
		 
		}
		    </style>
</head>
<body>
	<header>
		 <h4>HỆ THỐNG QUẢN TRỊ WEBSITE ARSENAL SHOP</h4>
		 <div class="logout"><a href="<?php echo ARSENAL_BASE_URL;?>admin/dangnhap/logOut">Đăng Xuất</a></div>
	</header>
	<nav>
		<ul>
	<li>&nbsp;</li>
		<li>&nbsp;</li>
			<li ><a href="<?php echo ARSENAL_BASE_URL;?>admin/home">Trang chủ</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham">Sản Phẩm</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldanhmuc">Danh Mục</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang">Đơn hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qluser">Khách hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke">Thống kê</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qladmin">Admin</a></li>
		</ul>

	</nav>

	<div class="">
	<div class="table-responsive">  
				<div class="panel panel-default" width="100%">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">THÔNG TIN CHI TIẾT ĐƠN HÀNG</h5></div>

				  <!-- Table -->
				  <table class="table" style="width:100%"> 
				    <thead>
					    <tr>
					        <th class="col-md-1">Mã đơn hàng</th>
					        <th class="col-md-1">Mã chi tiết</th>							
							<th class="col-md-1">Id Khách hàng</th>
							<th class="col-md-1">Tên Khách hàng</th>
							<th class="col-md-1">Số điện thoại</th>
							<th class="col-md-2">Địa chỉ</th>
							<th class="col-md-1">Tên sản phẩm</th>
							<th class="col-md-1">số lượng mua</th>
							<th class="col-md-1">Giá</th>
							<th class="col-md-1">Ngày đặt hàng</th>								
							<th class="col-md-1">Tình Trạng đơn hàng</th>
					    </tr>
					</thead>
					<?php foreach($chitiet->result_array() AS $row) { 							
						?>
					<tbody>
					    <tr>
					    	<?php $id = $row['order_id'];?>
					        <td><?php echo $row['order_id'];?></td>
					        <td><?php echo $row['chitiet_id'];?></td>
							<td><?php echo $row['id_khachhang'];?></td>
							<td><?php echo $row['hoten'];?></td>							
							<td><?php echo $row['dienthoai'];?></td>
							<td><?php echo $row['diachi'];?></td>
							<td><?php echo $row['tensanpham'];?></td>
							<td><?php echo $row['soluong'];?></td>
							<td><?php echo $row['giasaukhuyenmai'];?></td>
							<td><?php echo $row['ngay_order'];?></td>
							<td><?php echo $row['tinhtrang_order'];?></td>						
					    </tr><?php }?>  					      
					</tbody>
				  </table>
				
				</div>
		</div>	
		</div>
			 <?php foreach ($tongtien as $row) {

			?>
		<div class="tongtien">Tổng tiền:<?php echo number_format(round(floor($row['tong']),-3)).' VNĐ';} ?> </div>
				<form method="post" action="<?php echo ARSENAL_BASE_URL;?>admin/inhoadon/in" class="form1">
				<?php foreach($chitiet->result_array() AS $row) { 							
						?>
						<input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
						<input type="hidden" name="id_kh" value="<?php echo $row['id_khachhang'];?>">
						<input type="hidden" name="ngayorder" value="<?php echo $row['ngay_order'];}?>">
						
						 <?php foreach ($tongtien as $row) {
							?>
						<input type="hidden" name="tongtien" value="<?php echo $row['tong'];}?>">	
										    						
				  	<input type="submit" value="Duyệt Đơn" name="submitduyet" class="duyet">
				 </form>