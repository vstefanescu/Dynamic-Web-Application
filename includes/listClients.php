<?php
require_once "dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

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

<div class="container">
    <?php
    try {
        $query = "SELECT * FROM Clienti";
        $stmt = $pdo->query($query);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h3>Clienti</h3>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                </tr>";

        foreach ($result as $row) {
            echo "<tr>
                    <td>{$row['ID Client']}</td>
                    <td>{$row['Nume']}</td>
                    <td>{$row['Telefon']}</td>
                  </tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    ?>
</div>

</body>
</html>
