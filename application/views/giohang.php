<!DOCTYPE html>
<html>
<head>
	<title> Giỏ Hàng</title>

	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Slider Banner, CSS3 Carousel" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="public/template/front-end/engine1/giamgia.css" />
	<script type="text/javascript" src="public/template/front-end/engine1/jquery.js"></script>
	<script type="text/javascript">
$(function(){
$(window).scroll(function () {
if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
else $('#goTop').fadeOut();
});
$('#goTop').click(function () {
$('body,html').animate({scrollTop: 0}, 'slow');
});
});
</script>

</head>
<body>  
<header>
		
		<div class="b_top">
			<img src="public/template/front-end/image/b_top.png" title="foodie shop" width="1341px" height="150px">
		</div>
	</header>
	<nav>
		<div class="logo">
			<img src="public/template/front-end/image/logo.png" title="foodie shop">
		</div>
		<div class="menu">
	<ul>
				<li><a href="<?php echo ARSENAL_BASE_URL;?>trangchu"> Trang chủ </a></li>
				<li><a href="<?php echo ARSENAL_BASE_URL;?>sanpham/giamgia"> Giảm giá</a></li>
				<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe">Liên hệ</a></li>
				<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/huongdanmuahang"> Hướng dẫn mua hàng</a></li>
				<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/banggiavanchuyen"> Bảng giá vận chuyển</a></li>
			</ul>
		</div>
		<div class="search">
			<form action="<?php echo ARSENAL_BASE_URL;?>timkiem/search" method="get">
				<input type="text" name="txt_search" placeholder="Tìm sản phẩm" size="20px">
				<input type="submit" value="Tìm" class="btn_s"> <!--<img src="public/template/front-end/image/search.png" class="img_search">-->
			</form>
		</div>
	</nav>
	<div class="category">
		
		<ul>
		<?php
			foreach ($category->result_array() as $row) {
		 ?>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>danhmuc/hienthi/<?php echo $row['tendanhmuc_kytu'];?>">&nbsp;&nbsp;<?php echo "     ".$row['tentheloai'];?></a></li>	
			<?php }?>			
		</ul>
		
	</div>
	<div class="category_head">
		<img src="public/template/front-end/image/br_category.png">
	</div>
	<p class="category_text">Danh Mục</p>
	<div class="category_left">
		<img src="public/template/front-end/image/category_left.png">
	</div>
	<h3>GIỎ HÀNG CỦA BẠN</h3>
	 <?php $cart_check = $this->cart->contents();
            if(empty($cart_check)) {
                echo '<div class="thongbao">'.'Giỏ hàng của bạn chưa có sản phẩm nào !'.'</div>';
            }else{ ?> 
	<?php echo form_open();?>
		<table cellpadding="6" cellspacing="1" style="width:60%" border="0">

<tr>
  <th></th>
  <th>Số lượng</th>
  <th>Tên sản phẩm</th>
  <th style="text-align:right">Giá</th>
  <th style="text-align:right">Tổng tiền</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	 <td style="text-align:center"><a href="<?php echo ARSENAL_BASE_URL;?>giohang/delete/<?php echo $items['rowid'];?>">Xóa</a></td>
	  <td><?php echo form_input(array('name' => 'qty1'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	 
	  <td style="text-align:right"><?php echo $this->cart->format_number(round(floor($items['price']),-3)) .' '.' VNĐ'; ?></td>
	  <td style="text-align:right"><?php echo $this->cart->format_number(round(floor($items['subtotal']),-3)) .' '.' VNĐ'; ?></td>
	  
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="3"> </td>
  <td class="right"><strong>Tổng đơn hàng</strong></td>
  <td class="right"><?php echo $this->cart->format_number(round(floor($this->cart->total()),-3)).' '.' VNĐ'; ?></td>
</tr>

</table>

<p class="xoa"><a href="<?php echo ARSENAL_BASE_URL;?>giohang/deletegiohang/<?php echo $items['id'];?>">Xóa giỏ hàng</a></p>
<p class="thanhtoan"><a href="<?php echo ARSENAL_BASE_URL;?>giohang/thanhtoan">Thanh toán</a></p>
	
<?php echo form_close();?>




<?php }?>


	<div class="footer">
	<div class="addr">
		<p>Địa Chỉ 1 :Học viện tài chính - Đức Thắng - Bắc Từ Liêm - Hà Nội.<br>
			Địa Chỉ 2 : ĐH Bách Khoa Hà Nội.<br>
		Số điện thoại: 01667193080 - (04) 38959050.<br>
		Email: shoparsenal@gmail.com.
		</p>
	</div>
	<div class="info">
		<p class="info_text">Về Chúng Tôi</p>
		<ul>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe">Liên hệ</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/huongdanmuahang">Hướng dẫn mua hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/huongdanthanhtoan">Hướng dẫn thanh toán</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/chinhsachdoitra">Chính sách đổi trả hàng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe/banggiavanchuyen">Bảng giá vận chuyển</a></li>
		</ul>
	</div>
	<div class="friend">
		<p class="friend_text"> Mạng Xã Hội
		<ul>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/twitter.png" title="twitter"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/facebook.png" title="Facebook"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/rss.png" title="Rss"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/email.png" title="Email"></a></li>
		</ul>
		<p class="friend_subs">Tìm kiếm mua hàng!</p>
		<div class="tkmh"><form action="<?php echo ARSENAL_BASE_URL;?>timkiem/search" method="get">
				<input type="text" name="txt_search" placeholder="Tìm sản phẩm" size="20px">
				<input type="submit" value="Tìm" class="btn_s2"> <!--<img src="public/template/front-end/image/search.png" class="img_search">-->
			</form></div>
	</div>
	<div class="security">
		<div class="secu_img"><img src="public/template/front-end/image/security.png">
		<p class="secu_text"> Mua hàng trực tuyến an toàn và bảo mật</p>
		<div class="secu_order"><img src="public/template/front-end/image/order.png"></div>
		<p class="order_text">Giao hàng tận nơi, mọi nơi</p>
		<div class="secu_top" id="goTop"><img src="public/template/front-end/image/top.png"></div>
	</div>
	<p class="copyright"> &copy;copyRight2016 </p>
	 </div>