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

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #e91e63;
            border-radius: 5px;
        }

        a:hover {
            background-color: #ff4081;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            padding: 10px;
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
    </style>
    <title>Restaurant Management System</title>
</head>

<body>
    <h1>Restaurant Management System</h1>
    <br>
    <a href="add.php">Add Data</a>
    <a href="delete.php">Delete Data</a>
    <a href="edit.php">Update Data</a>
    <br>
    <a href="show_chefs.php">View Chefs</a>
    <a href="show_guests.php">View Guests</a>
    <a href="show_drink.php">View Drink</a>
    <a href="show_reservations.php">View Reservations</a>
    <a href="show_orders.php">View Orders</a>
    <a href="show_transactions.php">View Transactions</a>

    <?php
    try {
        $sql = "SELECT food_id, name, description, price FROM food";
        $result = $conn->query($sql);

        echo "<h2>Menu:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Desciption</th><th>Price</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>" . $row["food_id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["price"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    ?>
</body>

</html>