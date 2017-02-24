<?php
	$this->load->view('admin/head.html');
 ?>
 <body>
	 <form action="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/timdanhmuc" method="get" class="tk">
			<input type="text" name="txt_search" placeholder="Tìm kiếm danhmuc" size="40px">
			 <input type="submit" name="subtimkiem" value="Tìm kiếm">
		</form>
 	<div class="maindm">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"> <h5 style="font-weight:bold">KẾT QUẢ TÌM KIẾM</h5></div>

				  <!-- Table -->
				  <table class="table">
				    <thead>
					    <tr>
					        <th>Id</th>							
							<th>Tên danh mục</th>
							<th>Ký tự</th>						
							<th colspan="2"><a href="<?php echo  ARSENAL_BASE_URL;?>admin/qldanhmuc/themdanhmuc"><img src="public/template/back-end/image/them1.jpg" title="Thêm Mới"></a></th>
					    </tr>
					</thead>
					<?php foreach($search AS $row) { ?>
					<tbody>
					    <tr>
					        <td><?php echo $row['id_theloai'];?></td>
							<td><?php echo $row['tentheloai'];?></td>
							<td><?php echo $row['tendanhmuc_kytu'];?></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldanhmuc/suadanhmuc/<?php echo  $row['id_theloai'];?>"><img src="public/template/back-end/image/sua.jpg" title="Sửa"></a></td>
							<td><a href="<?php echo ARSENAL_BASE_URL;?>admin/qldanhmuc/xoadanhmuc/<?php echo  $row['id_theloai'];?>"><img src="public/template/back-end/image/xoa.jpg" title="xóa"></a></td>
					    </tr><?php }?>  					      
					</tbody>
					
				  </table>

				</div>
				<div class="phantrang">
				
					<?php //echo  $links; ?>
				
		</div>
		</div>	
 </body>