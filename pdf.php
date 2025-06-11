<?php
require 'vendor/autoload.php'; // Adjust the path as needed to where the autoload file is located

use Knp\Snappy\Pdf;

// Create an instance of the Snappy PDF class
$snappy = new Pdf('/path/to/wkhtmltopdf');

// Set the URL of the webpage containing the table
$url = 'http://localhost/PHP/higherstudies.php';

// Set the output file path for the PDF
$pdfOutputPath = 'table_screenshot.pdf';

// Generate the PDF from the screenshot of the webpage
$snappy->generate($url, $pdfOutputPath);

echo 'PDF generated successfully!';
