<base href="../../">
<?php
$open = "manufacture";
$title = "Thêm Hãng Sản Xuất";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/manufactures.php';


if(isset($_GET['manu_name'])){
    $manu_name = $_GET['manu_name'];
    $manu = new Mamufactures();
    $num = count($manu->getManuByName($manu_name));
    if($num > 0){
        $error = "Tên Danh Mục Đã Tồn Tại";
    }else{
        $sql = "INSERT INTO manufactures(manu_name) VALUES('$manu_name')";
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
            <label>Tên Hãng Sản Xuất</label>
            <input required class="form-control" type="text" name="manu_name"><br>
            <div class="erorr">
                <?php if(isset($error)) echo $error.'<br>'; else echo '<br>'?>
            </div>
            <input class="btn btn-info" type="submit" value="Thêm Danh Mục">
        </form>
    </div>
</div>
<?php
require '../../layout/footer.php';