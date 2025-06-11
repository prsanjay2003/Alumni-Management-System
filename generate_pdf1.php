<?php
require_once('tcpdf/tcpdf.php');

// Start output buffering
ob_start();

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumini";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["academicYear"])) {
    $selectedAcademicYear = $_POST["academicYear"];
} else {
    // Default to "All"
    $selectedAcademicYear = "All";
}

// Fetch values from the database based on the selected academic year and sorted by academic year
if ($selectedAcademicYear == "All") {
    $stmt = $con->prepare("SELECT photo, registerNumber, name, batch, academicYear, studyName, idCard, studyPlace FROM one WHERE studyOrWork = 'higherStudies' ORDER BY academicYear");
} else {
    $stmt = $con->prepare("SELECT photo, registerNumber, name, batch, academicYear, studyName, idCard, studyPlace FROM one WHERE studyOrWork = 'higherStudies' AND academicYear = ?");
    $stmt->bind_param("s", $selectedAcademicYear);
}
$stmt->execute();
$result = $stmt->get_result();

// Create new PDF instance
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();

// Title
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Alumni Details For Higher Studies', 0, 1, 'C');

// Table header
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 10, 'Photo', 1, 0, 'C');
$pdf->Cell(25, 10, 'Reg. No.', 1, 0, 'C');
$pdf->Cell(40, 10, 'Name', 1, 0, 'C');
$pdf->Cell(20, 10, 'Batch', 1, 0, 'C');
$pdf->Cell(30, 10, 'Academic Year', 1, 0, 'C');
$pdf->Cell(50, 10, 'Higher Studies Name', 1, 0, 'C');
$pdf->Cell(30, 10, 'ID Card', 1, 0, 'C');
$pdf->Cell(50, 10, 'Place of Higher Studies', 1, 1, 'C');

// Table rows
$pdf->SetFont('helvetica', '', 8); // Reduce the font size here
while ($row = $result->fetch_assoc()) {
    // Display other data in the table with adjusted cell widths
    $photoPath = 'uploads/' . $row['photo'];
    $pdf->Image($photoPath, $pdf->GetX(), $pdf->GetY(), 30, 30); // Adjust the width and height as needed
    $pdf->Cell(30, 30, '', 0, 0, 'C');

    $pdf->Cell(25, 30, $row['registerNumber'], 1, 0, 'C');
    $pdf->Cell(40, 30, $row['name'], 1, 0, 'C');
    $pdf->Cell(20, 30, $row['batch'], 1, 0, 'C');
    $pdf->Cell(30, 30, $row['academicYear'], 1, 0, 'C');
    $pdf->Cell(50, 30, $row['studyName'], 1, 0, 'C');

    $idCardPath = 'uploads/' . $row['idCard'];
    $pdf->Image($idCardPath, $pdf->GetX(), $pdf->GetY(), 30, 30); // Embed ID Card image
    $pdf->Cell(30, 30, '', 0, 0, 'C');

    $pdf->Cell(50, 30, $row['studyPlace'], 1, 1, 'C');
}

// Output PDF as download
$pdf->Output('alumni_higher_studies_details.pdf', 'D');

// Close the database connection
mysqli_close($con);

// Flush and close output buffering
ob_end_flush();
?>
