<?php 

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = trim($_POST['first_name'] ?? '');
    $last_name  = trim($_POST['last_name'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $company    = trim($_POST['company'] ?? '');
    $company_address = trim($_POST['company_address'] ?? '');
    $phone      = trim($_POST['phone'] ?? '');
    $password   = $_POST['password'] ?? '';
    $gender     = $_POST['gender'] ?? '';

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
        ':phone'      => $phone,
        ':password'   => $hashed_password
    ]);

    echo "Registration successfu!";
}





require "views/clientlogin.view.php"; 

?>