<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form action="store_data.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="registerNumber">Register Number:</label>
        <input type="text" id="registerNumber" name="registerNumber" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
