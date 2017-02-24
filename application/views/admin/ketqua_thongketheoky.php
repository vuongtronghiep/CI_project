<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Kết quả thống kê</title>
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
<div class="main2">
	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke/thongketheoky" method="post">

		 Từ Ngày: <input type="date" name="from" value="<?php echo $from;?>"> &nbsp;&nbsp;Đến ngày :<input type="date" name="to" value="<?php echo $to;?>"><br><br>

		
		Số đơn hàng được đặt :&nbsp; &nbsp; &nbsp;<input type="text" name="dat" value="<?php echo $donhangduocdat?>" readonly><br><br>
		Số đơn hàng được duyệt :&nbsp; <input type="text" name="duyet" value="<?php echo $donhangduocduyet?>" readonly><br><br>

		<?php foreach($sanphamduocdat as $row){?>
		Số sản phẩm được đặt :&nbsp; &nbsp;  <input type="text" name="sanpham" value="<?php echo $row['soluong'];}?>" readonly><br><br>

		
		Số Khách hàng đặt :&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <input type="text" name="khachhang" value="<?php echo $khachhangdat?>" readonly><br><br>

		<?php foreach($tongtien as $row){?>
		Tổng tiền : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<input type="text" name="" value="<?php echo number_format(round(floor($row['tong']),-3)).' VNĐ';?>" readonly><input type="hidden" name="tiendat" value="<?php echo $row['tong'];}?>"><br><br>

		<?php foreach($tongduyet as $row){?>
		Tổng tiền trên số hóa đơn đã duyệt: &nbsp;  &nbsp; &nbsp;<input type="text" name="" value="<?php echo number_format(round(floor($row['tong']),-3)).' VNĐ';?>" readonly><input type="hidden" name="tienduyet" value="<?php echo $row['tong'];}?>"><br><br>
		<input type="Submit" name="thongke" value="Thống kê">&nbsp;  &nbsp; &nbsp;<input type="Submit" name="luu" value="Lưu Thống kê">
	</form>
	</div>