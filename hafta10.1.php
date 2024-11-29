<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablo Oluşturma</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; text-align: center; padding: 30px;">

    <h1 style="color: #0066cc; font-size: 32px;">Tablo Oluşturma</h1>
    

    <form method="post" style="margin-bottom: 30px;">
        <label for="rows" style="font-size: 18px;">Satır Sayısı:</label>
        <input type="number" id="rows" name="rows" required style="padding: 5px; margin-left: 10px;">
        <br><br>
        <label for="columns" style="font-size: 18px;">Sütun Sayısı:</label>
        <input type="number" id="columns" name="columns" required style="padding: 5px; margin-left: 10px;">
        <br><br>
        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Tabloyu Oluştur</button>
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rows = $_POST['rows'];
        $columns = $_POST['columns'];

        
        echo "<h2>Oluşturulan Tablo</h2>";
        echo "<table>";

        
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columns; $j++) {
                $randomNumber = rand(1, 100); 
                echo "<td>$randomNumber</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

</body>
</html>
