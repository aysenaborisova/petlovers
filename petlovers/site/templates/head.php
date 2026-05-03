<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h(APP_NAME) ?> - <?= h($pageTitle ?? 'Главная') ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/icons/favicon.ico">
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <?php if(isset($pageCSS)): ?>
        <link rel="stylesheet" href="/assets/pages/<?= $pageCSS ?>">
    <?php endif; ?>
</head>
<body>