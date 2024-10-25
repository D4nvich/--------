<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pages/login.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/atribut/footer.css">
</head>
<body>
    <?php
        include "../php_atribut/header.php";
    ?>
    <?php
        session_start();

        if (!isset($_SESSION['user_mail'])) {
            header("Location: ../php_pages/enter.php");
            exit();
        }
        
        require_once('../include_data/db.php');

        $user_mail = $_SESSION['user_mail'];
        $query = "SELECT * FROM users WHERE mail=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $user_mail);
        $stmt->execute();
        $result = $stmt->get_result();;

        if ($result->num_rows > 0 ) {
            $row = $result->fetch_assoc() ;
            echo 
            '<div class="main_content_login">
                <div class="login_info">
                    <div class="container_login">
                    <h1>Основная информация</h1>
                    <p' . htmlspecialchars($row['id']) . '"></p>
                        <h1>' . htmlspecialchars($row['nik']) . ' </h1>
                    </div>
                </div>
                <div class="side_change">
                    <p class="active">Основное</p>
                    <p>Корзина</p>
                    <p>Телеграм-бот</p>
                    <hr>
                    <p>Отзывы</p>
                </div>
            </div>';
        } 
        else {
            echo "nety";
        };
    ?>

    <?php
        include "../php_atribut/footer.php";
    ?>
</body>
</html>