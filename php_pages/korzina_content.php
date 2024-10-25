<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pages/korzina_content.css">
    <link rel="stylesheet" href="../css/atribut/header.css">
    <link rel="stylesheet" href="../css/atribut/footer.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "../php_atribut/header.php";
    ?>

    <?php
        session_start();
        require_once('../include_data/db.php');

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Ваша корзина пуста.";
            exit;
        }

        $tovars_ids = implode(',', array_map('intval', array_keys($_SESSION['cart'])));

        $sql = "SELECT id, name, price, image_url FROM tovars WHERE id IN ($tovars_ids)";
        $result = $conn->query($sql);

        $totalPrice = 0;

        echo '<div class="cart-container">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                $itemTotal = $row['price'] * $quantity;
                $totalPrice += $itemTotal;

                echo '<div class="cart-item">
                        <img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['name']) . '">
                        <p>' . htmlspecialchars($row['name']) . '</p>
                        <p>Цена за шт: ' . htmlspecialchars($row['price']) . '</p>
                        
                        <!-- Счетчик кол-ва товаров -->
                        <div class="quantity-control">
                            <button class="btn-decrement" onclick="updateQuantity(' . htmlspecialchars($row['id']) . ', -1)">-</button>
                            <input type="text" value="' . $quantity . '" readonly>
                            <button class="btn-increment" onclick="updateQuantity(' . htmlspecialchars($row['id']) . ', 1)">+</button>
                        </div>
                        
                        <p>Всего: ' . $itemTotal . '</p>
                        <button class="btn-remove" onclick="removeFromCart(' . htmlspecialchars($row['id']) . ')">Удалить</button>
                    </div>';
            }
        } else {
            echo "Товаров в корзине нет.";
        }

        echo '<div class="cart-total">Итоговая сумма: ' . $totalPrice . '</div>';
        echo '</div>';
    ?>

    <?php
        include "../php_atribut/footer.php";
    ?>
</body>

<script>
function updateQuantity(tovarId, change) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php_atribut/update_quantity.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();  // Перезагружаем страницу для обновления корзины
        }
    };
    xhr.send("id=" + tovarId + "&change=" + change);
}

function removeFromCart(tovarId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php_pages/remove_from_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();  // Перезагружаем страницу для обновления корзины
        }
    };
    xhr.send("id=" + tovarId);
}
</script>
</html>