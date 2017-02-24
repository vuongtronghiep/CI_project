<?php
	if (!$this->session->userdata['logged_in']){
	header("location: http://localhost:8080/shoparsenal/admin/dangnhap/login");
	}
 ?>
<?php

	$this->load->view('admin/head.html');
 ?>
	<div class="main">
		<div class="thongtin"> Thông Tin</div>
		<div>&nbsp</div>
		<div class="panel panel-primary">
	        <div class="panel-heading">
	            <h3 class="panel-title">Thông Tin từ các Module</h3>
	        </div>
		    <div class="panel-body">
		        <table class="table">
					<thead>
					    <tr>
					        <th>Module</th>
					        <th>Nội Dung</th>
					        <th>Giá Trị</th>
					    </tr>
					</thead>
					<tbody>
					    <tr>
					        <td>Sản Phẩm</td>
					        <td>Tổng số sản phẩm</td>
					        <td> <?php echo $sanpham;	 ?></td>
					    </tr>
					    <tr>
					        <td>Danh Mục</td>
					        <td>Tổng số danh mục</td>
					        <td><?php echo $danhmuc;	 ?></td>
					    </tr>
					    <tr>
					        <td>Khách hàng</td>
					        <td>Tổng số khách hàng</td>
					        <td> <?php echo $user; ?></td>
					    </tr>
					    
					    <tr>
					        <td>Đơn hàng</td>
					        <td>Tổng số đơn hàng</td>
					        <td><?php echo $order;	 ?></td>
					    </tr>
					     <tr>
					        <td>Thống kê theo ngày</td>
					        <td>Tổng số bản thống kê theo ngày</td>
					        <td><?php echo $ngay;	 ?></td>
					    </tr>
					     <tr>
					        <td>Thống kê theo kỳ</td>
					        <td>Tổng số bản thống kê theo kỳ</td>
					        <td><?php echo $ky;	 ?></td>
					    </tr>
					     <tr>
					        <td>Admin</td>
					        <td>Tổng số tài khoản admin</td>
					        <td><?php echo $taikhoan;	 ?></td>
					    </tr>
					</tbody>
				 </table>
		    </div>
    	</div>
	</div>
	<footer> CopyRight &copy kenlilyArsenalShop</footer>
</body>
</html>