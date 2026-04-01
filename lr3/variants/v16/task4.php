<?php
require_once __DIR__ . '/layout.php';

class Game {
    public $title;
    public $genre;
    public $rating;

    public function __construct(string $title, string $genre, float $rating) {
        $this->title = $title;
        $this->genre = $genre;
        $this->rating = $rating;
    }

    public function getInfo(): string {
        return "Гра: {$this->title}, Жанр: {$this->genre}, Рейтинг: {$this->rating}";
    }
}

$game3 = new Game('S.T.A.L.K.E.R. 2', 'Shooter', 8.2);
$game4 = clone $game3;

ob_start();
?>

<div class="task-header">
    <h1>Клонування</h1>
</div>

<div class="section-divider">
    <span class="section-divider-text">Оригінал vs Клон</span>
</div>

<div class="comparison-wrapper">
    <div class="users-grid">
        <div class="user-card">
            <div class="user-card-header">
                <div class="user-card-avatar avatar-amber">S</div>
                <div>
                    <div class="user-card-name"><?= htmlspecialchars($game3->title) ?></div>
                    <div class="user-card-label">$game3</div>
                </div>
            </div>
            <div class="user-card-body">
                <div class="user-card-field">
                    <span class="user-card-field-label">title</span>
                    <span class="user-card-field-value"><?= htmlspecialchars($game3->title) ?></span>
                </div>
                <div class="user-card-field">
                    <span class="user-card-field-label">genre</span>
                    <span class="user-card-field-value"><?= htmlspecialchars($game3->genre) ?></span>
                </div>
                <div class="user-card-field">
                    <span class="user-card-field-label">rating</span>
                    <span class="user-card-field-value"><?= $game3->rating ?></span>
                </div>
            </div>
        </div>

        <div class="user-card">
            <div class="user-card-header">
                <div class="user-card-avatar avatar-rose">S</div>
                <div>
                    <div class="user-card-name"><?= htmlspecialchars($game4->title) ?></div>
                    <div class="user-card-label">$game4</div>
                </div>
            </div>
            <div class="user-card-body">
                <div class="user-card-field">
                    <span class="user-card-field-label">title</span>
                    <span class="user-card-field-value"><?= htmlspecialchars($game4->title) ?></span>
                </div>
                <div class="user-card-field">
                    <span class="user-card-field-label">genre</span>
                    <span class="user-card-field-value"><?= htmlspecialchars($game4->genre) ?></span>
                </div>
                <div class="user-card-field">
                    <span class="user-card-field-label">rating</span>
                    <span class="user-card-field-value"><?= $game4->rating ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-divider">
    <span class="section-divider-text">getInfo()</span>
</div>

<div class="info-output">
    <div class="info-output-body">
        <div class="info-output-row">
            <span class="info-output-label">$game3</span>
            <span class="info-output-text"><?= htmlspecialchars($game3->getInfo()) ?></span>
        </div>
        <div class="info-output-row">
            <span class="info-output-label">$game4</span>
            <span class="info-output-text"><?= htmlspecialchars($game4->getInfo()) ?></span>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 4', 'task4-body');