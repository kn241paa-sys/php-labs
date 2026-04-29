<?php
$getParams = $getParams ?? [];
$postParams = $postParams ?? [];
$method = $method ?? 'GET';
?>

<div class="reqview">

    <h1>Тест API галереї</h1>
    <p>Перевірка GET/POST запитів у системі віртуальної галереї мистецтва.</p>

    <div class="reqview-grid">

        <!-- POST -->
        <div class="reqview-section">

            <h2>Додати арт-роботу (POST)</h2>

            <p>Відправ тестові дані про нову роботу художника.</p>

            <form method="POST"
                  action="index.php?route=reqview/showrequest&source=form"
                  class="form">

                <div class="form__group">
                    <label class="form__label" for="post_title">Назва роботи</label>
                    <input class="form__input" type="text" id="post_title" name="title" placeholder="Cyber City">
                </div>

                <div class="form__group">
                    <label class="form__label" for="post_style">Стиль</label>
                    <input class="form__input" type="text" id="post_style" name="style" placeholder="Cyberpunk / Abstract">
                </div>

                <div class="form__group">
                    <label class="form__label" for="post_desc">Опис</label>
                    <textarea class="form__textarea" id="post_desc" name="description" rows="3"
                              placeholder="Опис арт-роботи..."></textarea>
                </div>

                <button class="btn" type="submit">Відправити POST</button>

            </form>
        </div>

        <!-- RESULT -->
        <div class="reqview-section">

            <h2>Результат запиту</h2>

            <p><strong>Метод:</strong> <code><?= htmlspecialchars($method) ?></code></p>

            <h3>GET параметри</h3>

            <?php if (empty($getParams)): ?>
                <p class="text-muted">Немає GET параметрів</p>
            <?php else: ?>
                <table class="table">
                    <tr>
                        <th>Параметр</th>
                        <th>Значення</th>
                    </tr>

                    <?php foreach ($getParams as $key => $value): ?>
                        <tr>
                            <td><code><?= htmlspecialchars($key) ?></code></td>
                            <td><?= htmlspecialchars(is_array($value)
                                ? json_encode($value, JSON_UNESCAPED_UNICODE)
                                : $value) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <h3>POST параметри</h3>

            <?php if (empty($postParams)): ?>
                <p class="text-muted">Немає POST параметрів</p>
            <?php else: ?>
                <table class="table">
                    <tr>
                        <th>Параметр</th>
                        <th>Значення</th>
                    </tr>

                    <?php foreach ($postParams as $key => $value): ?>
                        <tr>
                            <td><code><?= htmlspecialchars($key) ?></code></td>
                            <td><?= htmlspecialchars(is_array($value)
                                ? json_encode($value, JSON_UNESCAPED_UNICODE)
                                : $value) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

        </div>

    </div>
</div>