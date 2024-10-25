<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pages/buy-rent.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/atribut/footer.css">
    <link rel="stylesheet" href="../css/atribut/popular_tovar.css">
    <link rel="stylesheet" href="../css/atribut/tovars_content.css">
</head>
<body>
    <?php
        include "../php_atribut/header.php";
    ?>
    <div class="zagolovok_content">
        <h1>-КИНООБРУДОВАНИЕ-</h1>
    </div>

    <div class="main-under-header">
        <div class="top_content_serch">
            <div class="menu_search">
                <div class="stroke"></div>
                <div class="stroke"></div>
                <div class="stroke"></div>
            </div>
            <div class="burger-menu-search">
                <div class="content-burger-menu">
                    <div class="close-btn-search"><</div>
                </div>
            </div>
        </div>
        <div class="content_tovars">
                <?php
                    include "../php_atribut/popular_tovar.php";
                ?>
                <?php
                    include "../php_atribut/rent_content.php";
                ?>
        </div>
    </div>

    <?php
        include "../php_atribut/footer.php";
    ?>
</body>
<script>
    document.querySelector('.menu_search')?.addEventListener('click', () => {
    const burgerMenu = document.querySelector('.burger-menu-search');
    burgerMenu?.classList.add('open');
    const SmeshList = document.querySelector('.content_tovars');
    SmeshList?.classList.add('visib');
});

    document.querySelector('.close-btn-search')?.addEventListener('click', () => {
    const burgerMenu = document.querySelector('.burger-menu-search');
    burgerMenu?.classList.remove('open');
    const SmeshList = document.querySelector('.content_tovars');
    SmeshList?.classList.remove('visib');
});

</script>
</html>