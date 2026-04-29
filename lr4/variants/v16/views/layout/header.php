<?php
$bgColor = $_SESSION['bg_color'] ?? '#0f1724';
$greetingName = is_string($_COOKIE['greeting_name'] ?? '') ? ($_COOKIE['greeting_name'] ?? '') : '';
$greetingGender = is_string($_COOKIE['greeting_gender'] ?? '') ? ($_COOKIE['greeting_gender'] ?? '') : '';

$greetingText = '';
if ($greetingName !== '') {
    $title = $greetingGender === 'female' ? 'пані' : 'пане';
    $greetingText = "Вітаємо Вас, {$title} " . htmlspecialchars($greetingName) . "!";
}

$currentRoute = $_GET['route'] ?? 'index/main';

$navItems = [
    'index/main' => 'Головна',
    'regform/form' => 'Реєстрація',
    'reqview/showrequest' => 'Параметри запиту',
    'settings/color' => 'Колір фону',
    'settings/greeting' => 'Привітання',
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Галерея') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
function hexToRgb(string $hex): array
{
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    }
    return [
        'r' => hexdec(substr($hex, 0, 2)),
        'g' => hexdec(substr($hex, 2, 2)),
        'b' => hexdec(substr($hex, 4, 2)),
    ];
}

function readableTextColor(string $hex): string
{
    $rgb = hexToRgb($hex);
    $brightness = ($rgb['r'] * 299 + $rgb['g'] * 587 + $rgb['b'] * 114) / 1000;
    return $brightness > 150 ? '#07101a' : '#f8f6f2';
}

$textColor = readableTextColor($bgColor);
?>

<body style="background: <?= htmlspecialchars($bgColor) ?>; color: <?= htmlspecialchars($textColor) ?>;">

<header class="header">
    <div class="container">

        <div class="header__inner">
            <a href="index.php" class="header__logo">Віртуальна галерея</a>

            <?php if ($greetingText !== ''): ?>
                <span class="header__greeting">
                    <?= $greetingText ?>
                </span>
            <?php endif; ?>
        </div>

        <nav class="nav">
            <ul class="nav__list">
                <?php foreach ($navItems as $route => $label): ?>
                    <li class="nav__item">
                        <a class="nav__link <?= $currentRoute === $route ? 'nav__link--active' : '' ?>"
                           href="index.php?route=<?= $route ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

    </div>
</header>

<main class="main">
    <div class="container">