<?php
    require_once('../include_data/db.php');
    $login = $_POST['email'];
    $nik = $_POST['nik'];
    $pass = $_POST['pass'];
    $repeatpass = $_POST['repeatpass'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['email'];
        $nik = $_POST['nik'];
        $pass = $_POST['pass'];
        $repeatpass = $_POST['repeatpass'];
    
        if ($pass !== $repeatpass) {
            echo "Пароли не совпадают.";
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    
            $check_email_query = "SELECT * FROM users WHERE mail = ?";
            $stmt = $conn->prepare($check_email_query);
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $check_email_result = $stmt->get_result();
    
            if ($check_email_result->num_rows > 0) {
                echo "Пользователь с таким адресом электронной почты уже существует.";
            } else {
                $insert_query = "INSERT INTO users (mail, pass, nik) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("sss", $login, $hashed_password, $nik);
    
                if ($stmt->execute()) {
                    echo "Регистрация успешна.";
                    header("Location: ../php_pages/enter.php");
                    exit();
                } else {
                    echo "Ошибка при регистрации: " . $conn->error;
                }
            }
            $stmt->close();
        }
    }
    $conn->close();
    ?>
?>