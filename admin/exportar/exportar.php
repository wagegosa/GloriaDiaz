<?php
require "../../config/General/connexion.php";
$fecha_inicial= $_POST['fecha_inicial'];
if ($fecha_inicial != "" || $fecha_inicial != null){
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
	->setLastModifiedBy("Maarten Balliauw")
	->setTitle("Office 2007 XLSX Test Document")
	->setSubject("Office 2007 XLSX Test Document")
	->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
	->setKeywords("office 2007 openxml php")
	->setCategory("Test result file");
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('D1', 'REGISTRO ASISTENCIA')
	->setCellValue('D2', 'H.C. GLORIA DIAZ MARTINEZ')
	->setCellValue('A3', 'Fecha:')
	->setCellValue('B3', '')
	->setCellValue('C3', 'Dirección:')
	->setCellValue('D3', '')
	->setCellValue('A4', 'Organiza:')
	->setCellValue('B3', '')
	->setCellValue('C4', 'Barrio:')
	->setCellValue('D4', '')
	->setCellValue('C4', 'Teléfono')
	->setCellValue('A5', '')
	->setCellValue('B5', 'Localidad:')
	->setCellValue('C5', '')
	->setCellValue('A6', 'Nro')
	->setCellValue('B6', 'Cedula')
	->setCellValue('C6', 'Nombres')
	->setCellValue('D6', 'Teléfono')
	->setCellValue('E6', 'Correo')
	->setCellValue('F6', 'Dirección')
	->setCellValue('G6', 'Localidad')
	->setCellValue('H6', 'Lugar Votación')
	->setCellValue('I6', 'Usuario')
	->setCellValue('J6', 'Organizador');
	$conn= new DataBase();
	$link = $conn->Conectarse();
	$query = "SELECT idtba_regist_asiste, cedula, nom_comple, telefono, correo, dir_reside, localidad, Lug_votaci, USER, organizador, fec_creaci FROM gloriadiaz.vs_exp_fecha WHERE CONVERT(fec_creaci, DATE)  = '$fecha_inicial'";
	// echo "<pre>";
	// print_r($query);
	// echo "</pre>";
	// die();
	$result=mysqli_query($link, $query);
	mysqli_close($link);
	// Miscellaneous glyphs, UTF-8
	$i = 1;
	$c = 7;
	while ($row=mysqli_fetch_assoc($result)):
		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$c, $i)
		->setCellValue('B'.$c, $row['cedula'])
		->setCellValue('C'.$c, utf8_encode($row['nom_comple']))
		->setCellValue('D'.$c, $row['telefono'])
		->setCellValue('E'.$c, $row['correo'])
		->setCellValue('F'.$c, $row['dir_reside'])
		->setCellValue('G'.$c, utf8_encode($row['localidad']))
		->setCellValue('H'.$c, utf8_encode($row['Lug_votaci']))
		->setCellValue('I'.$c, $row['USER'])
		->setCellValue('J'.$c, utf8_encode($row['organizador']))
		;
		$c++;
		$i++;
		endwhile;
	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Asistentes.xlsx"');
	header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}
