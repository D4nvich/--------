<div class="content_kino_news">
    <div class="container_kino_news_con">
            <h1 class="name_blog_news">
                Новости мира кино:
            </h1>
        <div class="blocks_news_kino">
        <?php
                require_once('../include_data/db.php');

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $query = "SELECT * FROM news";
                $result = $conn->query($query);

                if ($result->num_rows > 0 ) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                         <a href="../php_pages/blog_page.php?id=' . $row['id'] . '" class="kino_news_block_content">
                            <img src="' . htmlspecialchars($row['image_url']) . '" >
                            <p>' . htmlspecialchars($row['title']) . '</p> 
                        </a>';
                    }
                } else {
                    echo "Новостей нет.";
                }
                ?>
        </div>
    </div>
</div>
