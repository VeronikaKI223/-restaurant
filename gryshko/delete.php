<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $food_id = $_POST["food_id"];
        $sql = "DELETE FROM food WHERE food_id = :food_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':food_id', $food_id);
        $stmt->execute();

        echo "<p>Data deleted successfully.</p>";
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
    <link rel="stylesheet" type="text/css" href="delete.css">
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

        select {
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
    <title>Delete Menu Item</title>
</head>

<body>
    <h1>Delete Menu Item</h1>

    <form method="post" action="">
        <label for="food_id">Select Item to Delete:</label>
        <select id="food_id" name="food_id" required>
            <?php
            $sql = "SELECT food_id, name FROM food";
            $result = $conn->query($sql);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row["food_id"] . "'>" . $row["name"] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Delete Item</button>
    </form>

    <br>
    <a href="gryshko.php" class="back-link">Back to Main Page</a>
</body>

</html>