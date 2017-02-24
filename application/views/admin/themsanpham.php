<?php
	$this->load->view('admin/head.html');
 ?>
		
 <div class="mmain">

 	<form class="sp" action="<?php echo ARSENAL_BASE_URL;?>admin/qlsanpham/themsanpham" method="post" enctype="multipart/form-data">
	  <fieldset>
	    <legend>THÊM SẢN PHẨM</legend>
	    <p class="text">Tên Sản Phẩm: </p><input type="text" class="spham" name="tensanpham"> <p class="error"><?php echo form_error('tensanpham')?></p><br> 
	    <p class="text">Thể Loại: </p>  <select class="tl" name="theloai">
	    									<?php foreach($danhmuc->result_array() AS $row) { ?>
						  					<option value="<?php echo $row['id_theloai'];?>"><?php echo $row['tentheloai'];}?></option>
				    					</select></br>
		    					
			<p class="text">Giá: </p><input type="number" name="gia" class="gia"><p class="morong"> Đồng</p><p class="error"><?php echo form_error('gia')?></p></br>

			<p class="text">Khuyến mãi: </p><input type="number" name="km" class="km" size="10px"><p class="morong">%</p></br>
			
		<p class="text">Ảnh minh họa </p><input type="file" name="image" class="bia"></br>
		<p class="text">Ảnh kèm theo 1</p><input type="file" name="anhkemtheo" id="userfile" class="chitiet"></br>
		<p class="text">Ảnh kèm theo 2</p><input type="file" name="anhkemtheo2" id="userfile" class="chitiet"></br>
		<p class="text">Bảo hành: </p><input type="number" name="baohanh" class="bh"><p class="morong"> tháng</p></br>
		
		<p class="text">Tình trạng: </p><select class="tl" name="tt">
	    									<option value="Hết">Hết</option>
						  					<option value="Còn">Còn</option>
				    					</select></br></br>
		<input type="submit" value="Thêm mới" name="them" class="them1"> 
			    
	  </fieldset>
	</form>
	
 </div>
 <div class="footthemsp"> CopyRight &copy kenlilyArsenalShop</footer>