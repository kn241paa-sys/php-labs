<?php
/**
 * Завдання 3: Конструктор
 *
 * Клас Game + конструктор
 */

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

// Створюємо об'єкти через конструктор
$game1 = new Game('The Witcher 3', 'RPG', 9.5);
$game2 = new Game('Cyberpunk 2077', 'RPG', 8.6);
$game3 = new Game('S.T.A.L.K.E.R. 2', 'Shooter', 8.2);

$games = [
    ['obj' => $game1, 'avatar' => 'avatar-indigo', 'initial' => 'T', 'var' => '$game1'],
    ['obj' => $game2, 'avatar' => 'avatar-green', 'initial' => 'C', 'var' => '$game2'],
    ['obj' => $game3, 'avatar' => 'avatar-amber', 'initial' => 'S', 'var' => '$game3'],
];

ob_start();
?>

<div class="task-header">
    <h1>Конструктор</h1>
    <p>Початкові значення задаються одразу при створенні об'єкта</p>
</div>

<div class="code-block"><span class="code-comment">// Конструктор класу Game</span>
<span class="code-keyword">public function</span> <span class="code-method">__construct</span>(<span class="code-class">string</span> <span class="code-variable">$title</span>, <span class="code-class">string</span> <span class="code-variable">$genre</span>, <span class="code-class">float</span> <span class="code-variable">$rating</span>)
{
    <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">title</span> = <span class="code-variable">$title</span>;
    <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">genre</span> = <span class="code-variable">$genre</span>;
    <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">rating</span> = <span class="code-variable">$rating</span>;
}

<span class="code-comment">// Створення через конструктор</span>
<span class="code-variable">$game1</span> = <span class="code-keyword">new</span> <span class="code-class">Game</span>(<span class="code-string">'The Witcher 3'</span>, <span class="code-string">'RPG'</span>, <span class="code-string">9.5</span>);
<span class="code-variable">$game2</span> = <span class="code-keyword">new</span> <span class="code-class">Game</span>(<span class="code-string">'Cyberpunk 2077'</span>, <span class="code-string">'RPG'</span>, <span class="code-string">8.6</span>);
<span class="code-variable">$game3</span> = <span class="code-keyword">new</span> <span class="code-class">Game</span>(<span class="code-string">'S.T.A.L.K.E.R. 2'</span>, <span class="code-string">'Shooter'</span>, <span class="code-string">8.2</span>);</div>

<div class="section-divider">
    <span class="section-divider-text">Об'єкти створені через конструктор</span>
</div>

<div class="users-grid">
    <?php foreach ($games as $data): ?>
    <div class="user-card">
        <div class="user-card-header">
            <div class="user-card-avatar <?= $data['avatar'] ?>"><?= $data['initial'] ?></div>
            <div>
                <div class="user-card-name"><?= htmlspecialchars($data['obj']->title) ?></div>
                <div class="user-card-label"><?= $data['var'] ?> <span class="user-card-badge badge-constructor">constructor</span></div>
            </div>
        </div>
        <div class="user-card-body">
            <div class="user-card-field">
                <span class="user-card-field-label">title</span>
                <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->title) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">genre</span>
                <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->genre) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">rating</span>
                <span class="user-card-field-value"><?= $data['obj']->rating ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="section-divider">
    <span class="section-divider-text">getInfo() для кожного</span>
</div>

<div class="info-output">
    <div class="info-output-header">Виклик getInfo() для об'єктів, створених через конструктор</div>
    <div class="info-output-body">
        <?php foreach ($games as $data): ?>
        <div class="info-output-row">
            <span class="info-output-label"><?= $data['var'] ?></span>
            <span class="info-output-text"><?= htmlspecialchars($data['obj']->getInfo()) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 3', 'task3-body');