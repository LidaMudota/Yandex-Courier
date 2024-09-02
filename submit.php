<?php
// Подключение к базе данных MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yandex_eda";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);

    // Подготовка и выполнение SQL-запроса
    $stmt = $conn->prepare("INSERT INTO applications (name, phone, city) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $city);

    if ($stmt->execute()) {
        echo "Спасибо, $name! Ваша заявка принята.";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
}

// Закрываем подключение
$conn->close();
?>
