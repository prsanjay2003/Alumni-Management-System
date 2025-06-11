<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("images/cyril.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 300px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h1 {
            color: #fff; /* Set heading color to white */
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        img {
            width: 100px; /* Adjust the width as needed */
            margin-right: 10px; /* Add margin to separate the logo from text */
        }
    </style>
</head>
<body>
    <h1><img src="claman/34.png" alt="Logo">Mount Carmel College (Autonomous), Bengaluru-560052<br>Alumni Management System</h1>

    <div class="container">
        <form action="alumini.php" method="post">
            <h2>Alumni Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Are you an admin? <a href="admin1.php">Click here</a> to login as an admin.</p>
    </div>
    </div>
</body>
</html>
