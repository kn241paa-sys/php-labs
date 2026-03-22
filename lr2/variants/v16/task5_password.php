<?php
/**
 * Завдання 5: Генератор паролів
 *
 * Варіант 30: згенерувати 3 паролі, обрати найсильніший
 * Довжина: 14
 */
require_once __DIR__ . '/layout.php';

function generatePassword(int $length = 14): string
{
    $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lower = 'abcdefghijklmnopqrstuvwxyz';
    $digits = '0123456789';
    $special = '!@#$%^&*()-_=+';
    $all = $upper . $lower . $digits . $special;

    $password = '';

    // просто випадкові символи
    for ($i = 0; $i < $length; $i++) {
        $password .= $all[random_int(0, strlen($all) - 1)];
    }

    return $password;
}

function checkPasswordStrength(string $password): array
{
    $checks = [
        'length' => ['label' => 'Довжина >= 8 символів', 'passed' => (function_exists('mb_strlen') ? mb_strlen($password) : strlen($password)) >= 8],
        'upper' => ['label' => 'Містить велику літеру', 'passed' => (bool)preg_match('/[A-Z]/', $password)],
        'lower' => ['label' => 'Містить малу літеру', 'passed' => (bool)preg_match('/[a-z]/', $password)],
        'digit' => ['label' => 'Містить цифру', 'passed' => (bool)preg_match('/[0-9]/', $password)],
        'special' => ['label' => 'Містить спецсимвол', 'passed' => (bool)preg_match('/[^a-zA-Z0-9]/', $password)],
    ];

    $score = array_reduce($checks, fn(int $acc, array $check) => $acc + ($check['passed'] ? 1 : 0), 0);

    $strength = match (true) {
        $score <= 1 => 'weak',
        $score <= 2 => 'fair',
        $score <= 3 => 'good',
        default => 'strong',
    };

    $strengthLabels = [
        'weak' => 'Слабкий',
        'fair' => 'Задовільний',
        'good' => 'Добрий',
        'strong' => 'Надійний',
    ];

    return [
        'strength' => $strength,
        'strengthLabel' => $strengthLabels[$strength],
        'score' => $score,
        'total' => count($checks),
        'checks' => $checks,
    ];
}

// Обробка
$action = $_POST['action'] ?? '';
$genLength = 14; // фіксовано по завданню
$generatedList = [];
$bestPassword = '';
$bestStrength = null;

if ($action === 'generate') {

    // генеруємо 3 паролі
    for ($i = 0; $i < 3; $i++) {
        $pass = generatePassword($genLength);
        $strength = checkPasswordStrength($pass);

        $generatedList[] = [
            'password' => $pass,
            'strength' => $strength
        ];

        // шукаємо найкращий
        if ($bestStrength === null || $strength['score'] > $bestStrength['score']) {
            $bestPassword = $pass;
            $bestStrength = $strength;
        }
    }
}

ob_start();
?>
<div class="demo-card demo-card-wide">
    <h2>Генератор паролів</h2>
    <p class="demo-subtitle">Генерується 3 паролі, обирається найсильніший</p>

    <form method="post" class="demo-form">
        <input type="hidden" name="action" value="generate">
        <button type="submit" class="btn-submit">Згенерувати</button>
    </form>

    <?php if (!empty($generatedList)): ?>
    <div class="demo-section">
        <h3>Згенеровані паролі</h3>

        <?php foreach ($generatedList as $item): ?>
        <div class="demo-result">
            <div class="demo-result-value demo-mono"><?= htmlspecialchars($item['password']) ?></div>
            <div>Бал: <?= $item['strength']['score'] ?>/<?= $item['strength']['total'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="demo-section">
        <h3>Найсильніший пароль</h3>
        <div class="demo-result-value demo-mono"><?= htmlspecialchars($bestPassword) ?></div>
        <div>Бал: <?= $bestStrength['score'] ?>/<?= $bestStrength['total'] ?> (<?= htmlspecialchars($bestStrength['strengthLabel']) ?>)</div>
    </div>

    <div class="demo-code">generatePassword(14) x3
// Обрано пароль з максимальним score</div>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 5');