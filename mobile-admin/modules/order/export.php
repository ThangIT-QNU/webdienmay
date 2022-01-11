<?php 
 require_once '../class/PHPExcel.php';
 include "/xampp/htdocs/webdienmay/config/Connect.php"; 
 require_once '../class/PHPExcel/IOFactory.php';
 
 if(isset($_POST['btnexport']))
 {
     $objExcel= new PHPExcel;
     $objExcel->setActiveSheetIndex(0);
     $sheet = $objExcel->getActiveSheet()->setTitle('Hóa Đơn Mua Hàng');

   
     $rowCount= 1;
     $sheet->setCellValue('A'.$rowCount,'Họ Tên');
     $sheet->setCellValue('B'.$rowCount,'Số Điện Thoại');
     $sheet->setCellValue('C'.$rowCount,'Email');
     $sheet->setCellValue('D'.$rowCount,'Mã OTP Hàng');
     $sheet->setCellValue('E'.$rowCount,'Địa Chỉ');
     $sheet->setCellValue('F'.$rowCount,'Ngày Tạo');
    
    $sql = 'SELECT * from bill
     INNER JOIN customer ON customer.id = bill.id_customer ';
     $result= mysqli_query($conn,$sql);
     while ($row = mysqli_fetch_array(($result)))
     {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount,$row['fullname']);
        $sheet->setCellValue('B'.$rowCount,$row['phone']);
        $sheet->setCellValue('C'.$rowCount,$row['email']);
        $sheet->setCellValue('D'.$rowCount,$row['MaOTPHang']);
        $sheet->setCellValue('E'.$rowCount,$row['address']);
        $sheet->setCellValue('F'.$rowCount,$row['created_at']);
     }
     $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
      $filename = 'HoaDon.xlsx';
     $objWriter->save($filename);

    header('Content-Disposition: attachment; filename="'.$filename.'"');// 
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     header('Content-Length:'.filesize($filename));
     header('Content-Transfer-Encoding:binary'); //kiểu mã hóa được sử dụng truyền dữ liệu trong giao thức http
     header('Cache-Control:must-revalidate');
     header('Pragma:no-cache');
     readfile($filename);
     return;
 }

 

?>