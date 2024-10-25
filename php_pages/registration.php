<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentANDBuy</title>
    <link rel="stylesheet" href="../css/pages/enter_reg.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
</head>
<body>
    <?php
        include "../php_atribut/header.php";
    ?>
    <div class="main">
        <div class="main_acc_form">
            <div class="container_for_main_form">

                <form action="../data_php/reg.php" method="POST" class="form_for_get_acc">
                    <input type="email" placeholder=" email/Номер телефона" name="email" required>
                    <input type="text" placeholder=" Никнейм" name="nik" required>
                    <input type="password" placeholder=" Пароль" name="pass" required>
                    <input type="password" placeholder=" Подтвердите пароль" name="repeatpass" required>
                    <button class="bt_pr_1_form" type="submit">Регистрация</button>
                </form>

                <div class="change_ent_reg_und_form">
                        <a href="../php_pages/enter.php">
                            <h1>Вход</h1>
                        </a>
                        <hr>
                        <a href="../php_pages/registration.php">
                            <h1  class="active">Регистрация</h1>
                        </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>