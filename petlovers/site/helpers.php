<?php
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: " . APP_URL . "/" . ltrim($url, '/'));
    exit;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        redirect('login.php');
    }
}

function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getUserByEmail($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function getPetsByUser($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE user_id = ? ORDER BY name");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

function getPetById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getRecordsByPet($petId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM records WHERE pet_id = ? ORDER BY date DESC");
    $stmt->execute([$petId]);
    return $stmt->fetchAll();
}

function addRecord($petId, $date, $type, $note) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO records (pet_id, date, type, note) VALUES (?, ?, ?, ?)");
    $stmt->execute([$petId, $date, $type, $note]);
}

function deleteRecord($recordId) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM records WHERE id = ?");
    $stmt->execute([$recordId]);
}

function addPet($userId, $name, $species, $breed, $birthDate, $photo = null) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO pets (user_id, name, species, breed, birth_date, photo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $name, $species, $breed, $birthDate, $photo]);
    return $pdo->lastInsertId();
}

function updatePet($petId, $name, $species, $breed, $birthDate, $photo = null) {
    global $pdo;
    if ($photo) {
        $stmt = $pdo->prepare("UPDATE pets SET name = ?, species = ?, breed = ?, birth_date = ?, photo = ? WHERE id = ?");
        $stmt->execute([$name, $species, $breed, $birthDate, $photo, $petId]);
    } else {
        $stmt = $pdo->prepare("UPDATE pets SET name = ?, species = ?, breed = ?, birth_date = ? WHERE id = ?");
        $stmt->execute([$name, $species, $breed, $birthDate, $petId]);
    }
}

function deletePet($petId) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM pets WHERE id = ?");
    $stmt->execute([$petId]);
}