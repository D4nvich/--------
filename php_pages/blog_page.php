<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pages/blog_page.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/atribut/blog_info_page.css">
</head>
<body>
    <?php
        include "../php_atribut/header.php";
    ?>
    <?php
        require_once('../include_data/db.php');

        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        $news_id = isset($_GET['id']) ? intval($_GET['id']) : 0; 

        $stmt = $conn->prepare("SELECT title, content, image_url FROM news WHERE id = ?");
        if (!$stmt) {
            die("Ошибка при подготовке запроса: " . $conn->error);
        }

        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            echo '<div class="main_content_page_news">
                    <div class="info_page_news">
                        <div class="container_page_news_con">
                            <div class="page_news_targ">
                                <img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['title']) . '">
                                <h1>' . htmlspecialchars($row['title']) . '</h1>
                            </div>
                            <p>' . htmlspecialchars($row['content']) . '</p>
                        </div>
                    </div>
                </div>';
        } else {
            echo "Новость не найдена.";
        }
    ?>

</body>
</html>