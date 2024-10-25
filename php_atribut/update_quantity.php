<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['change'])) {
    $tovar_id = intval($_POST['id']);
    $change = intval($_POST['change']);

    if (isset($_SESSION['cart'][$tovar_id])) {
        $_SESSION['cart'][$tovar_id]['quantity'] += $change;

        if ($_SESSION['cart'][$tovar_id]['quantity'] < 1) {
            unset($_SESSION['cart'][$tovar_id]);
        }
    }

    echo "Количество товара обновлено";
}
?>
