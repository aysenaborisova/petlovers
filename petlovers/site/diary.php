<?php
$pageTitle = 'Дневник питомца';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';

$petId = $_GET['pet_id'] ?? 0;
$pet = getPetById($petId);
if (!$pet || $pet['user_id'] != $_SESSION['user_id']) {
    redirect('profile.php');
}

$records = getRecordsByPet($petId);

// Добавление записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_record'])) {
    addRecord($petId, $_POST['date'], $_POST['type'], $_POST['note']);
    header("Location: diary.php?pet_id=$petId");
    exit;
}

// Удаление записи
if (isset($_GET['delete_record'])) {
    deleteRecord($_GET['delete_record']);
    header("Location: diary.php?pet_id=$petId");
    exit;
}
?>

<div class="diary-container">
    <div class="pet-header">
        <div class="pet-avatar">
            <img src="<?= $pet['photo'] ?? '/assets/images/default-pet.jpg' ?>" alt="<?= h($pet['name']) ?>">
        </div>
        <div class="pet-details">
            <h2><?= h($pet['name']) ?></h2>
            <p><strong>Вид:</strong> <?= h($pet['species']) ?></p>
            <p><strong>Порода:</strong> <?= h($pet['breed'] ?: 'не указана') ?></p>
            <p><strong>Дата рождения:</strong> <?= h($pet['birth_date'] ?: 'не указана') ?></p>
            <a href="profile.php" class="btn-small">← Назад к питомцам</a>
        </div>
    </div>

    <div class="add-record-form">
        <h3>➕ Добавить запись</h3>
        <form method="POST">
            <input type="date" name="date" required>
            <select name="type" required>
                <option value="Прививка">Прививка</option>
                <option value="Вес">Вес</option>
                <option value="Прогулка">Прогулка</option>
                <option value="Обработка">Обработка</option>
                <option value="Визит к врачу">Визит к врачу</option>
                <option value="Другое">Другое</option>
            </select>
            <textarea name="note" placeholder="Заметка" rows="3" required></textarea>
            <button type="submit" name="add_record">Добавить</button>
        </form>
    </div>

    <div class="diary-section">
        <h3>📅 Записи дневника</h3>
        <?php if(count($records) > 0): ?>
            <ul class="diary-list">
                <?php foreach($records as $record): ?>
                    <li>
                        <strong><?= date('d.m.Y', strtotime($record['date'])) ?></strong> —
                        <?= h($record['type']) ?>: <?= h($record['note']) ?>
                        <div class="record-actions">
                            <a href="edit_record.php?pet_id=<?= $petId ?>&record_id=<?= $record['id'] ?>" class="edit-link">✏️</a>
                            <a href="?pet_id=<?= $petId ?>&delete_record=<?= $record['id'] ?>" class="delete-link" onclick="return confirm('Удалить запись?')">❌</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Пока нет записей. Добавьте первую!</p>
        <?php endif; ?>
    </div>
</div>

<style>
.record-actions {
    display: inline-block;
    margin-left: 15px;
}
.edit-link, .delete-link {
    text-decoration: none;
    margin: 0 3px;
}
.edit-link:hover, .delete-link:hover {
    opacity: 0.7;
}
</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>