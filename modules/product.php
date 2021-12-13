<?php 
class Product extends Db{
    //Lấy Ra Tất cả sản phẩm của bảng product
    public function getAllProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM products"); 
        return $this->select($sql);
    }
    //hàm đếm kết quả trả về
    public function num_result($sql){
        $sql = self::$connection->prepare($sql);
        return count($this->select($sql));
    }
    //lấy ra sản phẩm có id truyền vào
    public function getProductById($id){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i',$id);
        return $this->select($sql);
    }
    //lấy ra sản phẩm tất cả sản phẩm theo số lượng truyền vào
    public function getAllProductByNum($star,$num){
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id ASC LIMIT $star,$num");
        return $this->select($sql);
    }
    //lấy ra sản phẩm hot của bảng products theo số lượng truyền vào
    public function getHotProductByNum($num){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE hot='1' LIMIT ?");
        $sql->bind_param('i',$num);
        return $this->select($sql);
    }
    // Lấy Sản Phẩm mới nhất
    public function getNewProductByNum($num){
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT ?");
        $sql->bind_param('i',$num);
        return $this->select($sql);
    }
    //lấy ra sản phẩm theo danh mục sản phẩm
    public function getAllProductByCate_Name($cate_name,$star,$number)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,category 
        WHERE (products.cate_id=category.cate_id AND category.cate_name=?) LIMIT $star,$number");
        $sql->bind_param('s',$cate_name);
        return $this->select($sql);
    }
    //lấy ra sản phẩm theo hãng sx
    public function getAllProductByManu_Id($manu_name)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures 
        WHERE (products.manu_id=manufactures.manu_id AND manufactures.manu_name=?)");
        $sql->bind_param('s',$manu_name);
        return $this->select($sql);
    }
    //lấy ra tất cả sản phẩm có hãng SX truyền vào và thuộc danh mục truyền vào
    public function getAllProductByCate_Name_Manu_Name($cate_name,$manu_name)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,category 
        WHERE (products.manu_id=manufactures.manu_id AND products.cate_id=category.cate_id 
        AND manufactures.manu_name=? AND category.cate_name='$cate_name') LIMIT 0,3");
        $sql->bind_param('s',$manu_name);
        return $this->select($sql);
    }
    //tìm kiếm sản phẩm khi có từ khóa tìm trong tên sản phẩm
    public function search($timkiem,$star,$num){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE name LIKE '%$timkiem%' LIMIT $star,$num");
        return $this->select($sql);
    }
    public function Star($num){
        $page = 0;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                        if(isset($page)){
                            if($page <= 1){
                                $star = 0;
                            }else{
                                $star = ($page * $num) - $num;
                            }
                        }else{
                            $star = 0;
                        }
                        return $star;
    }
    public function counPagetByNumProduct_Search($timkiem,$star,$num){
        $product = count($this->search($timkiem,$star,$num));
        $page = ceil($product/$num);
        return $page;
    }
    //lấy ra số trang
    public function counPagetByNumProduct($num,$select){
        $sql = self::$connection->prepare("SELECT * FROM $select");
        $product = count($this->select($sql));
        $page = ceil($product/$num); 
        return $page;
    }
    public function Pagination_Search($page,$num){
        ?>
        <center>
            <div aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a aria-label="Previous" href="?page=<?php if(isset($page) == 1 || isset($page) == "") echo 1 ?>">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li>
                        <a aria-label="Previous" href="?page=<?php if($page <= 1) echo 1;else echo $page - 1 ?>">
                            <span aria-hidden="true">←</span>
                        </a>
                    </li>
                    <?php 
                    for($i = 1;$i <= $num;$i++){
                ?>
                    <li class=""><a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php }?>
                    <li>
                        <a aria-label="Previous" href="?page=<?php if($page >= $num) echo $num;else echo $page + 1 ?>">
                            <span aria-hidden="true">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=<?php echo $num ?>" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </div>
        </center>
        <?php
    }
    public function Pagination($page,$num,$select){
        ?>
        <center>
            <div aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a aria-label="Previous" href="?page=<?php if(isset($page) == 1 || isset($page) == "") echo 1 ?>">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li>
                        <a aria-label="Previous" href="?page=<?php if($page <= 1) echo 1;else echo $page - 1 ?>">
                            <span aria-hidden="true">←</span>
                        </a>
                    </li>
                    <?php 
                    $product = new Product();
                    $num = $product->counPagetByNumProduct($num,$select);
                    for($i = 1;$i <= $num;$i++){
                ?>
                    <li class=""><a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php }?>
                    <li>
                        <a aria-label="Previous" href="?page=<?php if($page >= $num) echo $num;else echo $page + 1 ?>">
                            <span aria-hidden="true">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=<?php echo $num ?>" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </div>
        </center>
        <?php
    }
    public function AddProduct($img,$name_product,$price_product,$price_sale,$desc_product,$manu_product,$cate_product){
    
        $name_img_product = $_FILES[$img]['name'];
        $randum_str = str_shuffle("zxcvbnmasdfghjklqwertyuiop0123456789");
        $randum_number = random_int(0,999999999);
        $path_img = "../../../public/image/";
        $name_img_product = $randum_str.$randum_number.$_FILES[$img]['name'];
        $tmp_name_img = $_FILES[$img]['tmp_name'];
        $size_img = $_FILES[$img]['size'];
        $type_img = $_FILES[$img]['type'];
        switch ($type_img) {
            case 'image/jpg':
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
                if($size_img < 2000000){
                    move_uploaded_file($tmp_name_img,$path_img.$name_img_product);
                    $sql = "INSERT INTO products(name,price,sale,image,description,manu_id,cate_id) 
                    VALUES('$name_product','$price_product',$price_sale,'$name_img_product','$desc_product','$manu_product','$cate_product')";
                    $this->SIUD($sql);
                    header('location:index.php');
                }else{
                    $error = "Ảnh Quá Lớn! Chỉ cho phép upload ảnh dưới 2MB.";
                }
                break;
            
            default:
                $error = "Chỉ upload nhưng ảnh có đuôi là: jpg,png,gif";
                break;
        }
        if(isset($error)){
            echo $error;
        }
    
    }
    public function updateProductById($id,$img,$size_img,$name_product,$price_product,$price_sale,$desc_product,$manu_product,$cate_product){
        if($size_img == 0){
            $sql = "UPDATE products SET name='$name_product',price='$price_product',description='$desc_product',sale='$price_sale'
            ,manu_id='$manu_product',cate_id='$cate_product' WHERE id='$id'";
            $this->SIUD($sql);
            header('location:index.php');
        }
        else{
            $name_img_product = $_FILES[$img]['name'];
            $randum_str = str_shuffle("zxcvbnmasdfghjklqwertyuiop0123456789");
            $randum_number = random_int(0,999999999);
            $path_img = "../../../public/image/";
            $name_img_product = $randum_str.$randum_number.$_FILES[$img]['name'];
            $tmp_name_img = $_FILES[$img]['tmp_name'];
            $size_img = $_FILES[$img]['size'];
            $type_img = $_FILES[$img]['type'];
            switch ($type_img) {
                case 'image/jpg':
                case 'image/png':
                case 'image/gif':
                case 'image/jpeg':
                    if($size_img < 2000000){
                        move_uploaded_file($tmp_name_img,$path_img.$name_img_product);
                        $sql = "UPDATE products SET name='$name_product',price='$price_product',description='$desc_product',sale='$price_sale'
                        ,manu_id='$manu_product',cate_id='$cate_product',image='$name_img_product' WHERE id='$id'";
                        $this->SIUD($sql);
                        header('location:index.php');
                    }else{
                        $error = "Ảnh Quá Lớn! Chỉ cho phép upload ảnh dưới 2MB.";
                    }
                    break;
                
                default:
                    $error = "Chỉ upload nhưng ảnh có đuôi là: jpg,png,gif";
                    break;
            }
            if(isset($error)){
                echo $error;
            }
        }
    }
    
}
?>