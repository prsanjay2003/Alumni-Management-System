<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "staff";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// Fetch values from the database
$sql = "SELECT * FROM new";
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if (!$result) {
    die("Error in SQL query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Values</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Value 1</th>
            <th>Value 2</th>
            <th>Value 3</th>
            <th>Value 4</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['column1']; ?></td>
            <td><?php echo $row['column2']; ?></td>
            <td><?php echo $row['column3']; ?></td>
            <td><?php echo $row['column4']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <form action="generate_pdf.php" method="post">
        <input type="submit" value="Generate PDF">
    </form>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
