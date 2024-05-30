<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>My Web Page</title>
</head>
<body>
    <?php
        // Include the database connection file
        include 'includes/dbh.inc.php';


        // Fetch and display user data
        $sql = "SELECT id, username, email, created_at FROM users";
        $stmt = $pdo->query($sql);

        echo "<h2>User Data</h2>";
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
              </tr>";
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
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
