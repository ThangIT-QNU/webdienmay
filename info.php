<?php
require 'layout/autoload.php';

require 'layout/header.php';
?>
<div class="row">
    <div class="san-pham">
        <center><span>Giới Thiệu</span></center>
    </div>
    <div class="col-md-4">
        <div class="product" style="height: 335px">
            <div class="col-xs-12">
                <div class="product-image">
                    <center><a href="detail.php?id_product=<?php echo $value_cate_manu['id'] ?>"><img
                                style="border-radius:50%" width="100%" src="public/image/apple.jpg ?>"
                                alt="image-product"></a></center>
                </div> <br>
            </div>

            <div class="product-name">
                <center><a href="">
                        <h5>HUỲNH ĐẠI LONG</h5>
                    </a> </center>
            </div>
            <div class="mssv">
                <b>MSSV: </b> 18211TT1949
            </div>
            <div class="class">
                <b>Lớp: </b> CD18TT3
            </div>
            <div class="email">
                <b>Email: </b> huynhdailong@gmail.com
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="product" style="height: 335px">
            <div class="col-xs-12">
                <div class="product-image">
                    <center><a href="detail.php?id_product=<?php echo $value_cate_manu['id'] ?>"><img
                                style="border-radius:50%" width="100%" src="public/image/apple.jpg ?>"
                                alt="image-product"></a></center>
                </div> <br>
            </div>
            <div class="product-name">
                <center><a href="">
                        <h5>Phạm Văn Hiệu</h5>
                    </a> </center>
            </div>
            <div class="mssv">
                <b>MSSV: </b> 18211TT0435
            </div>
            <div class="class">
                <b>Lớp: </b> CD18TT3
            </div>
            <div class="email">
                <b>Email: </b> vanhieutdc6@gmail.com
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="product" style="height: 335px">
            <div class="col-xs-12">
                <div class="product-image">
                    <center><a href="detail.php?id_product=<?php echo $value_cate_manu['id'] ?>"><img
                                style="border-radius:50%" width="100%" src="public/image/apple.jpg ?>"
                                alt="image-product"></a></center>
                </div> <br>
            </div>
            <div class="product-name">
                <center><a href="">
                        <h5>Nguyễn Đức Duy</h5>
                    </a> </center>
            </div>
            <div class="mssv">
                <b>MSSV: </b> 18211TT1924
            </div>
            <div class="class">
                <b>Lớp: </b> CD18TT3
            </div>
            <div class="email">
                <b>Email: </b>nguyenducduy@gmail.com
            </div>
        </div>
    </div>
</div>
<?php
require 'layout/close.php';
require 'layout/footer.php';
?>