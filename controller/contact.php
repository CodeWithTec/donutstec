<?php

require "database.php";
require "validations/contact.validate.php";

// Initialize variables
$error_message = '';
$error_list = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = test_input($_POST['name'] ?? '');
    $email = test_input($_POST['email'] ?? '');
    $phone = test_input($_POST['phone'] ?? '');
    $company = test_input($_POST['company'] ?? '');
    $subject = test_input($_POST['subject'] ?? '');
    $service = test_input($_POST['service'] ?? '');
    $budget = test_input($_POST['budget'] ?? '');
    $message = test_input($_POST['message'] ?? '');

    // Validate the form data
    $errors = validateContact([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'subject' => $subject,
        'service' => $service,
        'budget' => $budget,
        'message' => $message
    ]);

    if (!empty($errors)) {
        $error_message = "Please fix the following errors:";
        $error_list = $errors;
    } else {
        // insert the data into the database
        $sql = "INSERT INTO contact (fullname, email, phone, company, subject, service, budget, message) VALUES (:name, :email, :phone, :company, :subject, :service, :budget, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':subject' => $subject,
            ':service' => $service,
            ':budget' => $budget,
            ':message' => $message
        ]);

    }
}





require "views/contact.view.php";











?>