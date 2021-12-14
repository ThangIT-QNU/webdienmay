<div clss="content">
    <div class="container">
        <div class="value_new_product">
            <div class="content">
                <div class="all-product">
                    <div class="col-md-12">
                        <div class="san-pham">
                            <span>Tất Cả Sản Phẩm</span>
                        </div>
                    </div>
                    <?php 
                        $product = new Product(); 
                        $newProduct = $product->getAllProductByNum(0,8);
                        foreach ($newProduct as $key => $value_new_product) {
                    ?>
                    <div class="col-xs-6 col-sm-4 col-md-3">

                        <div class="product">
                            <center>
                                <div class="product-image">
                                    <a href="detail.php?id_product=<?php echo $value_new_product['id'] ?>"><img
                                            style="width:100%"
                                            src="public/image/<?php echo $value_new_product['image'] ?>"
                                            alt="image-product"></a>
                                </div>
                            </center>
                            <div class="info-product">
                                <div class="product-name">
                                    <a href="detail.php?id_product=<?php echo $value_new_product['id'] ?>">
                                        <b>
                                            <marquee><?php echo $value_new_product['name'] ?></marquee>
                                        </b>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <div><b>Giá Bán:</b> <s><?php echo $value_new_product['price'] ?>đ</s></div>
                                    <div><b>Giá KM:</b> <b
                                            style="color: #FF5622;"><?php echo $value_new_product['sale'] ?>đ</b></div>
                                </div>
                                <center>
                                    <div class="product-btn">
                                        <a class="btn btn-info btn-sm"
                                            href="cart.php?id_product=<?php echo $value_new_product['id'] ?>">Mua
                                            Hàng</a>
                                    </div>
                                </center>
                            </div>
                        </div>

                    </div>
                    <?php  
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-distributed">
    <div class="footer-left">
        <h3>Phát Triển Phần Mềm <br> Mã Nguồn Mở<span> Nhóm 6</span></h3>
        <p class="footer-links">
            <a href="#">Trang Chủ</a>&ensp;
            <a href="#">Giới Thiệu</a>&ensp;
            <a href="#">Hỗ Trợ</a>&ensp;
            <a href="#">Liên Hệ</a>
        <p class="footer-company-name">Copyright &copy; 2020 Apple. All rights reserved. </p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>65 Ngô Mây</span> TP.Quy Nhơn - Bình Định.</p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <p>0356 536 663</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:mtpthang829@gmail.com">mtpthang829@gmail.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>Về Công Ty</span>
            Chuyên Kinh Doanh Các Mặt Hàng Điện Thoại, Lap Top, Máy Tính Bảng Và Một Số Phụ Kiện Giá
            Rẻ, Uy Tín, Chất Lượng.
        </p>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
        </div>

</footer>

<script src="public/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/4ff1ce10f2.js" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
});
</script>
</body>

</html>