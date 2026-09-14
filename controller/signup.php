<?php 

require_once 'database.php';
require_once 'validations/signup.validate.php';

$error_message = '';
$error_list = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = test_input($_POST['first_name'] ?? '');
    $last_name  = test_input($_POST['last_name'] ?? '');
    $email      = test_input($_POST['email'] ?? '');
    $company    = test_input($_POST['company'] ?? '');
    $company_address = test_input($_POST['company_address'] ?? '');
    $phone      = test_input($_POST['phone'] ?? '');
    $password   = $_POST['password'] ?? '';
    $gender     = test_input($_POST['gender'] ?? '');

    $errors = validateSignup([
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'company'    => $company,
        'company_address' => $company_address,
        'phone'      => $phone,
        'password'   => $password,
        'gender'     => $gender
    ]);

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    if ($stmt->rowCount() > 0) {
        $errors['email'] = 'Email already exists.';
    }

    if (!empty($errors)) {
        $error_message = "Please fix the following errors:";
        $error_list = $errors;
        require "views/signup.view.php";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    

    $sql = "INSERT INTO users
            (first_name, last_name, email, company, company_address, phone, password, gender)
            VALUES
            (:first_name, :last_name, :email, :company, :company_address, :phone, :password, :gender)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name'  => $last_name,
        ':email'      => $email,
        ':company'    => $company,
        ':company_address' => $company_address,
        ':phone'      => $phone,
        ':password'   => $hashed_password,
        ':gender'     => $gender
    ]);

    // Redirect to login page after successful signup
    header('Location: /login');
    exit;
}

require "views/signup.view.php"; 

?>