<?php

include '../Classes/conn.php';
include_once '../Classes/Excel/PHPExcel.php';
include_once '../Classes/Excel/PHPExcel/Writer/IWriter.php';  
include_once '../Classes/Excel/PHPExcel/Writer/Excel5.php';  
include_once '../Classes/Excel/PHPExcel/IOFactory.php';  
$obj_phpexcel = new PHPExcel(); 
 
$obj_phpexcel->getActiveSheet()->setCellValue('a1','ID');  
$obj_phpexcel->getActiveSheet()->setCellValue('c1','Title');
$obj_phpexcel->getActiveSheet()->setCellValue('d1','Latitude');
$obj_phpexcel->getActiveSheet()->setCellValue('f1','Longitude');
$obj_phpexcel->getActiveSheet()->setCellValue('g1','LocationType 1:outreach 2:patnership');
$obj_phpexcel->getActiveSheet()->setCellValue('h1','url');
$obj_phpexcel->getActiveSheet()->setCellValue('i1','UserId');
$obj_phpexcel->getActiveSheet()->setCellValue('j1','CreateDate');
$sql = "SELECT * FROM health_location";
$result = $conn->query($sql);
$i =2; 
while ($row = $result->fetch_assoc())
{	
			  $obj_phpexcel->getActiveSheet()->setCellValue('a'.$i,$row['LocationId']);
   $obj_phpexcel->getActiveSheet()->setCellValue('c'.$i,$row['Title']);
    $obj_phpexcel->getActiveSheet()->setCellValue('d'.$i,$row['Latitude']);
    $obj_phpexcel->getActiveSheet()->setCellValue('f'.$i,$row['Longitude']);
  $obj_phpexcel->getActiveSheet()->setCellValue('g'.$i,$row['LocationType']);
  $obj_phpexcel->getActiveSheet()->setCellValue('h'.$i,$row['url']);
      $obj_phpexcel->getActiveSheet()->setCellValue('i'.$i,$row['UserId']);
    $obj_phpexcel->getActiveSheet()->setCellValue('j'.$i,$row['CreateDate']);
	$i++;				         		
}
        $obj_Writer = PHPExcel_IOFactory::createWriter($obj_phpexcel,'Excel5');  
        $filename = "User_Position.xls";  
        header("Content-Type: application/force-download");   
        header("Content-Type: application/octet-stream");   
        header("Content-Type: application/download");   
        header('Content-Disposition:inline;filename="'.$filename.'"');   
        header("Content-Transfer-Encoding: binary");   
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");   
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");   
        header("Pragma: no-cache");   
        $obj_Writer->save('php://output');   

?>