<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pages/pop_tov_page.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/pages/tovars_page.css">
    <link rel="stylesheet" href="../css/atribut/footer.css">
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
        $tovars_id = isset($_GET['id']) ? intval($_GET['id']) : 0; 

        $stmt = $conn->prepare("SELECT * FROM tovars WHERE id = ?");
        if (!$stmt) {
            die("Ошибка при подготовке запроса: " . $conn->error);
        }

        $stmt->bind_param("i", $tovars_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($row['category']=='buy') 
            {
                echo '<div class="content">
                <div class="container_cont">
                    <img src="' . htmlspecialchars($row['image_url']) . '">
                    <div class="container_cont_info">
                        <h1>' . htmlspecialchars($row['name']) . '</h1>
                        <p> Бренд: ' . htmlspecialchars($row['brend']) . '</p>
                        <p> Цена: ' . htmlspecialchars($row['price']) . '</p>
                        <p> Состояние: ' . htmlspecialchars($row['sostoinie']) . '</p>
                        <p> Описание: ' . htmlspecialchars($row['opisanie']) . '</p>
                        <button class="bt_pr_tovar_bron">Забронировать</button>
                        <button class="bt_pr_tovar_korz" onclick="addToCart(' . htmlspecialchars($tovars_id) . ')">Положить в корзину</button>
                    </div>
                </div>
                <div class="under_container_cont">
                    <div class="under_container_cont_info">
                        <p>' . htmlspecialchars($row['owner_name']) . '</p>
                        <div class="ocenka">
                            <p>ocenka: ' . htmlspecialchars($row['owner_ocenka']) . '</p>
                            <p class="ocenka_img"></p>
                        </div>
                    </div>
                    <img src="' . htmlspecialchars($row['owner_img']) . '">
                </div>
            </div>';
            } 
            else {
                echo '<div class="content">
                        <div class="container_cont">
                            <img src="' . htmlspecialchars($row['image_url']) . '">
                            <div class="container_cont_info">
                                <h1>' . htmlspecialchars($row['name']) . '</h1>
                                <p> Бренд: ' . htmlspecialchars($row['brend']) . '</p>
                                <p> Цена: ' . htmlspecialchars($row['price']) . '</p>
                                <p> Состояние: ' . htmlspecialchars($row['sroc']) . '</p>
                                <button class="bt_pr_tovar_bron">Забронировать</button>
                                <button class="bt_pr_tovar_korz" onclick="addToCart(' . htmlspecialchars($tovars_id) . ')">Положить в корзину</button>
                            </div>
                        </div>
                        <div class="under_container_cont">
                            <div class="under_container_cont_info">
                                <p>' . htmlspecialchars($row['owner_name']) . '</p>
                                <div class="ocenka">
                                    <p>ocenka: ' . htmlspecialchars($row['owner_ocenka']) . '</p>
                                    <p class="ocenka_img"></p>
                                </div>
                            </div>
                            <img src="' . htmlspecialchars($row['owner_img']) . '">
                        </div>
                    </div>';
            }

        } else {
            echo "Товар не найден.";
        }
    ?>

    <?php
        include "../php_atribut/footer.php";
    ?>
</body>

<script>
function addToCart(tovars_id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php_pages/korzina.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Товар добавлен в корзину");
        }
    };
    xhr.send("id=" + tovars_id);
}
</script>

</html>