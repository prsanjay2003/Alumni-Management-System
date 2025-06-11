<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumini";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define the target folder for file uploads
$uploadFolder = "D:/xampp/htdocs/PHP/uploads/"; // Added trailing slash

// Create upload directory if it doesn't exist
if (!file_exists($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

// Initialize file variables
$idCard = "";
$photo = "";
$offerLetter = "";

// Handle file uploads with proper error checking
if (isset($_FILES["idCard"]) && $_FILES["idCard"]["error"] == UPLOAD_ERR_OK) {
    $idCard = basename($_FILES["idCard"]["name"]);
    $targetPath = $uploadFolder . $idCard;
    if (!move_uploaded_file($_FILES["idCard"]["tmp_name"], $targetPath)) {
        die("Failed to upload ID card");
    }
}

if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    $photo = basename($_FILES["photo"]["name"]);
    $targetPath = $uploadFolder . $photo;
    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) {
        die("Failed to upload photo");
    }
}

if (isset($_FILES["offerLetter"]) && $_FILES["offerLetter"]["error"] == UPLOAD_ERR_OK) {
    $offerLetter = basename($_FILES["offerLetter"]["name"]);
    $targetPath = $uploadFolder . $offerLetter;
    if (!move_uploaded_file($_FILES["offerLetter"]["tmp_name"], $targetPath)) {
        die("Failed to upload offer letter");
    }
}

// Process form data and insert or update into the database
$registerNumber = mysqli_real_escape_string($connection, $_POST['registerNumber']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$academicYear = mysqli_real_escape_string($connection, $_POST['academicYear']);
$permanentAddress = isset($_POST['batch']) ? mysqli_real_escape_string($connection, $_POST['batch']) : "";
$studyOrWork = mysqli_real_escape_string($connection, $_POST['studyOrWork']);

// Additional fields based on the selected option
if ($studyOrWork === "higherStudies") {
    $studyName = isset($_POST['studyName']) ? mysqli_real_escape_string($connection, $_POST['studyName']) : "";
    $studyPlace = isset($_POST['studyPlace']) ? mysqli_real_escape_string($connection, $_POST['studyPlace']) : "";
    // Insert data into the database for higher studies
    $sql = "INSERT INTO one (registerNumber, name, academicYear, studyName, studyPlace, idCard, photo, studyOrWork, batch) 
            VALUES ('$registerNumber', '$name', '$academicYear', '$studyName', '$studyPlace', '$idCard', '$photo', '$studyOrWork', '$permanentAddress')";
} elseif ($studyOrWork === "working") {
    $companyName = isset($_POST['companyName']) ? mysqli_real_escape_string($connection, $_POST['companyName']) : "";
    $designation = isset($_POST['designation']) ? mysqli_real_escape_string($connection, $_POST['designation']) : "";
    $contactDetails = isset($_POST['contactDetails']) ? mysqli_real_escape_string($connection, $_POST['contactDetails']) : "";
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : "";
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($connection, $_POST['phone']) : "";
    $salary = isset($_POST['salary']) ? mysqli_real_escape_string($connection, $_POST['salary']) : "";
    
    // Check if the record already exists
    $check_sql = "SELECT * FROM one WHERE registerNumber = '$registerNumber' AND studyOrWork = 'working'";
    $result = mysqli_query($connection, $check_sql);
    if (mysqli_num_rows($result) > 0) {
        // Update existing record
        $sql = "UPDATE one SET name='$name', academicYear='$academicYear', companyName='$companyName', 
                designation='$designation', contactDetails='$contactDetails', email='$email', phone='$phone', 
                offerLetter='$offerLetter', salary='$salary', batch='$permanentAddress' 
                WHERE registerNumber='$registerNumber' AND studyOrWork='working'";
    } else {
        // Insert new record
        $sql = "INSERT INTO one (registerNumber, name, academicYear, companyName, designation, contactDetails, 
                email, phone, offerLetter, salary, studyOrWork, batch) 
                VALUES ('$registerNumber', '$name', '$academicYear', '$companyName', '$designation', '$contactDetails', 
                '$email', '$phone', '$offerLetter', '$salary', '$studyOrWork', '$permanentAddress')";
    }
    
    // Check if the same register number exists in higherStudies or certificateCourse and update accordingly
    $check_sql = "SELECT * FROM one WHERE registerNumber = '$registerNumber' AND (studyOrWork = 'higherStudies' OR studyOrWork = 'certificatecourse')";
    $result = mysqli_query($connection, $check_sql);
    if (mysqli_num_rows($result) > 0) {
        $delete_sql = "DELETE FROM one WHERE registerNumber = '$registerNumber' AND (studyOrWork = 'higherStudies' OR studyOrWork = 'certificatecourse')";
        mysqli_query($connection, $delete_sql);
    }
} elseif ($studyOrWork === "certificatecourse") {
    $certificateInstitution = isset($_POST['certificateInstitution']) ? mysqli_real_escape_string($connection, $_POST['certificateInstitution']) : "";
    $certificateDuration = isset($_POST['certificateDuration']) ? mysqli_real_escape_string($connection, $_POST['certificateDuration']) : "";
    $certificateType = isset($_POST['certificateType']) ? mysqli_real_escape_string($connection, $_POST['certificateType']) : "";
    // Insert data into the database for certificate course
    $sql = "INSERT INTO one (registerNumber, name, academicYear, certificateInstitution, certificateDuration, 
            certificateType, studyOrWork, batch) 
            VALUES ('$registerNumber', '$name', '$academicYear', '$certificateInstitution', '$certificateDuration', 
            '$certificateType', '$studyOrWork', '$permanentAddress')";

    // Check if the same register number exists in higherStudies and update accordingly
    $check_sql = "SELECT * FROM one WHERE registerNumber = '$registerNumber' AND studyOrWork = 'higherStudies'";
    $result = mysqli_query($connection, $check_sql);
    if (mysqli_num_rows($result) > 0) {
        $delete_sql = "DELETE FROM one WHERE registerNumber = '$registerNumber' AND studyOrWork = 'higherStudies'";
        mysqli_query($connection, $delete_sql);
    }
}

// Execute the SQL query
if (mysqli_query($connection, $sql)) {
    echo "Data inserted or updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>