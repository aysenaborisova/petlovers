<?php
$pageTitle = 'Главная';
require_once __DIR__ . '/site/bootstrap.php';
require_once __DIR__ . '/site/templates/head.php';
require_once __DIR__ . '/site/templates/header.php';
?>

<div class="hero">
    <h1>❝ Забота о ваших питомцах ❞</h1>
    <p>Советы экспертов, уход, воспитание и выбор питомца</p>
    <div class="hero-buttons">
        <a href="/site/compare.php" class="btn-primary">Подобрать питомца</a>
        <a href="/site/articles.php" class="btn-secondary">Советы по уходу</a>
    </div>
</div>

<div class="section">
    <h2 class="section-title">Популярные виды питомцев</h2>
    <div class="pets-grid">
        <div class="pet-card">
            <img src="/assets/images/dog.jpg" alt="Собаки">
            <h3>🐶 Собаки</h3>
            <p>Верные друзья, любят гулять</p>
            <a href="/site/articles.php">Подробнее</a>
        </div>
        <div class="pet-card">
            <img src="/assets/images/cat.jpg" alt="Кошки">
            <h3>🐱 Кошки</h3>
            <p>Независимые, подходят для квартиры</p>
            <a href="/site/articles.php">Подробнее</a>
        </div>
        <div class="pet-card">
            <img src="/assets/images/fish.jpg" alt="Рыбки">
            <h3>🐠 Рыбки</h3>
            <p>Спокойные, нужен аквариум</p>
            <a href="/site/articles.php">Подробнее</a>
        </div>
        <div class="pet-card">
            <img src="/assets/images/bird.jpg" alt="Птицы">
            <h3>🦜 Птицы</h3>
            <p>Общительные, любят общение</p>
            <a href="/site/articles.php">Подробнее</a>
        </div>
        <div class="pet-card">
            <img src="/assets/images/hamster.jpg" alt="Хомяки">
            <h3>🐹 Хомяки</h3>
            <p>Маленькие, активные ночью</p>
            <a href="/site/articles.php">Подробнее</a>
        </div>
    </div>
</div>

<div class="section bg-light">
    <h2 class="section-title">Популярные советы</h2>
    <div class="tips-grid">
        <div class="tip-card">
            <img src="/assets/images/feeding.jpg" alt="Питание">
            <h3>🥘 Питание</h3>
            <p>Сбалансированный рацион для здоровья</p>
            <a href="/site/articles.php">Читать →</a>
        </div>
        <div class="tip-card">
            <img src="/assets/images/health.jpg" alt="Здоровье">
            <h3>🏥 Здоровье</h3>
            <p>Прививки и профилактика болезней</p>
            <a href="/site/articles.php">Читать →</a>
        </div>
        <div class="tip-card">
            <img src="/assets/images/training.jpg" alt="Воспитание">
            <h3>🎯 Воспитание</h3>
            <p>Дрессировка и воспитание с любовью</p>
            <a href="/site/articles.php">Читать →</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/site/templates/footer.php'; ?>