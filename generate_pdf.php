<?php
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Certificate Courses Details');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Filtered Certificate Courses Report');
$pdf->SetSubject('Filtered Certificate Courses Report');
$pdf->SetKeywords('PDF, Certificate Courses, Filtered Report');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Set content
$content = '';

$content .= '<h1>Filtered Certificate Courses Report</h1>';
$content .= '<table border="1">';
$content .= '<tr><th>Register Number</th><th>Name</th><th>Permanent Address</th><th>Academic Year</th><th>Institution Name</th><th>Duration</th><th>Type</th></tr>';

// Fetch filtered data from the database based on the selected academic year
$con = mysqli_connect("localhost", "root", "", "alumini");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedAcademicYear = $_POST["academicYear"];

    if ($selectedAcademicYear == "All") {
        $stmt = $con->prepare("SELECT registerNumber, name, batch, academicYear, certificateInstitution, certificateDuration, certificateType FROM one WHERE studyOrWork = 'certificatecourse'");
    } else {
        $stmt = $con->prepare("SELECT registerNumber, name, batch, academicYear, certificateInstitution, certificateDuration, certificateType FROM one WHERE studyOrWork = 'certificatecourse' AND academicYear = ?");
        $stmt->bind_param("s", $selectedAcademicYear);
    }
} else {
    $stmt = $con->prepare("SELECT registerNumber, name, batch, academicYear, certificateInstitution, certificateDuration, certificateType FROM one WHERE studyOrWork = 'certificatecourse'");
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $content .= '<tr>';
    $content .= '<td>' . $row["registerNumber"] . '</td>';
    $content .= '<td>' . $row["name"] . '</td>';
    $content .= '<td>' . $row["batch"] . '</td>';
    $content .= '<td>' . $row["academicYear"] . '</td>';
    $content .= '<td>' . $row["certificateInstitution"] . '</td>';
    $content .= '<td>' . $row["certificateDuration"] . '</td>';
    $content .= '<td>' . $row["certificateType"] . '</td>';
    $content .= '</tr>';
}

$content .= '</table>';

$pdf->writeHTML($content, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('filtered_certificate_courses_report.pdf', 'D');

// Close database connection
mysqli_close($con);
?>
