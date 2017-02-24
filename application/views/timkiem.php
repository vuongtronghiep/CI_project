<!DOCTYPE html>
<html>
<head>
	<title> Kết quả tìm kiếm</title>

	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Slider Banner, CSS3 Carousel" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="public/template/front-end/engine1/timkiem.css" />
	<script type="text/javascript" src="public/template/front-end/engine1/jquery.js"></script>
	<script type="text/javascript" src="http://nl-bloggervn-data.googlecode.com/files/jquery.min.js"></script>
	<script type="text/javascript" src="http://nl-bloggervn-data.googlecode.com/files/jquery.magnifier.js"></script>
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
	<div class="banner">
		<div class="img_banner">
			<div id="wowslider-container1">
				<div class="ws_images"><ul>
					<?php foreach ($slider->result_array() as $row) {
						$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   						$anhminhhoa = "<img src='$anhminhhoa', height='360px', width='960px'  >";
					?>
					<li><a href="<?php echo ARSENAL_BASE_URL;?>sanpham/hienthi/<?php echo $row['tendanhmuc_kytu'];?>/<?php echo $row['id_sanpham'];?>" title="ao_arsenal_puma_2014_2015_lugi_sport_1"><?php echo $anhminhhoa;?></a></li>
						<?php }?>
					</ul></div>
					<div class="ws_bullets"><div>
					<?php foreach ($slider->result_array() as $row) {
						$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   						$anhminhhoa = "<img src='$anhminhhoa', height='360px', width='960px'class='magnify' >";
					?>
					<a href="<?php echo ARSENAL_BASE_URL;?>sanpham/hienthi/<?php echo $row['tendanhmuc_kytu'];?>/<?php echo $row['id_sanpham'];?>" title="ao_arsenal_puma_2014_2015_lugi_sport_1"><?php echo $anhminhhoa;?></a>
						<?php }?>
			</div></div>
		<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="public/template/front-end/engine1/wowslider.js"></script>
	<script type="text/javascript" src="public/template/front-end/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->	
	<!-- End WOWSlider.com BODY section -->
		</div>
		
	</div>
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

										<! product_review->
	<div class="product_review">
		<div class="review_img"><img src="public/template/front-end/image/muctieu.png"></div>
		<p class="review_text"> Sản phẩm nổi bật</p>
		<?php foreach ($sanphamnoibat->result_array() as $row) {
			$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   			$anhminhhoa = "<img src='$anhminhhoa', height='60px', width='60px' >";
		?>
		<div class="review_product">
			<div class="review_product_product"><a href="<?php echo ARSENAL_BASE_URL;?>sanpham/hienthi/<?php echo $row['tendanhmuc_kytu'];?>/<?php echo $row['id_sanpham']?>"><?php ECHO $anhminhhoa;?></a></div>
			<p class="review_product_text"><?php echo $row['tensanpham']?>.</p>
			<p class="review_product_date"><i><?php  if($row['khuyenmai'] == 0){
						echo 'Giá: '.number_format($row['gia']).' VNĐ';
					}else{
						$gia = $row['gia'];
   						$sale = ($row['gia']/100) * $row['khuyenmai'];
	   					$aftersale =  $gia - $sale;
	   					echo 'Giá: '.number_format(round(floor($aftersale),-3)).' VNĐ';
	   				}?></i></p>
	   		<p class="luotxem"><i><?php echo 'View: '. $row['luotxem'];?></i></p>
		</div>
		<hr>
		<?php }?>
		
	</div>
	<div class="payment">
		<div class="payment_img"><img src="public/template/front-end/image/muctieu.png"></div>
		<p class="payment_text"> Payment Methods</p>
		<div class="payment_method"><a href="#"><img src="public/template/front-end/image/payment.png"></a></div>
	</div>

				<!main>
	<div class="main">
		<p class="sale_text"> Kết quả tìm kiếm </p>
	<?php foreach ($search->result_array() as $row) { 
				$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   				$anhminhhoa = "<img src='$anhminhhoa', height='250px', width='221px'>";
			?>
		<div class="product_main2">
			<div id="details_img"class="product_main_img"><?php echo $anhminhhoa;?></div>
			<div class="product_main_text"><?php echo $row['tensanpham'];?></div>
			<?php if($row['khuyenmai'] == 0){
						echo '<p class="popular_product_price4"> Giá: <p class="p_product_price4">'. number_format($row['gia']).' VNĐ'.'</p></p>';}
						else{
							echo '<p class="popular_product_price3"> Giá: <p class="p_product_price3">'. number_format($row['gia']).' VNĐ'.'</p></p>';
						}
						?>	
				<a href="<?php echo ARSENAL_BASE_URL;?>sanpham/hienthi/<?php echo $row['tendanhmuc_kytu'];?>/<?php echo $row['id_sanpham']?>"><p class="buy_now">Chi Tiết </p></a>	
				<?php 
					if($row['khuyenmai'] == 0){
						echo " ";
					}else{
						$gia = $row['gia'];
   						$sale = $row['gia']/$row['khuyenmai'];
	   					$aftersale =  $gia - $sale;
	   					 echo '<div class="aftersale1">'.'Sale: '.number_format(round(floor($aftersale),-3)).' VNĐ'.'</div>';
						 echo '<div class="box"></div>'.'<div class="sale">' . '-'.$row['khuyenmai'].'%'.'</div>';}?>
						 <div class="popular_heart"><?php echo "Lượt Xem: ". $row['luotxem'];?></div>
		</div><?php }?>
	</div>

	<footer>
	<div class="info">
		<p class="info_text">Infomation</p>
		<ul>
			<li><a href="#">My Account</a></li>
			<li><a href="#">Rewards</a></li>
			<li><a href="#">Terms & Conditions</a></li>
			<li><a href="#">Buying Guide</a></li>
			<li><a href="#">FAQ</a></li>
		</ul>
	</div>
	<div class="friend">
		<p class="friend_text"> Let's be Friends
		<ul>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/twitter.png" title="twitter"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/facebook.png" title="Facebook"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/rss.png" title="Rss"></a></li>
			<li><a href="https://www.facebook.com/hiep.ken.50"> <img src="public/template/front-end/image/email.png" title="Email"></a></li>
		</ul>
		<p class="friend_subs"> Subscribe </p>
		<p class="friend_get"> Get free product updates & specials!</p>
		<form action="#" method="" class="friend_form">
			<input type="text" placeholder="Enter Email">
			<input type="submit" value="SUBMIT" class="submit_fr">
		</form>
	</div>
	<div class="security">
		<div class="secu_img"><img src="public/template/front-end/image/security.png">
		<p class="secu_text"> Shop online with us safely & security</p>
		<div class="secu_order"><img src="public/template/front-end/image/order.png"></div>
		<p class="order_text">We ship your orders anywhere</p>
		<div class="secu_top" id="goTop"><img src="public/template/front-end/image/top.png"></div>
	</div>
	<p class="copyright"> &copy;2011 Foodie Shop - Terms - Privacy Policy - Designed by Kenlily</p>
	 </footer>