<?php
		if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
 
<html>

<head>
	<title>Quản lý Nhân viên giao hàng</title>
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
	<div class="main">
		
<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">DANH SÁCH NHÂN VIÊN GIAO HÀNG				  
				  </h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					        <th>Id</th>							
							<th>Tên Nhân viên</th>
							<th>Giới tính</th>
							<th>Ngày sinh</th>
							<th>Số điện thoại</th>
							<th>Chứng minh thư</th>
							<th>Địa chỉ</th>
							<th colspan="2"><a href="<?php echo  ARSENAL_BASE_URL;?>admin/qlnhanvien/themnhanvien"><img src="public/template/back-end/image/them1.jpg" title="Thêm Mới"></a></th>
					    </tr>
					</thead>
					<?php foreach($nhanvien->result_array() AS $row) { ?>
					<tbody>
					    <tr>
					   
					    	<?php $id = $row['id'];?>
					    	 <td><?php echo $row['id'];?></td>
					        <td><?php echo $row['tennhanvien'];?></td>
					        <td><?php echo $row['gioitinh'];?></td>
							<td><?php echo $row['ngaysinh'];?></td>							
							<td><?php echo $row['sodienthoai'];?></td>
							<td><?php echo $row['chungminhthu'];?></td>
							<td><?php echo $row['diachi']; ?></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlnhanvien/suanhanvien/<?php echo $id;?>"><img src="public/template/back-end/image/sua.jpg" title="Sửa"></a></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlnhanvien/xoanhanvien/<?php echo $id;?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					    </tr><?php }?>  					      
					</tbody>
					
				  </table>
				</div>
		</div>	
	</div>