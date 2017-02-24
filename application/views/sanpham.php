<!DOCTYPE html>
<html>
<head>
	<title> <?php foreach ($chitietsp->result_array() as $row) {
		?>
		<?php echo $row['tensanpham'];}?></title>

	<base href="<?php echo ARSENAL_BASE_URL; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Slider Banner, CSS3 Carousel" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="public/template/front-end/engine1/sanpham.css" />
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
				<input type="text" name="txt_search" placeholder="Tìm kiếm sản phẩm, mọi thứ" size="40px">
				<input type="submit" value="Tìm kiếm" class="btn_s"> <!--<img src="public/template/front-end/image/search.png" class="img_search">-->
			</form>
		</div>
	</nav>
	<div class="banner">
		<div class="img_banner">
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

							<!main>
	<div class="main">
		<?php foreach ($danhmuc->result_array() as $row) {
		?>
		<p class="detail_text">Danh Mục &nbsp;>> <?php echo $row['tentheloai'];}?> &nbsp >>
		<?php foreach ($chitietsp->result_array() as $row) {  ?>
		
		<?php
				$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   				$anhminhhoa = "<img src='$anhminhhoa', height='348px', width='350px' class='small'>";?>

   				<?php 
   				$anhchitiet = 'public/template/back-end/image/sanpham/'.$row['anhchitiet'];
   				$anhchitiet = "<img src='$anhchitiet', height='240px', width='221px' class='img'>";
   				if($row['khuyenmai'] > 0){
   					$gia = $row['gia'];
   					$sale = ($row['gia']/100) * $row['khuyenmai'];
	   				$aftersale =  $gia - $sale;
   				}else{
	   				
	   			}
			echo $row['tensanpham']; ?>
		</p>
		<div class="detail_main">
			<div class="detai_img"><?php echo $anhminhhoa;?></div>
			<div class="detail_info">
				<div class="product_name"> <?php echo $row['tensanpham'];?></div>
				<?php 
				if($row['khuyenmai'] > 0){
				echo '<div class="product_price2">'.'Giá cũ: '.number_format($row['gia']).' '. 'VNĐ'.'</div>';
				echo '<div class="product_price">'. 'Sale còn: '. number_format(round(floor($aftersale),-3)) .' '.' VNĐ'.'</div>';
				}else{
					echo '<div class="product_price">'.'Giá: '.number_format($row['gia']).' VNĐ'.'</div>';
					} ?>

				<div class="product_baohanh"><?php echo 'Bảo Hành: '.$row['baohanh']." Tháng";?></div>
				<div class="product_sale"><?php echo 'Khuyến Mãi: '.$row['khuyenmai']."%";?></div>
				<div class="product_tinhtrang"><?php echo 'Tình Trạng: '.$row['tinhtrang']." Hàng";?></div>
				<div class="product_luotxem"><?php echo 'Lượt Xem: '.$row['luotxem'];?></div>
				<p class="muahang"><a href="<?php echo ARSENAL_BASE_URL;?>giohang/add/<?php echo $row['id_sanpham'];}?>">Mua Hàng</a></p>
			</div>
		</div>

							<!-SẢN PHẨM LIÊN QUAN->
		<?php foreach ($chitietsp->result_array() as $row) {  
				$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhchitiet'];
   				$anhminhhoa = "<img src='$anhminhhoa', height='460px', width='500px' class='img'>";
   				$anhchitiet = 'public/template/back-end/image/sanpham/'.$row['anhchitiet2'];
   				$anhchitiet = "<img src='$anhchitiet', height='460px', width='500px' class='img'>";
   				?>

   							<!ảnh khác>
		<div class="product_main">
			<div class="product_main_text1">Các Hình ảnh khác của<?php echo ' '.$row['tensanpham'];?> </div>
			<div class="img1"><?php echo $anhminhhoa;?></div>
			<div class="img1"><?php echo $anhchitiet;}?></div>
		</div>
		<p class="product_same_text"> Sản phẩm liên quan</p>
		<div class="product_same">
		<?php foreach ($sanphamlienquan->result_array() as $row) { 
				$anhminhhoa = 'public/template/back-end/image/sanpham/'.$row['anhbia'];
   				$anhminhhoa = "<img src='$anhminhhoa', height='250px', width='221px'>";
			?>
			<div class="product_main2">
				<div class="product_main_img" style="min-height: 200px;"><?php echo $anhminhhoa;?></div>
				<div class="product_main_text"><?php echo $row['tensanpham'];?></div>

				<?php if($row['khuyenmai'] == 0){
						echo '<p class="popular_product_price"> Giá: <p class="p_product_price">'. number_format($row['gia']).' VNĐ'.'</p></p>';}
						else{
							echo '<p class="popular_product_price2"> Giá: <p class="p_product_price2">'. number_format($row['gia']).' VNĐ'.'</p></p>';
						}
						?>	
				<p class="view">Lượt xem:</p>
				<p class="view_number"><?php echo $row['luotxem']?></p>
				<?php 
					if($row['khuyenmai'] == 0){
						echo " ";
					}else{
						$gia = $row['gia'];
   						$sale = ($row['gia']/100) * $row['khuyenmai'];
	   					$aftersale =  $gia - $sale;
	   					 echo '<div class="aftersale">'.'Sale: '.number_format($aftersale).' VNĐ'.'</div>';
						 echo '<div class="box"></div>'.'<div class="sale">' . '-'.$row['khuyenmai'].'%'.'</div>';}?>
				<p class="detail"><a href="<?php echo ARSENAL_BASE_URL;?>sanpham/hienthi/<?php echo $row['tendanhmuc_kytu'];?>/<?php echo $row['id_sanpham']?>">Chi Tiết</a></p>
			</div><?php }?>
		</div>
		
		</div>
	</div>
	<hr class="hr">	
	<div class="paging"><?php //echo $links;?></div>

		<!-footer->
		<footer>
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
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe">Điều Khoản sử dụng</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe">Chính sách bảo hành</a></li>
			<li><a href="<?php echo ARSENAL_BASE_URL;?>lienhe">Chính sách bảo mật thông tin</a></li>
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
	 </footer>