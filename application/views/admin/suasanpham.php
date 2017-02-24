<?php
	$this->load->view('admin/head.html');
 ?>
 <div class="mmain">
 	<form class="sp" action="" method="post" enctype="multipart/form-data">
	  <fieldset>
	    <legend>SỬA SẢN PHẨM</legend>
	    <p class="text">Thể Loại: </p>  <select class="tl" name="theloai">	    									
	    									<?php foreach($a->result_array() AS $row1) { ?>
						  					<option value="<?php echo $row1['id_theloai'];?>"><?php echo $row1['tentheloai'];}?></option>
				    					</select></br>
	    	<?php foreach($sanpham->result_array() AS $row) { ?>
	    		<p stype="margin-left:500px;">Thể Loại cũ: <?php echo $row['tentheloai'];?></p>
	    <p class="text">Tên Sản Phẩm: </p><input type="text" class="spham" name="tensanpham" VALUE="<?PHP echo $row['tensanpham']; ?>"> <p class="error"><?php echo form_error('tensanpham')?></p><br> 
	   
		<p class="text">Giá: </p><input type="number" name="gia" class="gia" VALUE="<?PHP echo $row['gia']; ?>"><p class="morong"> Đồng</p><p class="error"><?php echo form_error('gia')?></p></br>
		<?php $anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   							 $anhminhhoa = "<img src='$anhminhhoa', height='70', width='90' >";?></br>
		<p class="text">Ảnh bìa </p><input type="file" id="anhbia" name="anhbia" class="chitiet"/>
			    <input type="hidden" id="update_photo_name" value='<?php echo $row['anhbia']; ?>' name="update_photo_name" />
			<div class="anh"><?php echo $anhminhhoa; ?></div>

		<p class="text">Ảnh chi tiết 1</p><input type="file" name="anhkemtheo" id="anhkemtheo" class="chitiet">
		<input type="hidden" id="anhkemtheo_2" value='<?php echo $row['anhchitiet']; ?>' name="anhkemtheo_2" />
			<div class="anhct">
			<?php $anhchitiet = 'public/template/back-end/image/sanpham/'.$row['anhchitiet'];
   							 $anhchitiet = "<img src='$anhchitiet', height='70', width='90' >";?>
   							 <?php echo $anhchitiet; ?></div>
		
		</br></br></br>

		<p class="text">Ảnh chi tiết 2</p><input type="file" name="anhkemtheo1" id="anhkemtheo1" class="chitiet">
		<input type="hidden" id="anhkemtheo_3" value='<?php echo $row['anhchitiet2']; ?>' name="anhkemtheo_3" />
			<div class="anhct">
			<?php $anhchitiet2 = 'public/template/back-end/image/sanpham/'.$row['anhchitiet2'];
   							 $anhchitiet2 = "<img src='$anhchitiet2', height='70', width='90' >";?>
   							 <?php echo $anhchitiet2; ?></div>
		
		</br>

		<p class="text">Bảo hành: </p><input type="number" name="baohanh" class="bh" VALUE="<?PHP echo $row['baohanh']; ?>"><p class="morong"> tháng</p></br>
		<p class="text">Khuyến mãi: </p><input type="number" name="km" class="km" VALUE="<?PHP echo $row['khuyenmai']; }?>"><p class="morong">%</p></br>
		<p class="text">Tình trạng: </p><select class="tl" name="tt">
	    									<option value="Còn">Còn</option>
	    									<option value="Hết">Hết</option>					  					
				    					</select></br></br></br>
		<input type="submit" value="Sửa" name="sua" class="them"> 
			     
	  </fieldset>
	</form>

 </div>
 <div class="footthemsp"> CopyRight &copy kenlilyArsenalShop</footer>