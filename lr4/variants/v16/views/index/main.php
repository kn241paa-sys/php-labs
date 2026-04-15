<div class="page-home">
    <section class="hero">
        <h1>Віртуальна галерея мистецтва</h1>

        <p class="page-home__subtitle">
            Ласкаво просимо до цифрової галереї сучасного мистецтва, концептів та 3D-візуалізацій.
        </p>

        <p class="hero__lead">
            Тут зібрані роботи молодих та досвідчених авторів — від неонових пейзажів до абстрактних
            експериментів. Ви можете створити профіль художника, додавати роботи, тестувати запити
            до API та налаштовувати вигляд галереї. Інтерфейс адаптується під темний фон для кращої
            презентації робіт та комфортного перегляду вночі.
        </p>
    </section>

    <div class="card-grid">

        <div class="card">
            <h3 class="card__title">Популярні роботи</h3>
            <p class="card__text">
                Добірка найкращих digital-art робіт: неон, cyberpunk, абстракція.
            </p>
        </div>

        <div class="card">
            <h3 class="card__title">Реєстрація художника</h3>
            <p class="card__text">
                Створіть профіль, щоб завантажувати власні роботи.
            </p>
            <a href="index.php?route=regform/form" class="btn">
                Зареєструватися
            </a>
        </div>

        <div class="card">
            <h3 class="card__title">API / Запити</h3>
            <p class="card__text">
                Перегляд GET та POST даних системи.
            </p>
            <a href="index.php?route=reqview/showrequest" class="btn">
                Перейти
            </a>
        </div>

        <div class="card">
            <h3 class="card__title">Налаштування</h3>
            <p class="card__text">
                Зміна фону та привітання користувача.
            </p>
            <a href="index.php?route=settings/color" class="btn">
                Налаштувати
            </a>
        </div>

    </div>
    
    <div class="info-block">
        <h2>Структура MVC</h2>

        <table class="table">
            <tr><th>Клас</th><th>Призначення</th></tr>
            <tr><td>Application</td><td>Роутинг</td></tr>
            <tr><td>Router</td><td>URL</td></tr>
            <tr><td>Request</td><td>GET/POST</td></tr>
            <tr><td>Controller</td><td>Логіка</td></tr>
            <tr><td>View</td><td>Відображення</td></tr>
            <tr><td>PageView</td><td>Layout</td></tr>
        </table>
    </div>
</div>