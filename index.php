<?php

$conn = new mysqli('localhost', 'root', '', 'testt');
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}


if (isset($_POST['add_person'])) {
    $ad = htmlspecialchars(trim($_POST['ad']));
    $soyad = htmlspecialchars(trim($_POST['soyad']));
    $email = htmlspecialchars(trim($_POST['email']));

    $stmt = $conn->prepare("INSERT INTO kisiler (AD, SOYAD, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ad, $soyad, $email);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Kişi başarıyla eklendi!</p>";
    } else {
        echo "<p style='color: red;'>Hata: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$search_result = null;
if (isset($_POST['search_person'])) {
    $search_name = htmlspecialchars(trim($_POST['search_name']));

    $stmt = $conn->prepare("SELECT SOYAD, email FROM kisiler WHERE AD = ?");
    $stmt->bind_param("s", $search_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $search_result = $result->fetch_assoc();
    } else {
        echo "<p style='color: red;'>Kayıt bulunamadı.</p>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kişi Yönetimi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
        }
        .grid-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Kişi Yönetim Sistemi</h1>

    <div class="grid-container">
        
        <div class="grid-item">
            <h2>Kişi Ekle</h2>
            <form method="post">
                <label for="ad">Ad:</label>
                <input type="text" id="ad" name="ad" required>
                <br>
                <label for="soyad">Soyad:</label>
                <input type="text" id="soyad" name="soyad" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <button type="submit" name="add_person">Ekle</button>
            </form>
        </div>

        
        <div class="grid-item">
            <h2>Kişi Ara</h2>
            <form method="post">
                <label for="search_name">Ad:</label>
                <input type="text" id="search_name" name="search_name" required>
                <button type="submit" name="search_person">Bul</button>
            </form>

            <?php if ($search_result): ?>
                <h3>Sonuçlar:</h3>
                <p>Soyad: <?php echo htmlspecialchars($search_result['SOYAD']); ?></p>
                <p>Email: <?php echo htmlspecialchars($search_result['email']); ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
