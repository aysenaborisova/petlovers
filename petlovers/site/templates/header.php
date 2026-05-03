<header>
    <div class="logo">
        <img src="/assets/images/default-pet.jpg" alt="PetLovers" class="logo-img">
        <span><?= h(APP_NAME) ?></span>
    </div>
    <nav>
        <a href="/index.php">Главная</a>
        <a href="/site/articles.php">Статьи</a>
        <a href="/site/compare.php">Выбор</a>
        <a href="/site/profile.php">Мои питомцы</a>
        <a href="/site/contacts.php">Контакты</a>
        <?php if (isLoggedIn()): ?>
            <img src="/assets/images/default-avatar.jpg" alt="Аватар" class="user-avatar">
            <span class="user-name"><?= h($_SESSION['user_name']) ?></span>
            <a href="/logout.php" class="btn-logout">Выход</a>
        <?php else: ?>
            <a href="/login.php" class="btn-login">Вход</a>
            <a href="/register.php" class="btn-reg">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>
<main>