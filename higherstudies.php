<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Studies Details - Mount Carmel College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url("images/one.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 20px;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 2rem;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: var(--light-color);
            border-radius: 8px;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        label {
            font-weight: 600;
            color: var(--primary-color);
        }

        select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s ease;
            min-width: 200px;
        }

        select:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        button, input[type="submit"] {
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .btn-pdf {
            background-color: var(--accent-color);
        }

        .btn-pdf:hover {
            background-color: #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }

        img.thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
            transition: transform 0.3s ease;
        }

        img.thumbnail:hover {
            transform: scale(1.1);
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            select {
                width: 100%;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            th, td {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
            
            img.thumbnail {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-graduation-cap"></i> Higher Studies Details</h2>

        <?php
            // Establish connection to MySQL database
            $con = mysqli_connect("localhost", "root", "", "alumini");
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch distinct academic years from the database
            $academicYears = array();
            $stmt = $con->prepare("SELECT DISTINCT academicYear FROM one WHERE studyOrWork = 'higherStudies' ORDER BY academicYear DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $academicYears[] = $row["academicYear"];
            }

            // Add "All" option to the academic year dropdown
            array_unshift($academicYears, "All");

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedAcademicYear = $_POST["academicYear"];
            } else {
                // Default to "All"
                $selectedAcademicYear = "All";
            }
        ?>

        <div class="filter-section">
            <form method="post" class="filter-group">
                <label for="academicYear"><i class="fas fa-calendar-alt"></i> Academic Year:</label>
                <select name="academicYear" id="academicYear">
                    <?php
                        foreach ($academicYears as $year) {
                            if ($year == $selectedAcademicYear) {
                                echo "<option value='$year' selected>$year</option>";
                            } else {
                                echo "<option value='$year'>$year</option>";
                            }
                        }
                    ?>
                </select>
                <button type="submit"><i class="fas fa-filter"></i> Filter</button>
            </form>

            <form action="generate_pdf1.php" method="post" class="filter-group">
                <input type="hidden" name="academicYear" value="<?php echo $selectedAcademicYear; ?>">
                <button type="submit" class="btn-pdf"><i class="fas fa-file-pdf"></i> Generate PDF</button>
            </form>
        </div>

        <?php
            // Prepare SQL query to fetch data based on the selected academic year
            if ($selectedAcademicYear == "All") {
                $stmt = $con->prepare("SELECT photo, registerNumber, name, batch, academicYear, studyName, idCard, studyPlace FROM one WHERE studyOrWork = 'higherStudies' ORDER BY academicYear DESC, name ASC");
            } else {
                $stmt = $con->prepare("SELECT photo, registerNumber, name, batch, academicYear, studyName, idCard, studyPlace FROM one WHERE studyOrWork = 'higherStudies' AND academicYear = ? ORDER BY name ASC");
                $stmt->bind_param("s", $selectedAcademicYear);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
        ?>

        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Register Number</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Academic Year</th>
                    <th>Higher Studies</th>
                    <th>ID Card</th>
                    <th>Study Place</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>";
                        if (!empty($row["photo"])) {
                            echo "<img src='uploads/" . htmlspecialchars($row["photo"]) . "' alt='Student Photo' class='thumbnail'>";
                        } else {
                            echo "<div class='no-photo'><i class='fas fa-user-circle fa-2x'></i></div>";
                        }
                        echo "</td>";
                        echo "<td>" . htmlspecialchars($row["registerNumber"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["batch"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["academicYear"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["studyName"]) . "</td>";
                        echo "<td>";
                        if (!empty($row["idCard"])) {
                            echo "<img src='uploads/" . htmlspecialchars($row["idCard"]) . "' alt='ID Card' class='thumbnail'>";
                        } else {
                            echo "<span class='na'>N/A</span>";
                        }
                        echo "</td>";
                        echo "<td>" . htmlspecialchars($row["studyPlace"]) . "</td>";
                        echo "</tr>";
                    }
                    mysqli_close($con);
                ?>
            </tbody>
        </table>

        <?php } else { ?>
            <div class="no-data">
                <i class="fas fa-info-circle fa-3x"></i>
                <h3>No Data Found</h3>
                <p>No higher studies records available for the selected academic year.</p>
            </div>
        <?php } ?>
    </div>
</body>
</html>