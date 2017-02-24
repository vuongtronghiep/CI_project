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
	<form action="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/timsanpham" method="get" class="tk">
		<input type="radio" name="giatri" value="tensanpham">Tên sản phẩm &nbsp;&nbsp;&nbsp;
		<input type="radio" name="giatri" value="theloai">Thể Loại&nbsp;&nbsp;
		<input type="text" name="txt_search" placeholder="Tìm kiếm sản phẩm, mọi thứ" size="50px">
		 <input type="submit" name="subtimkiem" value="Tìm kiếm">
	</form>
		<div class="main">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">KẾT QUẢ TÌM KIẾM	</h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					        <th>Id</th>							
							<th>Tên sản Phẩm</th>
							<th>Thể Loại</th>
							<th>Ảnh minh họa</th>
							<th>Ảnh kèm theo 1</th>
							<th>Ảnh kèm theo 2</th>
							<th>Giá</th>
							<th>Bảo hành</th>
							<th>Khuyến mãi</th>
							<th>Tình trạng</th>
							<th>Lượt xem</th>
							<th colspan="2"><a href="<?php echo  ARSENAL_BASE_URL;?>admin/qlsanpham/themsanpham"><img src="public/template/back-end/image/them1.jpg" title="Thêm Mới"></a></th>
					    </tr>
					</thead>
					<?php foreach($search->result_array() AS $row) { ?>
					<tbody>
					    <tr>
					    <?php
					    	$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   							$anhminhhoa = "<img src='$anhminhhoa', height='40', width='60' >";
   							$anhkemtheo = 'public/template/back-end/image/sanpham/'.$row['anhchitiet'];
   							$anhkemtheo = "<img src='$anhkemtheo', height='40', width='60' >";
   							$anhkemtheo1 = 'public/template/back-end/image/sanpham/'.$row['anhchitiet2'];
   							$anhkemtheo1 = "<img src='$anhkemtheo1', height='40', width='60' >";
					     ?>
					    	<?php $id = $row['id_sanpham'];?>
					        <td><?php echo $row['id_sanpham'];?></td>
							<td><?php echo $row['tensanpham'];?></td>
							<td><?php echo $row['tentheloai'];?></td>
							<td><?php echo $anhminhhoa;?></td>
							<td><?php echo $anhkemtheo;?></td>
							<td><?php echo $anhkemtheo1;?></td>
							<td><?php echo $row['gia'];?></td>
							<td><?php echo $row['baohanh'];?></td>
							<td><?php echo $row['khuyenmai'];?></td>
							<td><?php echo $row['tinhtrang']; ?></td>
							<td><?php echo $row['luotxem'];?></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/suasanpham/<?php echo $id;?>"><img src="public/template/back-end/image/sua.jpg" title="Sửa"></a></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/xoasanpham/<?php echo $id;?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					    </tr><?php }?>  					      
					</tbody>
					
				  </table>
				</div>
		</div>	
		<div class="phantrang">
		 <?php //echo $links; ?>	
		</div>
