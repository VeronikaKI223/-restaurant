<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $food_id = $_POST["food_id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        $sql = "UPDATE food SET name = :name, description = :description, price = :price WHERE food_id = :food_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':food_id', $food_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->execute();

        echo "<p>Data updated successfully.</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="update.css">
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

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #e91e63;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff4081;
        }

        .back-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            padding: 10px 20px;
            color: #fff;
            background-color: #e91e63;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #ff4081;
        }
    </style>
    <title>Update Menu Item</title>
</head>

<body>
    <h1>Update Menu Item</h1>

    <form method="post" action="">
        <label for="food_id">Select Item to Update:</label>
        <select id="food_id" name="food_id" required>
            <?php
            $sql = "SELECT food_id, name FROM food";
            $result = $conn->query($sql);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["food_id"] . "'>" . $row["name"] . "</option>";
            }
            ?>
        </select>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <button type="submit">Update Item</button>
    </form>

    <br>
    <a href="gryshko.php" class="back-link">Back to Main Page</a>
</body>

</html>