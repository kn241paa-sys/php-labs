<?php
/**
 * Завдання 2: Конвертер валют (UAH → EUR)
 *
 * 48600 грн → євро, курс 47.50, комісія 3%
 */
require_once __DIR__ . '/layout.php';

function convertUsdToUah(float $usd, float $rate): float
{
    return round($usd * $rate, 2);
}

function applyCommission(float $amount, float $commissionPercent): float
{
    return round($amount * (1 - $commissionPercent / 100), 2);
}

// Вхідні дані (варіант 30)
$usd = 485;
$rate = 40.35;

$uah = convertUsdToUah($usd, $rate);

$content = '<div class="card">
    <h2>💶 Конвертер UAH → EUR</h2>
    <p><strong>Курс:</strong> 1 EUR = ' . $rate . ' грн</p>
    <p><strong>Комісія банку:</strong> ' . $commission . '%</p>
    <div class="result">' . $uah . ' грн = ' . $eurBeforeCommission . ' євро</div>
    <div class="result" style="margin-top:10px;background:#d1fae5;">Після комісії ' . $commission . '% — <strong>' . $eurAfterCommission . '</strong> євро</div>
    <p class="info">convertUahToEur(' . $uah . ', ' . $rate . ') = ' . $eurBeforeCommission . '</p>
    <p class="info">applyCommission(' . $eurBeforeCommission . ', ' . $commission . ') = ' . $eurAfterCommission . '</p>
</div>';

renderVariantLayout($content, 'Завдання 2', 'task3-body');
