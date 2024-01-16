<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Chefs</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    h1 {
        color: #333;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #e91e63;
        color: #fff;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        text-decoration: none;
        padding: 8px 12px;
        margin: 5px;
        color: #fff;
        background-color: #e91e63;
        border-radius: 5px;
    }

    a:hover {
        background-color: #ff4081;
    }
</style>

<body>
    <h1>List of Chefs</h1>

    <?php
    try {
        $sql = "SELECT chef_id, name, specialization FROM chef";
        $result = $conn->query($sql);

        echo "<h2>Information about Chefs:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Specialization</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>" . $row["chef_id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["specialization"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No information available about chefs.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <br>
    <a href="gryshko.php">Back to Main Page</a>
</body>

</html>