<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Quản Trị Website ShopArsenal</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
  	<link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/template/back-end/css/bootstrap/css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="jquery/jquery-1.11.2.min.js"/></script>
    <link rel="stylesheet" href="public/template/back-end/css/danhmuc.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<header>
		 <h4>HỆ THỐNG QUẢN TRỊ WEBSITE ARSENAL SHOP KENLILY</h4>
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
	<div class="left"></div>
	<div class="shop-right"></div>
<p class="text1">THÊM DANH MỤC</p>
 <div class="main">
 	
 	<form action="" method="post">
 		Tên danh mục: <input type="text" placeholder="Danh mục" name="danhmuc"><?php echo form_error('danhmuc')?></br>
 		Ký Tự:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="kytu"  placeholder="viết không dấu, khoảng trắng bằng _"><?php echo form_error('kytu')?></br>
 						<input type="submit" value="Thêm mới" name="subdanhmuc" class="submit_dm">
 	</form>	
 </div>
 </body>
</html>