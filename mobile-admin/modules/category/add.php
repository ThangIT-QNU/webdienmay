<base href="../../">
<?php
$open = "category";
$title = "Thêm Danh Mục";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
if(isset($_GET['cate_name'])){
    $cate_name = $_GET['cate_name'];
    $cate = new Category();
    $num = count($cate->getCateByName($cate_name));
    if($num > 0){
        $error = "Tên Danh Mục Đã Tồn Tại";
    }else{
        $sql = "INSERT INTO category(cate_name) VALUES('$cate_name')";
        $db = new Db();
        $db->SIUD($sql);
        header('location:index.php');
    }
}
require '../../layout/header.php';
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $title ?>
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
        <form action="" method="get">
            <label>Tên Danh Mục</label>
            <input required class="form-control" type="text" name="cate_name">
            <div class="error">
                <?php if(isset($error)) echo $error.'<br>';else echo "<br>" ?>  
            </div>
            <input class="btn btn-info" type="submit" value="Thêm Danh Mục">
        </form>
    </div>
</div>
<?php
require '../../layout/footer.php';