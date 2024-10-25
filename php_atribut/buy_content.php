<div class="container_tovars_con">
    <div class="zagolovok_tov_con">
        <h1>
            Продажа:
        </h1>
    </div>
    <div class="blocks_tov_con">
        <?php
        require_once('../include_data/db.php');

        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        $query = "SELECT * FROM tovars WHERE category='buy'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="block_tov">
                        <a href="../php_pages/tovar_page.php?id=' . htmlspecialchars($row['id']) . '">
                        <img src="' . htmlspecialchars($row['image_url']) . '" alt="">
                        <p>' . htmlspecialchars($row['name']) . '</p>
                        </a>
                      </div>';
            }
        } else {
            echo "Товаров нет. Распродали)";
        }
        ?>
    </div>
</div>