<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Báo cáo thống kê</title>
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
	</nav><p class="text1">THỐNG KÊ</p>
<div class="main1">

	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke/thongke" method="post" class="formtk">
		Ngày : <input type="date" name="a" value=""><br><br>
		<input type="Submit" name="thongke" value="Thống kê">
	</form>

</div>

	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke/thongketheoky" method="post" class="formtk2">
		 Từ Ngày: <input type="date" name="from" value=""> &nbsp;&nbsp;Đến ngày :<input type="date" name="to" value=""><br><br>
		 		<input type="Submit" name="thongke" value="Thống kê">
	</form>
	<div class="tk_ngay">
		<div class="panel panel-default">
			<div class="panel-heading"> <h5 style="font-weight:bold">THỐNG KÊ THEO NGÀY</h5></div>
			<table class="table">
				<thead>
					<tr>
						<th>Ngày thống kê</th>							
						<th>Tổng Đơn hàng đặt</th>
						<th>Tổng Đơn hàng duyệt</th>
						<th>Số Khách hàng đặt</th>
						<th>Số sản phẩm đặt</th>
						<th>Tổng tiền hóa đơn đặt</th>
						<th>Tổng tiền hóa đơn duyệt</th>							
						<th colspan="2"></th>
					</tr>
				</thead>
						<?php foreach($tk_hangngay->result_array() AS $row) { ?>
				<tbody>
					<tr>
					<td><?php echo $row['ngay_thongke'];?></td>
					<td><?php echo $row['donhang_duocdat'];?></td>
					<td><?php echo $row['donhang_duocduyet'];?></td>
					<td><?php echo $row['sokhachhang_dat'];?></td>
					<td><?php echo $row['sanpham_duocdat'];?></td>
					<td><?php echo number_format(round(floor($row['tongtien_hoadondat']),-3)).' VNĐ'?></td>
					<td><?php echo number_format(round(floor($row['tongtien_hoadonduyet']),-3)).' VNĐ'?></td>
					<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke/xoathongke/<?php echo $row['ngay_thongke'];?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
						 </tr><?php }?>  					      
				</tbody>		
			</table>
		</div>
	</div>

	<div class="tk_ky">
		<div class="panel panel-default">
			<div class="panel-heading"> <h5 style="font-weight:bold">THỐNG KÊ THEO KỲ</h5></div>
			<table class="table">
				<thead>
					<tr>
						<th>Mã</th>
						<th> Thống kê từ Ngày</th>
						<th> Thống kê đến Ngày</th>							
						<th>Tổng Đơn hàng đặt</th>
						<th>Tổng Đơn hàng duyệt</th>
						<th>Số Khách hàng đặt</th>
						<th>Số sản phẩm đặt</th>
						<th>Tổng tiền hóa đơn đặt</th>
						<th>Tổng tiền hóa đơn duyệt</th>							
						<th></th>
					</tr>
				</thead>
						<?php foreach($tk_theoky->result_array() AS $row) { ?>
				<tbody>
					<tr>
						<td><?php echo $row['thongke_id'];?></td>
						<td><?php echo $row['thongke_tungay'];?></td>
						<td><?php echo $row['thongke_denngay'];?></td>
						<td><?php echo $row['tong_donhangdat'];?></td>
						<td><?php echo $row['tong_donhangduyet'];?></td>
						<td><?php echo $row['sokhachhang_dat'];?></td>
						<td><?php echo $row['sosanpham_dat'];?></td>
						<td><?php echo number_format(round(floor($row['tongtien_hoadondat']),-3)).' VNĐ'?></td>
						<td><?php echo number_format(round(floor($row['tongtien_hoadonduyet']),-3)).' VNĐ'?></td>
						<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke/xoathongke_theoky/<?php echo $row['thongke_id'];?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					</tr><?php }?>  					      
				</tbody>		
			</table>
		</div>
	</div>