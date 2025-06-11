<?php
require('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Working Details PDF');
$pdf->SetSubject('Working Details Report');
$pdf->SetKeywords('Working Details, PDF, Report');

// Set default font subsetting mode
$pdf->setFontSubsetting(true);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Retrieve selected academic year
$selectedAcademicYear = $_POST['academicYear'];

// Establish connection to MySQL database
$con = mysqli_connect("localhost", "root", "", "alumini");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL query to fetch working details based on the selected academic year
if ($selectedAcademicYear == "All") {
    $stmt = $con->prepare("SELECT registerNumber, name, batch, academicYear, companyName, designation, contactDetails, email, phone, salary, offerLetter FROM one WHERE studyOrWork = 'working'");
} else {
    $stmt = $con->prepare("SELECT registerNumber, name, batch, academicYear, companyName, designation, contactDetails, email, phone, salary, offerLetter FROM one WHERE studyOrWork = 'working' AND academicYear = ?");
    $stmt->bind_param("s", $selectedAcademicYear);
}
$stmt->execute();
$result = $stmt->get_result();

// Generate PDF content
$html = '<h1>Working Details Report';
if ($selectedAcademicYear != "All") {
    $html .= ' - Academic Year: ' . $selectedAcademicYear;
}
$html .= '</h1>';
$html .= '<table border="1">';
$html .= '<tr><th>Register Number</th><th>Name</th><th>Batch</th><th>Company Name</th><th>Designation</th><th>Contact Details</th><th>Email</th><th>Phone Number</th><th>Salary</th><th>Offer Letter</th></tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td style="padding: 5px;">' . $row["registerNumber"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["name"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["batch"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["companyName"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["designation"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["contactDetails"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["email"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["phone"] . '</td>';
    $html .= '<td style="padding: 5px;">' . $row["salary"] . '</td>';
    $html .= '<td style="padding: 5px;"><a href="uploads/' . $row["offerLetter"] . '" download>Download Offer Letter</a></td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Output the HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('Working_Details_Report' . ($selectedAcademicYear != "All" ? '_' . $selectedAcademicYear : '') . '.pdf', 'D');

// Close database connection
mysqli_close($con);
?>
