<?php
/**
 * Завдання 6.1: Шахова таблиця 9x4
 */
require_once __DIR__ . '/layout.php';

function generateStripedTable(int $rows, int $cols, string $color1, string $color2): string
{
    $html = "<table class='chessboard'>";
    for ($i = 0; $i < $rows; $i++) {
        $html .= "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $bgColor = (($i + $j) % 2 === 0) ? $color1 : $color2;
            $html .= "<td style='background-color:{$bgColor};'></td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}

$rows = 9;
$cols = 4;
$color1 = '#ffffffff';
$color2 = '#000000ff';

$table = generateStripedTable($rows, $cols, $color1, $color2);

$content = '
    <h1>🎨 Шахова таблиця ' . $rows . 'x' . $cols . '</h1>
    <div class="params">generateStripedTable(' . $rows . ', ' . $cols . ')</div>
    ' . $table;

renderVariantLayout($content, 'Завдання 6.1', 'task7-table-body');
