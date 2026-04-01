<?php
/**
 * Завдання 1: Створення класів та об'єктів
 *
 * Клас Game із властивостями: title, genre, rating
 */

require_once __DIR__ . '/layout.php';

class Game {
    public $title;
    public $genre;
    public $rating;
}

// Створюємо 3 об'єкти
$game1 = new Game();
$game1->title = 'The Witcher 3';
$game1->genre = 'RPG';
$game1->rating = 9.5;

$game2 = new Game();
$game2->title = 'Cyberpunk 2077';
$game2->genre = 'RPG';
$game2->rating = 8.6;

$game3 = new Game();
$game3->title = 'S.T.A.L.K.E.R. 2';
$game3->genre = 'Shooter';
$game3->rating = 8.2;

$games = [
    ['obj' => $game1, 'avatar' => 'avatar-indigo', 'initial' => 'T'],
    ['obj' => $game2, 'avatar' => 'avatar-green', 'initial' => 'C'],
    ['obj' => $game3, 'avatar' => 'avatar-amber', 'initial' => 'S'],
];

ob_start();
?>

<div class="task-header">
    <h1>Створення об'єктів</h1>
    <p>Клас <code>Game</code> з властивостями: title, genre, rating</p>
</div>

<div class="section-divider">
    <span class="section-divider-text">3 об'єкти</span>
</div>

<div class="users-grid">
    <?php foreach ($games as $i => $data): ?>
    <div class="user-card">
        <div class="user-card-header">
            <div class="user-card-avatar <?= $data['avatar'] ?>">
                <?= $data['initial'] ?>
            </div>
            <div>
                <div class="user-card-name">
                    <?= htmlspecialchars($data['obj']->title) ?>
                </div>
                <div class="user-card-label">
                    Об'єкт #<?= $i + 1 ?>
                </div>
            </div>
        </div>

        <div class="user-card-body">
            <div class="user-card-field">
                <span class="user-card-field-label">title</span>
                <span class="user-card-field-value">
                    <?= htmlspecialchars($data['obj']->title) ?>
                </span>
            </div>

            <div class="user-card-field">
                <span class="user-card-field-label">genre</span>
                <span class="user-card-field-value">
                    <?= htmlspecialchars($data['obj']->genre) ?>
                </span>
            </div>

            <div class="user-card-field">
                <span class="user-card-field-label">rating</span>
                <span class="user-card-field-value">
                    <?= $data['obj']->rating ?>
                </span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 1', 'task1-body');