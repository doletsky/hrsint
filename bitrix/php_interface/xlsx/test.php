<?php
include 'Classes/PHPExcel/IOFactory.php';
$inputFileType = 'Excel2007';
$inputFileName = 'bill_template.xlsx';

/**  Create a new Reader of the type defined in $inputFileType  **/
$objReader = PHPExcel_IOFactory::createReader($inputFileType);

/**  Load $inputFileName to a PHPExcel Object  **/
$objPHPExcel = $objReader->load($inputFileName);
#pre($objPHPExcel);

$B13=$objPHPExcel->getActiveSheet()->getCell('B13')->getValue();
$B13=str_replace("#NUMBER#","1",$B13);
$B13=str_replace("#DATE#","15 мая 1983",$B13);
pre($B13);

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B13', $B13);

for($i=1;$i<=2;$i++){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B'.(21+$i), $i)
			->setCellValue('D'.(21+$i), 'Товар №'.$i)
			->setCellValue('V'.(21+$i), rand(10,20))
			->setCellValue('AB'.(21+$i), rand(10000,20000));
}







$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(dirname(__FILE__).'/1.xlsx');


function pre($t){
	echo '<pre>';print_r($t);echo '</pre>';
}