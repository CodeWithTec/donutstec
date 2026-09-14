<?php 


// validation for login form
function validateLogin($data) {
    $errors = [];

    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = 'Your Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    // if email is valid, check if it exists in the database
    if (!empty($data['email'])) {
        require 'database.php';
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $data['email']]);
        if ($stmt->rowCount() === 0) {
            $errors['email'] = 'Email does not exist.';
        }
    }

    // Validate password
    if (empty($data['password'])) {
        $errors['password'] = 'Your Password is required.';
    }

    // if email exists, check if password is correct
    if (!empty($data['email']) && !empty($data['password'])) {
        require 'database.php';
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $data['email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && !password_verify($data['password'], $user['password'])) {
            $errors['password'] = 'Incorrect password.';
        }
    }

    return $errors;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}