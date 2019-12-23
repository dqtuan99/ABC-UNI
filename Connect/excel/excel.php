<?php
require_once("Connect/excel/PHPExcel.php");
class excel {
	public $file, $objPHPExcel;
	public	function  __construct(){
		$this->file = 'data.xlsx';
		$objFile = PHPExcel_IOFactory::identify( $this->file );
		$objData = PHPExcel_IOFactory::createReader( $objFile );
		$objData->setReadDataOnly( true );
		$this->objPHPExcel = $objData->load( $this->file );
	}
	public function ReadExcel( $sheetIndex ) {
		$sheet = $this->objPHPExcel->setActiveSheetIndex( $sheetIndex );
		$Totalrow = $sheet->getHighestRow();
		$LastColumn = $sheet->getHighestColumn();
		$TotalCol = PHPExcel_Cell::columnIndexFromString( $LastColumn );
		$data = [];
		for ( $i = 1; $i <= $Totalrow; $i++ )
			for ( $j = 0; $j < $TotalCol; $j++ )
			{
				$data[ $i - 1 ][ $j ] = $sheet->getCellByColumnAndRow( $j, $i )->getValue();
			}
		return $data;
	}
	
	public function ExcelImport($data){
	$i=2;
$excel = new PHPExcel();
$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->setTitle('demo');
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$excel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
$excel->getActiveSheet()->setCellValue('A1', 'Mã');
$excel->getActiveSheet()->setCellValue('B1', 'Họ Tên');
$excel->getActiveSheet()->setCellValue('C1', 'Số điện thoại');
$excel->getActiveSheet()->setCellValue('D1', 'Thành Phố');
$excel->getActiveSheet()->setCellValue('E1', 'Đất nước');
$numRow = 2;
foreach ($data as $row) {
    $excel->getActiveSheet()->setCellValue('A' . $i, $row["customerNumber"]);
    $excel->getActiveSheet()->setCellValue('B' . $i, $row["customerName"]);
    $excel->getActiveSheet()->setCellValue('C' . $i, $row["phone"]);
	$excel->getActiveSheet()->setCellValue('D' . $i, $row["city"]);
	$excel->getActiveSheet()->setCellValue('E' . $i, $row["country"]);
	$i++;	
}

PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');}
}