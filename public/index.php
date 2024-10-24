<?php
require './Miautocargador.php';
require '../vendor/autoload.php';

//use App\Controllers\HomeController;

//$controller = new HomeController();
//$controller->index();

//CHROOT EN OPITONS PARA PDFS Y VER QUE ES

// referencia al espacio de nombres Dompdf 
use Dompdf\Dompdf;

// Instanciar la clase Dompdf
$dompdf = new Dompdf();

$imageData = base64_encode(file_get_contents('../img/jamoncito.webp'));
$src = 'data:image/jpeg;base64,' . $imageData;

// Cargar el CSS
$cssPath = realpath('../css/styles.css');
$css = file_get_contents($cssPath);

$html = '
	<!DOCTYPE html>
	<html>
	<head>
		<style>' . $css . '</style>
	</head>
	<body>
		<h1>Hola Mundo</h1>
		<p>Este es un PDF personalizado generado con Dompdf.</p>
		<img src="' . $src . '" alt="Jamón 100% ibérico" class="imagen-estilo"/>
	</body>
	</html>';

$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño y la orientación del papel
$dompdf->setPaper('A4', 'landscape');

// Representar el HTML como PDF
$dompdf->render();

// Enviar el PDF generado al navegador
$dompdf->stream('mi_pdf_personalizado.pdf', ['Attachment' => true]);

