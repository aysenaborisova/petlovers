<?php
$pageTitle = 'Мои питомцы';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';

$user = getUserById($_SESSION['user_id']);
$pets = getPetsByUser($_SESSION['user_id']);

// Добавление питомца
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_pet'])) {
    $photo = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../assets/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . md5($_POST['name']) . '.' . $ext;
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $photo = '/assets/uploads/' . $fileName;
        }
    }
    addPet($_SESSION['user_id'], $_POST['name'], $_POST['species'], $_POST['breed'], $_POST['birth_date'], $photo);
    header('Location: profile.php');
    exit;
}

// Удаление питомца
if (isset($_GET['delete_pet'])) {
    deletePet($_GET['delete_pet']);
    header('Location: profile.php');
    exit;
}
?>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <img src="<?= $user['avatar'] ?? '/assets/images/default-avatar.jpg' ?>" alt="Аватар">
        </div>
        <div class="profile-info">
            <h1><?= h($user['name']) ?></h1>
            <p><strong>Email:</strong> <?= h($user['email']) ?></p>
            <p><strong>Телефон:</strong> <?= h($user['phone'] ?? 'не указан') ?></p>
            <p><strong>На сайте с:</strong> <?= date('d.m.Y', strtotime($user['created_at'] ?? 'now')) ?></p>
        </div>
    </div>

    <h2>Мои питомцы (<?= count($pets) ?>)</h2>

    <?php if(count($pets) > 0): ?>
        <div class="pets-list">
            <?php foreach($pets as $pet): ?>
                <div class="pet-card-item">
                    <div class="pet-photo">
                        <img src="<?= $pet['photo'] ?? '/assets/images/default-pet.jpg' ?>" alt="<?= h($pet['name']) ?>">
                    </div>
                    <div class="pet-info">
                        <h3><?= h($pet['name']) ?></h3>
                        <p><strong>Вид:</strong> <?= h($pet['species']) ?></p>
                        <p><strong>Порода:</strong> <?= h($pet['breed'] ?: 'не указана') ?></p>
                        <p><strong>Дата рождения:</strong> <?= h($pet['birth_date'] ?: 'не указана') ?></p>
                        <div class="pet-actions">
                            <a href="diary.php?pet_id=<?= $pet['id'] ?>" class="btn-small">📅 Дневник</a>
                            <a href="edit_pet.php?id=<?= $pet['id'] ?>" class="btn-small">✏️ Редактировать</a>
                            <a href="?delete_pet=<?= $pet['id'] ?>" class="btn-small btn-danger" onclick="return confirm('Удалить питомца?')">🗑 Удалить</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>У вас пока нет питомцев. Добавьте первого!</p>
    <?php endif; ?>

    <div class="add-pet-form">
        <h3>➕ Добавить питомца</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <input type="text" name="name" placeholder="Кличка" required>
                <input type="text" name="species" placeholder="Вид" required>
            </div>
            <div class="form-row">
                <input type="text" name="breed" placeholder="Порода">
                <input type="date" name="birth_date">
            </div>
            <div class="form-row">
                <input type="file" name="photo" accept="image/*">
            </div>
            <button type="submit" name="add_pet">Добавить питомца</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>