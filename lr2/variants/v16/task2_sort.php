<?php
/**
 * Завдання 2: Сортування міст за довжиною назви
 *
 * Варіант 30 (група C): за довжиною (від короткої до довгої),
 * при однаковій довжині — за алфавітом
 */
require_once __DIR__ . '/layout.php';

/**
 * Сортує міста за довжиною назви, при однаковій — за алфавітом
 */
function sortCitiesByLength(string $input): array
{
    $cities = array_filter(array_map('trim', explode(' ', $input)));

    usort($cities, function ($a, $b) {
        $lenA = strlen($a); // <-- ЗМІНЕНО ТУТ
        $lenB = strlen($b); // <-- ЗМІНЕНО ТУТ

        if ($lenA === $lenB) {
            return strcmp($a, $b);
        }

        return $lenA <=> $lenB;
    });

    return $cities;
}

// Вхідні дані (варіант 30)
$input = $_POST['cities'] ?? '';
$submitted = isset($_POST['cities']);
$defaultCities = 'Рені Сарни Харків Чернігів Кропивницький Мелітополь Бердянськ Ужгород';

if (!$submitted) {
    $input = $defaultCities;
}

$sorted = sortCitiesByLength($input);

ob_start();
?>
<div class="demo-card">
    <h2>Сортування міст (за довжиною)</h2>
    <p class="demo-subtitle">Введіть назви міст через пробіл</p>

    <form method="post" class="demo-form">
        <div>
            <label for="cities">Міста (через пробіл)</label>
            <input type="text" id="cities" name="cities" value="<?= htmlspecialchars($input) ?>" placeholder="Рені Сарни Харків">
        </div>
        <button type="submit" class="btn-submit">Сортувати</button>
    </form>

    <?php if (!empty($sorted)): ?>
    <div class="demo-section">
        <h3>Вхідні дані</h3>
        <div class="array-display">
            <?php foreach (array_filter(array_map('trim', explode(' ', $input))) as $city): ?>
            <span class="array-item"><?= htmlspecialchars($city) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="array-arrow">&#8595;</div>

    <div>
        <h3 class="demo-section-title-success">Відсортовані</h3>
        <div class="array-display">
            <?php foreach ($sorted as $city): ?>
            <span class="array-item array-item-unique"><?= htmlspecialchars($city) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="demo-code">sortCitiesByLength("<?= htmlspecialchars($input) ?>")
// usort() — сортування за довжиною + алфавіт
// Результат: [<?= htmlspecialchars(implode(', ', array_map(fn($c) => "\"$c\"", $sorted))) ?>]</div>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 2');