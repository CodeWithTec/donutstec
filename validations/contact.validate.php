<?php

// validations for contact form
function validateContact($data) {
    $errors = [];

    // Validate name
    if (empty($data['name'])) {
        $errors['name'] = 'Name is required.';
    }

    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    // Validate message
    if (empty($data['message'])) {
        $errors['message'] = 'Message is required.';
    }

    // Validate subject
    if (empty($data['subject'])) {
        $errors['subject'] = 'Subject is required.';
    }

    // Validate phone number
    if (empty($data['phone'])) {
        $errors['phone'] = 'Phone number is required.';
    } elseif (!preg_match('/^\+?[0-9]{10,15}$/', $data['phone'])) {
        $errors['phone'] = 'Invalid phone number format.';
    }

    // Validate company name
    if (empty($data['company'])) {
        $errors['company'] = 'Company name is required.';
    }

    return $errors;
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}