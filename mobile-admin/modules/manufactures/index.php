<base href="../../">
<?php
$open = "manufacture";
$title = "Hãng Sản Xuất";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/manufactures.php';
require '../../layout/header.php';

    ?>
    <div class="value">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $title ?> <a class="btn btn-success" href="./modules/manufactures/add.php">Thêm</a>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?php echo $title ?>
            </li>
        </ol>
    </div>
</div>
    <div class="value">
        
    </div>
    <div class="col-md-12">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-primary">
                    <th class="text-center">STT</th>
                    <th class="text-center">Name</th>                     
                    <th class="text-center">Tùy Chọn</th>                     
                </tr>
            </thead>
            <tbody>
                <?php 
                $db = new Mamufactures();
                $manu = $db->getAllManu();
                $i = 1;
                foreach ($manu as $key => $value) {
                 ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value['manu_name'] ?></td>
                    <td>
                        <a href="modules/manufactures/update.php?id=<?php echo $value['manu_id'] ?>" class="btn btn-info"><span class="fas fa-edit"></span> Sửa</a>
                        <a href="modules/manufactures/delete.php?id=<?php echo $value['manu_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>

<?php
require '../../layout/footer.php';