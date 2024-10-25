<?php
session_start();

require_once('../include_data/db.php');

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['mail'];  
    $pass = $_POST['pass'];   

    if (!empty($login) && !empty($pass)) {
        $stmt = $conn->prepare("SELECT mail, pass FROM users WHERE mail = ?");
        if (!$stmt) {
            die("Ошибка при подготовке запроса: " . $conn->error);
        }
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($pass, $row['pass'])) {
                $_SESSION['user_mail'] = $row['mail'];

                header("Location: ../php_pages/login.php");
                exit();
            } else {
                echo "Неверный пароль.";
            }
        } else {
            echo "Пользователь с таким адресом электронной почты не найден.";
        }
        $stmt->close();
    } else {
        echo "Пожалуйста, заполните все поля.";
    }
}

$conn->close();
?>
