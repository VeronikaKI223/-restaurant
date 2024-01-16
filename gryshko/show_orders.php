<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        th, td {
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
    <title>List of Orders</title>
</head>
<body>
    <h1>List of Orders</h1>

    <?php
    try {
        $sql = "SELECT order_id, guest_id, order_status FROM order_table";
        $result = $conn->query($sql);

        echo "<h2>Information about Orders:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>Guest ID</th><th>Order Status</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["order_id"]."</td><td>".$row["guest_id"]."</td><td>".$row["order_status"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No information available about orders.</p>";
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
