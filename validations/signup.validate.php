<?php 

// validation for signup form
function validateSignup($data) {
    $errors = [];

    // Validate first name
    if (empty($data['first_name'])) {
        $errors['first_name'] = 'First name is required.';
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['first_name'])) {
        $errors['first_name'] = 'Only letters and white space allowed.';
    }elseif (strlen($data['first_name']) < 2) {
        $errors['first_name'] = 'First name must be at least 2 characters long.';
    }elseif (strlen($data['first_name']) > 50) {
        $errors['first_name'] = 'First name must not exceed 50 characters.';
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['first_name'])) {
        $errors['first_name'] = 'First name can only contain letters, hyphens, and spaces.';
    }else $data['first_name'] = test_input($data['first_name']);

    // Validate last name
    if (empty($data['last_name'])) {
        $errors['last_name'] = 'Last name is required.';
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['last_name'])) {
        $errors['last_name'] = 'Only letters and white space allowed.';
    }elseif (strlen($data['last_name']) < 2) {
        $errors['last_name'] = 'Last name must be at least 2 characters long.';
    }elseif (strlen($data['last_name']) > 50) {
        $errors['last_name'] = 'Last name must not exceed 50 characters.';
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/", $data['last_name'])) {
        $errors['last_name'] = 'Last name can only contain letters, hyphens, and spaces.';
    }else $data['last_name'] = test_input($data['last_name']);

    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }else $data['email'] = test_input($data['email']);

    // Validate company
    if (empty($data['company'])) {
        $errors['company'] = 'Company name is required.';
    }else $data['company'] = test_input($data['company']);

    // Validate company address
    if (empty($data['company_address'])) {
        $errors['company_address'] = 'Company address is required.';
    }else $data['company_address'] = test_input($data['company_address']);

    // Validate phone number
    if (empty($data['phone'])) {
        $errors['phone'] = 'Phone number is required.';
    } elseif (!preg_match('/^\+?[0-9]{10,15}$/', $data['phone'])) {
        $errors['phone'] = 'Invalid phone number format.';
    }else $data['phone'] = test_input($data['phone']);

    // Validate password
    if (empty($data['password'])) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($data['password']) < 6) {
        $errors['password'] = 'Password must be at least 6 characters long.';
    }

    // Validate gender
    if (empty($data['gender'])) {
        $errors['gender'] = 'Gender is required.';
    }

    return $errors;
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}