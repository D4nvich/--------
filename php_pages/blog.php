<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости Мира кино</title>
    <link rel="stylesheet" href="../css/pages/blog.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/atribut/footer.css">
</head>
<body>
    <?php
    include "../php_atribut/header.php";
    ?>
    <hr class="razdelitel">
    <div class="main">
        <div class="content_main_ab_kino">
            <h1 class="content_main_ab_kino_h1">Новости Мира кино :</h1>
            <div class="blocks_news">
                <?php
                require_once('../include_data/db.php');

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $query = "SELECT * FROM news";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="block_news_ab_kino">
                                <a href="../php_pages/blog_page.php?id=' . $row['id'] . '">
                                <img src="' . htmlspecialchars($row['image_url']) . '" alt=""></a>
                                <div class="content_info_news">
                                    <h1>' . htmlspecialchars($row['title']) . '</h1>
                                    <p>' . htmlspecialchars($row['content']) . '</p>
                                </div>
                              </div>';
                    }
                } else {
                    echo "Новостей нет.";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
        include "../php_atribut/footer.php";
    ?>
</body>
</html>
