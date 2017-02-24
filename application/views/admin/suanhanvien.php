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
		
 <div class="mmain">

 	<form class="sp" action="<?php echo ARSENAL_BASE_URL;?>admin/qlnhanvien/suanhanvien" method="post" enctype="multipart/form-data">
	  <fieldset>
	    <legend>THÊM SẢN PHẨM</legend>
	    <?php foreach($nhanvien->result_array() as $row){?>

	    <p class="text">Tên nhân viên: </p><input type="text" class="spham" value="<?php echo $row['tennhanvien']?>" name="tennhanvien"> <p class="error"><?php echo form_error('tennhanvien')?></p><br> 	
	    <p class="text">Giới tính:  </p><select class="tl" name="gt">
	    									<option value="Nam">Nam</option>
						  					<option value="Nữ">Nữ</option>
				    					</select></br></br>	    					
			<p class="text">Ngày sinh: </p><input type="date" name="date" value="<?php echo $row['ngaysinh'];?>"class="gia" size="50px"><br>
			<p class="text">Số điện thoại: </p><input type="number" name="dt" value="<?php echo $row['sodienthoai'];?>"class="km" size="10px"></br><?php echo form_error('dt')?>

		<p class="text">Chứng minh thư: </p><input type="number" name="cmt" class="bia" value="<?php echo $row['chungminhthu'];?>"></br><?php echo form_error('cmt')?>
		<p class="text">Địa chỉ:</p><input type="text" name="diachi" id="userfile" value="<?php echo $row['diachi'];}?>" class="chitiet"></br><?php echo form_error('diachi')?>
		
		<input type="submit" value="Sửa" name="sua" class="them1"> 
			    
	  </fieldset>
	</form>
	
 </div>
 <div class="footthemsp"> CopyRight &copy kenlilyArsenalShop</footer>