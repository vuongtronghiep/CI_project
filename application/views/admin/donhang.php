<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Quản lý đơn hàng</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
  	<link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="jquery/jquery-1.11.2.min.js"/></script>
    <link rel="stylesheet" href="public/template/back-end/css/sanpham.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang/timkiem" method="get" class="tk1">
		<input type="radio" name="giatri" value="tenkhachhang" checked>Tên Khách hàng &nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="ngaydat">Ngày đặt hàng&nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="ngayduyet">Ngày duyệt &nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="tinhtrang">Tình trạng &nbsp;&nbsp;
		<input type="text" name="txt_search" placeholder="Tìm kiếm đơn hàng, mọi thứ" size="50px">
		 <input type="submit" name="subtimkiem" value="Tìm kiếm">
	</form>
		<div class="main">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">DANH SÁCH ĐƠN HÀNG</h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					    	<th></th>
					        <th>Order_id</th>							
							<th>Id Khách hàng</th>
							<th>Tên Khách hàng</th>
							<th>Ngày Đặt hàng</th>
							<th>Ngày Duyệt</th>
							<th>Tổng tiền</th>							
							<th>Tình Trạng đơn hàng</th>
							
					    </tr>
					</thead>
					<?php foreach($donhang->result_array() AS $row) { 							
						?>
					<tbody>
					    <tr>
					   		
					    	<?php $id = $row['order_id'];?>
					    	<td> <a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang/xemchitietdonhang/<?php echo $id;?>">Chi tiết</a></td>
					        <td><?php echo $row['order_id'];?></td>
							<td><?php echo $row['id_khachhang'];?></td>
							<td><?php echo $row['hoten'];?></td>							
							<td><?php echo $row['ngay_order'];?></td>
							<td><?php echo $row['ngayduyet'];?></td>
							<td><?php echo number_format(round(floor($row['tongtien']),-3));?></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang/chitietdonhang/<?php echo $id;?>"><?php echo $row['tinhtrang_order'];?></a></td>
							<td> <a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang/xoadonhang/<?php echo $id;?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					    </tr><?php }?>  					      
					</tbody>
					
				  </table>
				</div>
		</div>	
		<div class="phantrang">
			<?php echo  $links; ?>
		</div>
	