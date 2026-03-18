<?php
/**
 * Кола: 12 синіх кіл на білому тлі (по 5 у рядок)
 */
require_once __DIR__ . '/layout.php';

function generateCircles(int $n, int $perRow = 5): string
{
    $html = "<div style='background-color:white; display:grid; grid-template-columns:repeat(" . $perRow . ", 50px); gap:80px; padding:100px; width:max-content;'>";

    for ($i = 0; $i < $n; $i++) {
        $html .= "<div style='width:100px;
        height:100px;
        background-color:#330bc1ff;
        border-radius:50%;'>
        </div>";
    }

    $html .= "</div>";
    return $html;
}

$n = 12;
$circles = generateCircles($n, 5);

$content = $circles . '
    <div class="circles-func">generateCircles(' . $n . ', 5)</div>
    <div class="circles-counter">Кіл: ' . $n . '</div>';

renderVariantLayout($content, 'Завдання 6.2', 'task7-circles-body');