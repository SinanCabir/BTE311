<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Ekleme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            display: grid;
            grid-template-rows: auto 1fr;
            grid-gap: 20px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-section {
            display: grid;
            grid-gap: 10px;
        }
        .form-section label {
            font-weight: bold;
        }
        .form-section input[type="text"], .form-section input[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-section input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .form-section input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .data-section {
            overflow-y: auto;
            max-height: 200px;
        }
        .data-section h2 {
            margin-top: 0;
        }
        .data-section p {
            margin: 5px 0;
            padding: 5px;
            background-color: #f9f9f9;
            border-left: 3px solid #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-section">
        <h2>Veri Ekleme Formu</h2>
        <form action="index1.php" method="POST">
            <label for="data">Veri:</label>
            <input type="text" id="data" name="data" required>
            <input type="submit" value="Ekle">
        </form>
    </div>

    <div class="data-section">
        <h2>Dosyadaki Veriler:</h2>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $data = $_POST['data'];

            
            $file = fopen("data.txt", "a");
            if ($file) {
                fwrite($file, $data . "\n"); 
                fclose($file); 
            } else {
                echo "<p>Dosya açılamadı.</p>";
            }
        }

        
        $file = fopen("data.txt", "r");
        if ($file) {
            while ($line = fgets($file)) {
                echo "<p>" . htmlspecialchars($line) . "</p>"; 
            }
            fclose($file); 
        } else {
            echo "<p>Dosya okunamıyor.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>