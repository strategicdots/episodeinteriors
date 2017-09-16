<?php
require_once("../includes/initialize.php");
$post = $_SESSION['post'] = $_POST;
$errors = [];
if(isset($_POST['submit'])) {
    // VALIDATIONS
    // check for presence
    $raw_form_fields    = [
        'email'         => $_POST['email'], 
        'password'      => $_POST['password']
    ];

    foreach ($raw_form_fields as $field => $value) {
        if(!$form_validation->has_presence($value)) {
            $errors[$field] = ucwords(str_replace("_", " ", $field)) . " can't be blank";
        }
    }

    if(empty($errors)) {
        // VALIDATIONS PASSED
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        $admin_object = Admin::findByEmail($email);
        if(!empty($admin_object)) { 
            if(password_verify($password, $admin_object->password)) {
                // Password Match
                $admin = new Admin();
                $_SESSION['id'] = $admin->id = $admin_object->id;
                redirect_to("../admin/dashboard.php");
            } else {
                $session->message("email/password does not match");
                redirect_to("../admin/");
            }
        } else {
            $session->message("No records found");
        }
    } else {
        $_SESSION['errors'] = $errors;
        $session->message("please send in both form values");
        redirect_to("../admin/");
    } 
} else {
    $session->message("please send in the form values");
    redirect_to("../admin/");
}