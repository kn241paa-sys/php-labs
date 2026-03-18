<?php
/**
 * Завдання 3: Визначення сезону та позиції місяця (if-else)
 *
 * Місяць 1 → "зима, середній місяць сезону"
 */
require_once __DIR__ . '/layout.php';

function determineSeason(int $month): string
{
    if ($month >= 3 && $month <= 5) {
        return "Весна";
    } elseif ($month >= 6 && $month <= 8) {
        return "Літо";
    } elseif ($month >= 9 && $month <= 11) {
        return "Осінь";
    } else {
        return "Зима";
    }
}

function monthPositionInSeason(int $month): string
{
    if ($month == 12 || $month == 3 || $month == 6 || $month == 9) {
        return "перший місяць сезону";
    } elseif ($month == 1 || $month == 4 || $month == 7 || $month == 10) {
        return "середній місяць сезону";
    } else {
        return "останній місяць сезону";
    }
}

// Вхідні дані
$month = 1;

$season = determineSeason($month);
$position = monthPositionInSeason($month);

$monthNames = [
    1 => "Січень", 2 => "Лютий", 3 => "Березень",
    4 => "Квітень", 5 => "Травень", 6 => "Червень",
    7 => "Липень", 8 => "Серпень", 9 => "Вересень",
    10 => "Жовтень", 11 => "Листопад", 12 => "Грудень"
];

$styles = [
    "Весна" => ["class" => "spring", "color" => "#10b981", "emoji" => "🌸"],
    "Літо" => ["class" => "summer", "color" => "#f59e0b", "emoji" => "☀️"],
    "Осінь" => ["class" => "autumn", "color" => "#f97316", "emoji" => "🍂"],
    "Зима" => ["class" => "winter", "color" => "#3b82f6", "emoji" => "❄️"],
];

$style = $styles[$season];

$content = '<div class="card large">
    <div class="season-emoji">' . $style['emoji'] . '</div>
    <div class="season-month" style="color:' . $style['color'] . '">Місяць ' . $month . '</div>
    <div class="season-month-name">' . $monthNames[$month] . '</div>
    <div class="season-result">' . $season . '</div>
    <div class="result mt-15"><strong>' . strtolower($season) . ', ' . $position . '</strong></div>
    <p class="info">determineSeason(' . $month . ') = "' . $season . '"</p>
    <p class="info">monthPositionInSeason(' . $month . ') = "' . $position . '"</p>
</div>';

renderVariantLayout($content, 'Завдання 3', 'task4-body ' . $style['class']);