<?php
/**
 * Завдання 2: Конвертер валют (USD → UAH)
 *
 * 485 доларів → грн, курс 40.35
 */
require_once __DIR__ . '/layout.php';

function convertUsdToUah(float $usd, float $rate): float
{
    return round($usd * $rate, 2);
}

// Вхідні дані
$usd = 485;
$rate = 40.35;

$uah = convertUsdToUah($usd, $rate);

$content = '<div class="card">
    <h2>💵 Конвертер USD → UAH</h2>
    <p><strong>Курс:</strong> 1 долар = ' . $rate . ' грн</p>
    <div class="result">' . $usd . ' доларів можна обміняти на ' . $uah . ' грн</div>
    <p class="info">convertUsdToUah(' . $usd . ', ' . $rate . ') = ' . $uah . '</p>
</div>';

renderVariantLayout($content, 'Завдання 2', 'task3-body');