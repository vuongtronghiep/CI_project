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
    <link rel="stylesheet" href="public/template/back-end/css/user.css" />
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
	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qluser/timkiem" method="get" class="tk">
		<input type="radio" name="giatri" value="tenkhachhang" checked="">Tên Khách hàng &nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="email">Email&nbsp;&nbsp;
		<input type="radio" name="giatri" value="diachi">Địa chỉ&nbsp;&nbsp;
		<input type="radio" name="giatri" value="ngaytao">Ngày tạo&nbsp;&nbsp;
		<input type="text" name="txt_search" placeholder="Tìm kiếm khách hàng, mọi thứ" size="50px">
		 <input type="submit" name="subtimkiem" value="Tìm kiếm">
	</form>
	<div class="main">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">DANH SÁCH TÀI KHOẢN THÀNH VIÊN</h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					    	<th>Mã</th>	
					        <th>Họ và Tên</th>							
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Ngày Tạo</th>
						
					    </tr>
					</thead>
					<?php foreach($user->result_array() AS $row) { ?>
					<tbody>
					    <tr>
					        <td><?php echo $row['id'];?></td>
							<td><?php echo $row['hoten'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['dienthoai'];?></td>
							<td><?php echo $row['diachi'];?></td>
							<td><?php echo $row['ngay_tao'];?></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qluser/xoathanhvien/<?php echo  $row['id'];?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					    </tr><?php }?>  					      
					</tbody>
					
				  </table>

				</div>
				<div class="phantrang">
				
					<?php echo  $links; ?>				
		</div>
	</div>	


	</body>
	</html>