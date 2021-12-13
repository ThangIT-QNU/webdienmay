<base href="../../">
<?php
$open = "manufacture";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/manufactures.php';
$title = "Sửa Hãng Sản Xuất";
$manufactures = new Mamufactures();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $manu_name = $manufactures->getManuById($id);
    foreach ($manu_name as $key_manu => $value_manu) {
        $manu_name1 = $value_manu['manu_name'];
    }
}
if(isset($_POST['manu_name'])){
    $manu_name = $_POST['manu_name'];
    $num_manu = count($manufactures->getManuByName($manu_name));
    if($num_manu > 0){
        $error = "Tên hãng sản xuất đã tồn tại";
    }else{
        $db = new Db();
        $sql = "UPDATE manufactures SET manu_name='$manu_name' WHERE manu_id='$id'";
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
        <form action="" method="POST">
            <label>Tên Hãng Sản Xuất</label>
            <input required value="<?php echo $manu_name1?>" required class="form-control" type="text" name="manu_name">
            <div class="error">
            <?php if(isset($error)) echo $error ?><br>
            </div>
            <input class="btn btn-info" type="submit" value="Sửa">
        </form>
    </div>
</div>
<?php
require '../../layout/footer.php';
?>ss
