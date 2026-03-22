<?php
/**
 * Завдання 6: Пошук унікальних елементів
 *
 * Варіант 30: елементи, що зустрічаються 1 раз
 */
require_once __DIR__ . '/layout.php';

/**
 * Знаходить унікальні елементи (які зустрічаються 1 раз)
 */
function findUnique(array $arr): array
{
    if (empty($arr)) {
        return [];
    }

    $counts = array_count_values($arr);

    return array_keys(array_filter($counts, fn($count) => $count === 1));
}

// Обробка форми
$input = $_POST['array'] ?? '6, 10, 3, 15, 6, 10, 1, 3, 12, 15, 8, 4';
$submitted = isset($_POST['array']);

$arr = array_map('trim', explode(',', $input));
$arr = array_filter($arr, fn($v) => $v !== '');

$unique = findUnique($arr);

ob_start();
?>
<div class="demo-card">
    <h2>Унікальні елементи</h2>
    <p class="demo-subtitle">Знаходить елементи, що зустрічаються тільки 1 раз</p>

    <form method="post" class="demo-form">
        <div>
            <label for="array">Масив (через кому)</label>
            <input type="text" id="array" name="array" value="<?= htmlspecialchars($input) ?>" placeholder="1, 4, 1, 1, 6">
        </div>
        <button type="submit" class="btn-submit">Знайти</button>
    </form>

    <?php if (!empty($arr)): ?>
    <div class="demo-section">
        <h3>Вхідний масив</h3>
        <div class="array-display">
            <?php foreach ($arr as $item): ?>
            <span class="array-item <?= in_array($item, $unique) ? 'array-item-unique' : '' ?>"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (!empty($unique)): ?>
    <div class="demo-result">
        <h3>Унікальні елементи</h3>
        <div class="demo-result-value"><?= htmlspecialchars(implode(', ', $unique)) ?></div>
    </div>

    <div class="demo-section">
        <h3>Частота елементів</h3>
        <table class="demo-table">
            <thead>
                <tr>
                    <th>Елемент</th>
                    <th>Кількість</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counts = array_count_values($arr);
                arsort($counts);
                foreach ($counts as $value => $count):
                ?>
                <tr>
                    <td><?= htmlspecialchars($value) ?></td>
                    <td><?= $count ?></td>
                    <td>
                        <?php if ($count === 1): ?>
                        <span class="demo-tag demo-tag-success">Унікальний</span>
                        <?php else: ?>
                        <span class="demo-tag demo-tag-primary"><?= $count ?>×</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="demo-result demo-result-info">
        <h3>Результат</h3>
        <div class="demo-result-value">Унікальних елементів немає</div>
    </div>
    <?php endif; ?>

    <div class="demo-code">findUnique([<?= htmlspecialchars(implode(', ', $arr)) ?>])
// Результат: [<?= htmlspecialchars(implode(', ', $unique)) ?>]</div>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 6');