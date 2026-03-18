<?php
/**
 * Завдання 4: Тип символу (switch)
 *
 * Символ 'ю' → "голосна"
 */
require_once __DIR__ . '/layout.php';

function isVowelOrConsonant(string $letter): string
{
    switch ($letter) {
        // українські голосні
        case 'а':
        case 'е':
        case 'є':
        case 'и':
        case 'і':
        case 'ї':
        case 'о':
        case 'у':
        case 'ю':
        case 'я':
            return "голосна";

        // спеціальні символи
        case 'ь':
        case '\'':
            return "спеціальний символ";

        default:
            return "приголосна";
    }
}

// Вхідні дані
$letter = 'ю';

$result = isVowelOrConsonant($letter);
$isVowel = $result === "голосна";

$color = $isVowel ? "#10b981" : "#8b5cf6";
$emoji = $isVowel ? "🔊" : "🔇";

$content = '<div class="card large">
    <div class="letter-display" style="color:' . $color . '">' . $letter . '</div>
    <div class="letter-emoji" style="color:' . $color . '">' . $emoji . '</div>
    <div class="letter-result">
        Символ <strong>\'' . $letter . '\'</strong> — <span style="color:' . $color . '">' . $result . '</span>
    </div>
    <p class="info">isVowelOrConsonant(\'' . $letter . '\') = "' . $result . '"</p>
</div>';

renderVariantLayout($content, 'Завдання 4', 'task5-body');