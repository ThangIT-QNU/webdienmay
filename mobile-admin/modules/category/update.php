<base href="../../">
<?php
$title = "Sửa Danh Mục";
$open = "category";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
    $id = $_GET['id'];
    $category = new Category();
    $cate = $category->getCateById($id);
    foreach ($cate as $key_cate => $value_cate) {
        $cate_name = $value_cate['cate_name'];
    }  
if(isset($_POST['cate_name'])){
        $cate_name1 = $_POST['cate_name'];
        $category = new Category();
        $cate1 = $category->getCateByName($cate_name1);
        $num = count($cate1);
        if($num > 0){
            $error =  "Tên Danh Mục Đã Tồn Tại";
        }else{
        $sql = "UPDATE category SET cate_name='$cate_name1' WHERE cate_id='$id'";
        $db = new Db();
        $db->SIUD($sql);
        header('location:index.php');}
}
require '../../layout/header.php';
?>  
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $title;?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?php echo $title ?>
            </li>
        </ol>
    </div>
</div>
<div class="row">
     <div class="col-md-4">
        <form action="" method="POST">
            <label>Tên Danh Mục</label>
            <input required value="<?php if(isset($cate_name)) echo $cate_name ?>" required class="form-control" type="text" name="cate_name"><br>
            
            <div class="error">
            <?php if(isset($error)) echo $error ?><br>
            </div>
            <input class="btn btn-info" type="submit" value="Sửa Danh Mục">
        </form>
    </div>
</div>
<?php
require '../../layout/footer.php';