<?php
$pageTitle = 'Контакты';
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';
?>

<h1 class="page-title">📞 Контакты</h1>

<div class="contacts-container">
    <div class="contacts-info">
        <p><strong>Телефон:</strong> +7 (800) 555-12-34</p>
        <p><strong>Email:</strong> hello@petlovers.ru</p>
        <p><strong>Адрес:</strong> Москва, ул. Домашняя 15</p>
        <p><strong>Режим работы:</strong> Пн-Пт 10:00-20:00</p>
        
        <h3>🌐 Мы в соцсетях</h3>
        <div class="social-links">
            <a href="#">ВКонтакте</a>
            <a href="#">Telegram</a>
            <a href="#">YouTube</a>
            <a href="#">Instagram</a>
        </div>
    </div>
    
    <div class="contacts-form">
        <h3>Напишите нам</h3>
        <form method="POST">
            <input type="text" name="name" placeholder="Ваше имя" required>
            <input type="email" name="email" placeholder="Ваш Email" required>
            <textarea name="message" rows="5" placeholder="Ваше сообщение" required></textarea>
            <button type="submit" class="btn-primary">Отправить</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>