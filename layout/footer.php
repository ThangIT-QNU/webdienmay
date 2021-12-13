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
<footer>
    <div class="bot-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <center style="margin-bottom: 20px;">
                        <h3 style="margin-top:0px!important">Thông Tin Nhóm 1</h3>
                    </center>
                </div>
            </div>
            
        </div>
    </div>
</footer>
<script src="public/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       
     $('#top').click(function() {
       $('html, body').animate({scrollTop:0},500);
     });
   });
</script>
</body>

</html>