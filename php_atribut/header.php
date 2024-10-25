<div class="content-header">
    <div class="container-header-cont">
        <div class="logo">
            <p style="font-size:26px ; margin: 0; color: white ;">logo</p>
            <!-- <img src="" alt="Logo"> -->
        </div>
        <div class="serch">
            <input type="search" placeholder="Поиск...">
        </div>
        <div class="menu">
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
        </div>
    </div>
</div>

<div class="burger-menu">
    <div class="content-burger-menu">
    <div class="close-btn">МЕНЮ</div>
        <a href="../php_pages/enter.php">
            <h1>Вход</h1>
        </a>
        <a href="../php_pages/registration.php">
            <h1>Регистрация</h1>
        </a>
        <hr>
        <a href="../php_pages/rent.php">
            <h1>Аренда оборудования</h1>
        </a>
        <a href="../php_pages/buy.php">
            <h1>Продажа оборудования</h1>
        </a>
        <a href="../php_pages/index.php">
            <h1>Главная</h1>
        </a>
        <hr>
        <a href="../php_pages/blog.php">
            <h1>Блог</h1>
        </a>
        <a href="../php_pages/about_us.php">
            <h1>О нас</h1>
        </a>
        <a href="../php_pages/login.php">
            <h1>Профиль</h1>
        </a>
        <a href="../php_pages/korzina_content.php">
            <h1>корзина</h1>
        </a>
    </div>
</div>
<div class="overlay"></div>
<script>
    const burgerMenu = document.querySelector('.burger-menu');
    const overlay = document.querySelector('.overlay');

document.querySelector('.menu').addEventListener('click', () => {
    burgerMenu.classList.add('open');
    overlay.style.display = burgerMenu.classList.contains('open') ? 'block' : 'none';
});

overlay.addEventListener('click', () => {
    burgerMenu.classList.remove('open');
    overlay.style.display = 'none';
});
document.querySelector('.close-btn')?.addEventListener('click', () => {
    burgerMenu?.classList.remove('open');
    overlay.style.display = 'none';
});
</script>
