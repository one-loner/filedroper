<?php
session_start();

// Проверка на загрузку файла
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $captcha = $_POST['captcha'];
    if ($captcha === $_SESSION['captcha']) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = basename($_FILES['file']['name']);
        $randomName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . $randomName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $fileLink = 'index.php?file=' . $randomName;
            $fileLink1 = 'uploads/' . $randomName;
            echo "<div class='message'>File uploaded.";
            echo "<div class='message'>One-time link (the file will be deleted after downloading): <a href='$fileLink'>$fileLink</a></div>";
            echo "<div class='message'>Permanent link (the file will remain on the server after downloading): <a href='$fileLink1'>$fileLink1</a></div>";
        } else {
            echo "<div class='error'>Error uploading file.</div>";
        }
    } else {
        echo "<div class='error'>Captcha incorrect.</div>";
    }
}

// Генерация капчи
$captchaImages = glob('captcha/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
if (count($captchaImages) > 0) {
    $captchaImage = $captchaImages[array_rand($captchaImages)];
    $_SESSION['captcha'] = pathinfo($captchaImage, PATHINFO_FILENAME);
} else {
    die("No captcha images. Please, put capctcha images in captcha/");
}

// Обработка скачивания файла
if (isset($_GET['file'])) {
    $uploadDir = 'uploads/';
    $file = basename($_GET['file']);
    $filePath = $uploadDir . $file;

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        unlink($filePath); // Удаление файла после скачивания
        exit;
    } else {
        echo "<div class='error'>Error 404. File not found.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>File dropper.</title>
    <link rel="stylesheet" href="styles.css"> <!-- Подключение CSS -->
</head>
<body>
    <h1>Upload file. </h1>
    <form enctype="multipart/form-data" method="POST">
        <input type="file" name="file" required>
        <br>
        <img src="<?php echo $captchaImage; ?>" alt="Капча">
        <br>
        <input type="text" name="captcha" placeholder="You know)" required>
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
