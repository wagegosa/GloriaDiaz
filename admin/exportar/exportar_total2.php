<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Bogota');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
require('../../config/General/connexion.php');
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
->setCellValue('A3', 'Nro')
->setCellValue('B3', 'Cedula')
->setCellValue('C3', 'Nombres')
->setCellValue('D3', 'Teléfono')
->setCellValue('E3', 'Correo')
->setCellValue('F3', 'Dirección')
->setCellValue('G3', 'Localidad')
->setCellValue('H3', 'Lugar Votación')
->setCellValue('I3', 'Usuario')
->setCellValue('J3', 'Organizador')
->setCellValue('K3', 'Fecha Reunión')
;
$conn= new DataBase();
$link = $conn->Conectarse();
$query = "SELECT idtba_regist_asiste, cedula, nom_comple, telefono, correo, dir_reside, localidad, Lug_votaci, USER, organizador, CONVERT(fec_creaci, DATE) AS fec_creaci FROM gloriadiaz.vs_exp_fecha ";
$result=mysqli_query($link, $query);
mysqli_close($link);
// Miscellaneous glyphs, UTF-8
$i = 1;
$c = 4;
while ($row=mysqli_fetch_assoc($result)):
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
	->setCellValue('K'.$c, $row['fec_creaci'])
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
header('Content-Disposition: attachment;filename="Asistencia_Total.xlsx"');
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