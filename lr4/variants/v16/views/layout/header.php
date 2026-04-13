<?php
$bg = $_SESSION['bg_color'] ?? '#ffffff';
$name = $_COOKIE['name'] ?? '';
$gender = $_COOKIE['gender'] ?? '';

$greet = '';
if ($name) {
    $greet = $gender === 'female' ? "пані $name" : "пане $name";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $pageTitle ?></title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background: <?= $bg ?>">

<header>
<h2>Віртуальна галерея</h2>

<?php if($greet): ?>
<p>Вітаємо Вас, <?= $greet ?>!</p>
<?php endif; ?>

<nav>
<a href="index.php">Головна</a>
<a href="index.php?route=regform/form">Реєстрація</a>
<a href="index.php?route=reqview/showrequest">Запит</a>
<a href="index.php?route=settings/color">Колір</a>
<a href="index.php?route=settings/greeting">Cookie</a>
</nav>
</header>

<main>