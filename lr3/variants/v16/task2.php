<?php
/**
 * Завдання 2: Метод getInfo()
 *
 * Клас Game + метод getInfo()
 */

require_once __DIR__ . '/layout.php';

class Game {
    public $title;
    public $genre;
    public $rating;

    public function getInfo(): string {
        return "Гра: {$this->title}, Жанр: {$this->genre}, Рейтинг: {$this->rating}";
    }
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

$games = [$game1, $game2, $game3];
$labels = ['$game1', '$game2', '$game3'];

ob_start();
?>

<div class="task-header">
    <h1>Метод getInfo()</h1>
    <p>Виводить значення властивостей об'єкта</p>
</div>

<div class="code-block"><span class="code-comment">// Метод getInfo()</span>
<span class="code-keyword">public function</span> <span class="code-method">getInfo</span>(): <span class="code-class">string</span>
{
    <span class="code-keyword">return</span> <span class="code-string">"Гра: {$this->title}, Жанр: {$this->genre}, Рейтинг: {$this->rating}"</span>;
}

<span class="code-comment">// Виклик</span>
<span class="code-variable">$game1</span><span class="code-arrow">-></span><span class="code-method">getInfo</span>();</div>

<div class="section-divider">
    <span class="section-divider-text">Результат виклику</span>
</div>

<div class="info-output">
    <div class="info-output-header">getInfo() — вивід для кожного об'єкта</div>
    <div class="info-output-body">
        <?php foreach ($games as $i => $game): ?>
        <div class="info-output-row">
            <span class="info-output-label"><?= $labels[$i] ?></span>
            <span class="info-output-text"><?= htmlspecialchars($game->getInfo()) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="section-divider">
    <span class="section-divider-text">Картки ігор</span>
</div>

<div class="users-grid">
    <?php
    $avatars = ['avatar-indigo', 'avatar-green', 'avatar-amber'];
    $initials = ['T', 'C', 'S'];
    foreach ($games as $i => $game):
    ?>
    <div class="user-card">
        <div class="user-card-header">
            <div class="user-card-avatar <?= $avatars[$i] ?>"><?= $initials[$i] ?></div>
            <div>
                <div class="user-card-name"><?= htmlspecialchars($game->title) ?></div>
                <div class="user-card-label"><?= $labels[$i] ?>->getInfo()</div>
            </div>
        </div>
        <div class="user-card-body">
            <div class="user-card-field">
                <span class="user-card-field-label">title</span>
                <span class="user-card-field-value"><?= htmlspecialchars($game->title) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">genre</span>
                <span class="user-card-field-value"><?= htmlspecialchars($game->genre) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">rating</span>
                <span class="user-card-field-value"><?= $game->rating ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 2', 'task2-body');