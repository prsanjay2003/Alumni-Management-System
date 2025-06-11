<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registerFilter = $_POST['registerFilter'];

    // Database connection
    $con = mysqli_connect("localhost", "root", "", "test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM user_data";
    if (!empty($registerFilter)) {
        $query .= " WHERE registerNumber = '$registerFilter'";
    }

    $result = mysqli_query($con, $query);

    // Include the TCPDF library
    require_once('tcpdf/tcpdf.php');

    // Generate PDF
    // Add your PDF generation logic here using TCPDF

    // Close the database connection
    mysqli_close($con);
}

    class PDF extends TCPDF
    {
        function Header()
        {
            $this->SetFont('helvetica', 'B', 12);
            $this->Cell(0, 10, 'Working Details Report', 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('helvetica', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 10);

    $pdf->Cell(60, 10, 'Name', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Register Number', 1, 0, 'C');
    $pdf->Ln();

    // Add data to PDF
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(60, 10, $row["name"], 1, 0, 'C');
        $pdf->Cell(60, 10, $row["registerNumber"], 1, 0, 'C');
        $pdf->Ln();
    }

    // Output the PDF as a download
    $pdf->Output('Filtered_Working_Details_Report.pdf', 'D');
?>
