<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $tovar_id = intval($_POST['id']);

    if (isset($_SESSION['cart'][$tovar_id])) {
        unset($_SESSION['cart'][$tovar_id]); 
    }

    echo "Товар удален из корзины";
}
?>
