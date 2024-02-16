<?php
require_once "./config/db.php";
function generateRandomString($length)
{
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  return substr(str_shuffle($characters), 0, $length);
}

if (isset($_POST['register_btn'])) {
  unset($_POST['register_btn']);
  $errors = array();

  if (empty($_POST['email'])) {
    array_push($errors, "Email is required");
  }
  if (empty($_POST['password'])) {
    array_push($errors, "Password is required");
  }

  if (count($errors) === 0) {
    $is_admin = 0;
    $_POST['password'] = hash('sha256', $_POST['password']);
    $_POST['username'] = generateRandomString(9);
    $user_id = create($_POST['username'], $_POST['password'], $_POST['email'], $is_admin);
    $_SESSION['messages'] = "Created user successfully";
    $_SESSION['type'] = "success";
    header("Location: login.php");
  };
}