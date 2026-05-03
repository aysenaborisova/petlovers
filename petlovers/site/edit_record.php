<?php
$pageTitle = 'Редактировать запись';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';

$petId = $_GET['pet_id'] ?? 0;
$recordId = $_GET['record_id'] ?? 0;

$pet = getPetById($petId);
if (!$pet || $pet['user_id'] != $_SESSION['user_id']) {
    redirect('profile.php');
}

global $pdo;
$stmt = $pdo->prepare("SELECT * FROM records WHERE id = ? AND pet_id = ?");
$stmt->execute([$recordId, $petId]);
$record = $stmt->fetch();

if (!$record) {
    redirect("diary.php?pet_id=$petId");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE records SET date = ?, type = ?, note = ? WHERE id = ?");
    $stmt->execute([$_POST['date'], $_POST['type'], $_POST['note'], $recordId]);
    redirect("diary.php?pet_id=$petId");
}
?>

<div class="form-container">
    <h2>Редактировать запись</h2>
    <form method="POST">
        <input type="date" name="date" value="<?= $record['date'] ?>" required>
        <select name="type" required>
            <option value="Прививка" <?= $record['type'] == 'Прививка' ? 'selected' : '' ?>>Прививка</option>
            <option value="Вес" <?= $record['type'] == 'Вес' ? 'selected' : '' ?>>Вес</option>
            <option value="Прогулка" <?= $record['type'] == 'Прогулка' ? 'selected' : '' ?>>Прогулка</option>
            <option value="Обработка" <?= $record['type'] == 'Обработка' ? 'selected' : '' ?>>Обработка</option>
            <option value="Визит к врачу" <?= $record['type'] == 'Визит к врачу' ? 'selected' : '' ?>>Визит к врачу</option>
            <option value="Другое" <?= $record['type'] == 'Другое' ? 'selected' : '' ?>>Другое</option>
        </select>
        <textarea name="note" rows="4" required><?= h($record['note']) ?></textarea>
        <button type="submit">Сохранить</button>
        <a href="diary.php?pet_id=<?= $petId ?>" class="btn-cancel">Отмена</a>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>