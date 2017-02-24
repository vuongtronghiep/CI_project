<!DOCTYPE html>
<?php
	//if (isset($this->session->userdata['logged_in'])) {

	//header("location: http://localhost:8080/shoparsenal/index.php/back-end/danngnhap/login");
//}
?>
<html>
<head>
<meta charset="UTF-8">
<base href="<?php echo ARSENAL_BASE_URL; ?>" />
<title>Đăng nhập vào hệ thống</title>
<link rel="stylesheet" type="text/css" href="public/template/back-end/css/dangnhap.css">

</head>

<body>
	<p><img src="public/template/back-end/image/751ae9a2c4c105d60c9f8a4af8b3f15c.jpg" width="500px" height="200px"></p>

	<form method="post" action="">
	  <fieldset>
	    <legend>ĐĂNG NHẬP VÀO HỆ THỐNG:</legend>
	    <lable><p>Tên Đăng Nhập</p> <input type="text" name="tendangnhap" value="<?php echo set_value('tendangnhap')?>" placeholder="Hãy Nhập tên đăng nhập" class="taikhoan"></lable>
	    	<?php echo form_error('tendangnhap')?>
	    
	    <lable><p>Mật Khẩu </p><input type="password" name="matkhau" value="<?php echo set_value('matkhau')?>" placeholder="Hãy Nhập mật khẩu" class="matkhau"></lable>
	    	<?php echo form_error('matkhau')?>
	    
	    <?php echo form_error('dangnhap')?>
	    <div class="submit"><input type="submit" name="dangnhap" value="Đăng Nhập" class="dangnhap"> <input type="reset" name="huy" value="Hủy" class="huy"></div><br>
	    <ul>
	    	<li><a href="#"> Về Trang chủ</a></li>

	    </ul> 
	  </fieldset>
	</form>
	<footer><p>Copy right Kenlily</p></footer>
</body>

</html>