<?php
/**
 * Завдання 1: Форматований текст
 *
 * Вірш про художника з форматуванням: <b>, <i>, margin-left
 */
require_once __DIR__ . '/layout.php';

ob_start();
?>
<div class="poem">
    <?php
    echo "<p style='margin-left: 20px;'>Програмісти <b>творять</b> нові світи,</p>";
    echo "<p style='margin-left: 20px;'>Рядки коду мерехтять <i>яскраво</i>,</p>";
    echo "<p style='margin-left: 20px;'>Алгоритми розв'язують задачі,</p>";
    echo "<p style='margin-left: 20px;'>І технології змінюють державу.</p>";
    ?>
</div>
<?php
$content = ob_get_clean();

renderVariantLayout($content, 'Завдання 1', 'task2-body');
