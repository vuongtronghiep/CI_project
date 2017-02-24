<!DOCTYPE html>
<html>
<head>
    <title> Thanh toán</title>

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


<body>
<?php
    $grand_total = 0;
    if ($cart = $this->cart->contents()):
        foreach ($cart as $item):
            $grand_total = $grand_total + $item['subtotal'];
        endforeach;
    endif;
?>
    <section>
        <div id="bill_info">            
          <form name="billing" method="post" action="<?php echo base_url('giohang/save_order'); ?>">
                <input type="hidden" name="command"/>
                <div align="center">
                    <h1 align="center">Thông tin thanh toán</h1>
                    <table border="0" cellpadding="2px" class="table">
                        <tbody>
                            <tr><td>Tổng tiền:</td><td><strong style="color: black; padding-left: 10px;"> <?php echo number_format($grand_total); ?> vnđ</strong></td></tr>
                            <tr><td>Họ và Tên:</td><td><input type="text" name="name" required=""/></td></tr>
                            <tr><td>Email:</td><td><input type="text" name="email" required=""/></td></tr>
                            <tr><td>Điện thoại:</td><td><input type="text" name="phone" required=""/></td></tr>
                            <tr><td>Địa chỉ:</td><td><textarea name="address" cols="35" rows="5"  required=""></textarea></td></tr>
                            <tr>
                                <td><a class="fg-button teal" id="back" href="<?php echo ARSENAL_BASE_URL;?>trangchu">Mua tiếp</a>                            </td>
                                <td><input class="fg-button teal" type="submit" value="Gửi thông tin"/></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </form>
        </div>        
    </section>
</body> 