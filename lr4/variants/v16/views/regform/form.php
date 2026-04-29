<h1>Реєстрація художника</h1>
<p>Створіть профіль для публікації своїх робіт у галереї.</p>

<form method="POST" class="form">

<div class="form__group">
    <label class="form__label">Ім'я художника</label>
    <input type="text" name="login" class="form__input"
           value="<?= htmlspecialchars($old['login'] ?? '') ?>">
    <?php if (!empty($errors['login'])): ?>
        <div class="alert alert--error"><?= $errors['login'] ?></div>
    <?php endif; ?>
</div>

<div class="form__group">
    <label class="form__label">Пароль доступу</label>
    <input type="password" name="password" class="form__input">
</div>

<div class="form__group">
    <label class="form__label">Підтвердження</label>
    <input type="password" name="password_confirm" class="form__input">
</div>

<div class="form__group">
    <label class="form__label">Про художника</label>
    <textarea name="about" class="form__textarea"></textarea>
</div>

<button class="btn">Створити профіль</button>

</form>