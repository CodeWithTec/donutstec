<?php
$name = $email = $phone = $company = $subject = $service = $budget = $message = "";
$nameErr = $emailErr = $phoneErr = $companyErr = $subjectErr = $serviceErr = $budgetErr = $messageErr = "";

//validation function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//contact form validations


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = test_input($_POST["name"]);
    }

    if(empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    
    if(empty($_POST["phone"])) {
        $phoneErr = "Phone number is required!";
    } else {
        $phone = test_input($_POST["phone"]);
    }

    if(empty($_POST["company"])) {
        $companyErr = "Company name is required!";
    } else {
        $company = test_input($_POST["company"]);
    }

    if(empty($_POST["subject"])) {
        $subjectErr = "Subject is required!";
    } else {
        $subject = test_input($_POST["subject"]);
    }
    
    if(empty($_POST["service"])) {
        $serviceErr = "Service is required!";
    } else {
        $service = test_input($_POST["service"]);
    }

    if(empty($_POST["budget"])) {
        $budgetErr = "Budget is required!";
    } else {
        $budget = test_input($_POST["budget"]);
    }

    if(empty($_POST["message"])) {
        $messageErr = "Message is required!";
    } else {
        $message = test_input($_POST["message"]);
    }

};


