<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "test");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM user_data";
$result = mysqli_query($con, $query);

// Fetch unique register numbers for the dropdown
$uniqueRegisterNumbers = mysqli_query($con, "SELECT DISTINCT registerNumber FROM user_data");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>

<body>
    <h2>User Data</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Register Number</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['registerNumber'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <br>
    <form action="generate_pdf.php" method="post">
        <label for="registerFilter">Filter by Register Number:</label>
        <select name="registerFilter" id="registerFilter">
            <?php
            if($uniqueRegisterNumbers) {
                while ($row = mysqli_fetch_assoc($uniqueRegisterNumbers)) {
                    echo "<option value='" . $row['registerNumber'] . "'>" . $row['registerNumber'] . "</option>";
                }
            } else {
                echo "<option value=''>No register numbers found</option>";
            }
            ?>
        </select>
        <input type="submit" value="Filter and Generate PDF">
    </form>

</body>
</html>

<?php
mysqli_close($con);
?>
