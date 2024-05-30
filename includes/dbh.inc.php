<?php

$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
    // Step 1: Connect to the MySQL database using PDO
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 2: Fetch data from the database table
    $sql = "SELECT id, username, email, created_at FROM users"; // Query to select data from the users table
    $stmt = $pdo->query($sql);

} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>User Data</h2>

    <!-- Step 3: Display the data in a table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php
        if ($stmt->rowCount() > 0) {
            // Output data of each row
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["created_at"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>

</body>
</html>
