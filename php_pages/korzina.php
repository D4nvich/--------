<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $tovar_id = intval($_POST['id']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$tovar_id])) {
        $_SESSION['cart'][$tovar_id]['quantity']++;
    } else {
        $_SESSION['cart'][$tovar_id] = [
            'quantity' => 1
        ];
    }

    echo "Товар добавлен в корзину";
}
