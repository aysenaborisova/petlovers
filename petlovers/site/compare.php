<?php
$pageTitle = 'Выбор питомца';
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';
?>

<h1 class="page-title">Как выбрать питомца</h1>

<div class="expert-tip">
    💡 Перед выбором питомца оцените свой образ жизни и бюджет!
</div>

<table class="compare-table">
    <tr>
        <th>Параметр</th>
        <th>🐶 Собака</th>
        <th>🐱 Кошка</th>
        <th>🐠 Рыбки</th>
        <th>🦜 Попугай</th>
        <th>🐹 Хомяк</th>
    </tr>
    <tr>
        <td>Сложность ухода</td>
        <td>⭐⭐⭐</td>
        <td>⭐⭐</td>
        <td>⭐⭐⭐⭐</td>
        <td>⭐⭐⭐</td>
        <td>⭐⭐</td>
    </tr>
    <tr>
        <td>Время в день</td>
        <td>2-3 часа</td>
        <td>30 мин</td>
        <td>15 мин</td>
        <td>1 час</td>
        <td>30 мин</td>
    </tr>
    <tr>
        <td>Продолжительность жизни</td>
        <td>10-15 лет</td>
        <td>12-18 лет</td>
        <td>3-5 лет</td>
        <td>5-10 лет</td>
        <td>2-3 года</td>
    </tr>
    <tr>
        <td>Стоимость</td>
        <td>Высокая</td>
        <td>Средняя</td>
        <td>Низкая</td>
        <td>Средняя</td>
        <td>Низкая</td>
    </tr>
</table>

<div class="consultation-banner">
    <h3>Нужна помощь с выбором?</h3>
    <p>Наши эксперты помогут подобрать идеального питомца под ваш образ жизни</p>
    <a href="contacts.php" class="btn-primary">Получить консультацию</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>