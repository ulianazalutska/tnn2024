<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Приклад отримання інформації про користувача
$user_id = $_SESSION['user_id'];
// Отримання даних про користувача з бази даних
// З'єднання з базою даних та запит до неї, щоб отримати інформацію користувача

// Приклад відображення інформації
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        :root {
            --header-height: 60px; /* Висота заголовка */
            --primary-color: #007BFF; /* Основний колір */
            --background-color: #f0f0f0; /* Колір фону */
            --card-background: #fff; /* Колір фону карток */
            --text-color: #333; /* Колір тексту */
            --subtext-color: #666; /* Колір підпорядкованого тексту */
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            padding-top: var(--header-height); /* Відступ зверху */
            background-color: var(--background-color);
        }

        .container {
            max-width: 800px; /* Максимальна ширина контейнера */
            margin: 0 auto; /* Вирівнювання по центру */
            padding: 20px; /* Внутрішній відступ */
        }

        h1 {
            text-align: center; /* Вирівнювання заголовка */
            color: var(--text-color); /* Колір заголовка */
            margin-bottom: 30px; /* Відступ знизу */
        }

        .card {
            background-color: var(--card-background);
            border-radius: 8px; /* Закруглені кути */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Тінь для картки */
            padding: 20px; /* Внутрішній відступ картки */
            margin-bottom: 20px; /* Відступ знизу картки */
        }

        .card h2 {
            color: var(--primary-color); /* Колір заголовка картки */
            margin-top: 0; /* Убрати верхній відступ */
        }

        .card p {
            color: var(--subtext-color); /* Колір тексту в картці */
        }

        .button {
            display: inline-block; /* Перетворюємо на блок для кнопок */
            background-color: var(--primary-color); /* Колір фону кнопки */
            color: #fff; /* Колір тексту на кнопці */
            padding: 10px 15px; /* Внутрішні відступи кнопки */
            border: none; /* Без рамки */
            border-radius: 5px; /* Закруглені кути */
            text-decoration: none; /* Без підкреслення */
            text-align: center; /* Вирівнювання тексту */
            transition: background-color 0.3s; /* Анімація при наведенні */
        }

        .button:hover {
            background-color: darken(var(--primary-color), 10%); /* Зміна кольору при наведенні */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        
        <div class="card">
            <h2>Welcome, <?= htmlspecialchars($_SESSION['name']); ?>!</h2>
            <p>Email: <?= htmlspecialchars($_SESSION['email']); ?></p>
        </div>

        <div class="card">
            <h2>Additional Information</h2>
            <p>Here you can add more details about the user, such as their bio, preferences, or any other relevant information.</p>
        </div>

        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
