<?php 
class Db{
    public static $connection = NULL;
    /**
    * @return connection object
    */
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }
    public function select($sql)
    {
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function query($sql)
    {
        $sql->execute();
    }
    //hàm xem thêm sửa xóa dữ liệu thông qua id
    public function SIUD($sql){
        $sql = self::$connection->prepare($sql);
        return $this->query($sql);
    }
    //hàm xóa dữ liệu thông qua bảng id bảng và id
    public function delete_Table_Id($sql){
        $sql = self::$connection->prepare($sql);
        return $this->query($sql);
    }

    public function __destruct()
    {
    //self::$connection->close();
    }


                        //Phân trang
    //hàm lấy ra danh sách 
    public function pagination($sql,$page,$num){
        if($page < 2){
            $star = 0;
        }else{
            $star = ($page * $num) - $num;
        }
        $sql = $sql.' LIMIT '.$star.','.$num;
        $sql = self::$connection->prepare($sql);
        return $this->select($sql);
    }
    //Hàm lấy ra số trang
    public function numPage($sql,$search,$page,$num){
        $sql = self::$connection->prepare($sql);
        $numPage = ceil(count($this->select($sql))/$num);
        ?>
        <a href="?search=<?php echo $search ?>&page=<?php if($page > 1) echo $page - 1 ;else echo 1?>"><</a>
        <?php
        for ($i=1; $i<= $numPage ; $i++) { 
           ?>
           <a href="?search=<?php echo $search ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
           <?php
        }
        ?>
        <a href="?search=<?php echo $search ?>&page=<?php if($page < $numPage) echo $page + 1 ;else echo $numPage?>">></a>
        <?php
        
    }
    public function numPage1($href,$sql,$page,$num){
        $sql = self::$connection->prepare($sql);
        $numPage = ceil(count($this->select($sql))/$num);
        ?>

        <a href="modules/<?php echo $href ?>/index.php?page=<?php if($page > 1) echo $page - 1 ;else echo 1?>"><</a>
        <?php
        for ($i=1; $i<= $numPage ; $i++) { 
           ?>
           <a href="modules/<?php echo $href ?>/index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
           <?php
        }
        ?>
        <a href="modules/<?php echo $href ?>/index.php?page=<?php if($page < $numPage) echo $page + 1 ;else echo $numPage?>">></a>
        <?php
    }
    
    public function numPagination($href,$sql,$page,$num){
        $sql = self::$connection->prepare($sql);
        $numPage = ceil(count($this->select($sql))/$num);
        ?>
        <div aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a aria-label="?page=<?php echo 1?>">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li>
                    <a aria-label="?page=<?php if($page > 1) echo $page - 1 ;else echo 1?>">
                        <span aria-hidden="true">←</span>
                    </a>
                </li>
                <?php
                for ($i=1; $i<= $numPage ; $i++) { 
                ?>
                <li class="">
                    <a href="modules/<?php echo $href ?>/index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
                }
                ?>
                <li>
                    <a aria-label="?page=<?php if($page < $numPage) echo $page + 1 ;else echo $numPage?>">
                        <span aria-hidden="true">→</span>
                    </a>
                </li>
                <li>
                    <a aria-label="?page=<?php echo $numPage?>">
                        <span aria-hidden="true">»</span></a>
                </li>
            </ul>
        </div>
        <?php
    }
    public function numPagination1($sql,$page,$num){
        $sql = self::$connection->prepare($sql);
        $numPage = ceil(count($this->select($sql))/$num);
        ?>
        <div aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="<?php echo $_SERVER['REQUEST_URI']?>&page=<?php echo 1?>">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_SERVER['REQUEST_URI']?>&page=<?php if($page > 1) echo $page - 1 ;else echo 1?>">
                        <span aria-hidden="true">←</span>
                    </a>
                </li>
                <?php
                for ($i=1; $i<= $numPage ; $i++) { 
                ?>
                <li class="">
                    <a href="<?php echo $_SERVER['REQUEST_URI']?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
                }
                ?>
                <li>
                    <a href="<?php echo $_SERVER['REQUEST_URI']?>&page=<?php if($page < $numPage) echo $page + 1 ;else echo $numPage?>">
                        <span aria-hidden="true">→</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_SERVER['REQUEST_URI']?>&page=<?php echo $numPage?>">
                        <span aria-hidden="true">»</span></a>
                </li>
            </ul>
        </div>
        <?php
    }         
                    // End-Phân Trang
}