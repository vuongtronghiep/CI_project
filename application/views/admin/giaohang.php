<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Quản Lý Giao hàng</title>
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
			<li ><a href="<?php echo ARSENAL_BASE_URL;?>admin/home">Trang chủ</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham">Sản Phẩm</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldanhmuc">Danh Mục</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldonhang">Đơn hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qluser">Khách hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlnhanvien">Nhân viên giao hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlgiaohang">Giao hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlthongke">Thống kê</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>admin/qladmin">Admin</a></li>
		</ul>
	</nav>
	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/timsanpham" method="get" class="tk">
		<input type="radio" name="giatri" value="tensanpham" checked="">Tên sản phẩm &nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="theloai">Thể Loại&nbsp;&nbsp;
		<input type="text" name="txt_search" placeholder="Tìm kiếm sản phẩm, mọi thứ" size="50px">
		 <input type="submit" name="subtimkiem" value="Tìm kiếm">
	</form>
		<div class="main">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">DANH SÁCH GIAO HÀNG 
				  
				  </h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					        <th>Mã Giao hàng</th>
					        <th>Mã nhân viên giao hàng</th>							
							<th>Mã đơn hàng 1</th>
							<th>Mã đơn hàng 2</th>
							<th>Mã đơn hàng 3</th>
							<th>Ngày giao hàng</th>							
							<th colspan="2"><a href="<?php echo  ARSENAL_BASE_URL;?>admin/qlgiạohang/themgiaohang"><img src="public/template/back-end/image/them1.jpg" title="Thêm Mới"></a></th>
					    </tr>
					</thead>
									      
					</tbody>
					
				  </table>
				</div>
		</div>	
		<div class="phantrang">
		 <?php //echo $links; ?>	
		</div>
						