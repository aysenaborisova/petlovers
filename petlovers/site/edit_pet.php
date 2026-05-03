<?php
$pageTitle = 'Редактировать питомца';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/templates/head.php';
require_once __DIR__ . '/templates/header.php';

$petId = $_GET['id'] ?? 0;
$pet = getPetById($petId);
if (!$pet || $pet['user_id'] != $_SESSION['user_id']) {
    redirect('profile.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = $pet['photo'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../assets/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . md5($pet['name']) . '.' . $ext;
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $photo = '/assets/uploads/' . $fileName;
        }
    }
    updatePet($petId, $_POST['name'], $_POST['species'], $_POST['breed'], $_POST['birth_date'], $photo);
    redirect('profile.php');
}
?>

<div class="form-container">
    <h2>Редактировать питомца</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= h($pet['name']) ?>" required>
        <input type="text" name="species" value="<?= h($pet['species']) ?>" required>
        <input type="text" name="breed" value="<?= h($pet['breed']) ?>" placeholder="Порода">
        <input type="date" name="birth_date" value="<?= h($pet['birth_date']) ?>">
        <input type="file" name="photo" accept="image/*">
        <?php if($pet['photo']): ?>
            <img src="<?= $pet['photo'] ?>" alt="Фото" width="100">
        <?php endif; ?>
        <button type="submit">Сохранить</button>
        <a href="profile.php" class="btn-cancel">Отмена</a>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>