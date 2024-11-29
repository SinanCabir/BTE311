<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1-100 Arası Tek Sayılar</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; text-align: center; margin-top: 50px;">

    <h1 style="color: #0066cc; font-size: 32px;">1-100 Arası Tek Sayılar</h1>

    <ul style="list-style-type: none; padding: 0; font-size: 20px;">
        <?php
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 2 != 0) {
                echo "<li style='margin: 5px; padding: 5px; background-color: #e0e0e0; border-radius: 5px;'>$i</li>";
            }
        }
        ?>
    </ul>

</body>
</html>
