<?php


// Handle login logic here role base between admin and client and the client should be redirected to the dashboard and the admin should be redirected to the admin dashboard
require 'database.php';
require 'validations/login.validate.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = test_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $errors = validateLogin(['email' => $email, 'password' => $password]);

    if (!empty($errors)) {
        $error_message = "Please fix the following errors:";
        $error_list = $errors;
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Start session and set user data
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role']; // Assuming you have a 'role' column in your users table

        // Redirect based on role
        if ($user['role'] === 'donuts_admin') {
            header('Location: /admin/dashboard');
            exit;
        } else {
            header('Location: /clients/dashboard');
            exit;
        }
    } else {
        // Invalid credentials
        $error_message = "Invalid email or password.";
    }
}


require "views/login.view.php";


