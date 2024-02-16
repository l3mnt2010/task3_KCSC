<?php
include_once "./config/db.php";
?>

<?php
if (isset($_POST['login_btn'])) {
  unset($_POST['login_btn']);
  $errors = array();
  if (empty($_POST['email'])) {
    array_push($errors, "Email is required");
  }
  if (empty($_POST['password'])) {
    array_push($errors, "Password is required");
  }
  if (count($errors) === 0) {
    $user_login = getUserByEmail($_POST['email']);
    if (isset($user_login)) {
      $_POST['password'] = hash('sha256', $_POST['password']);
      if ($_POST['password'] === $user_login['password']) {
        $_SESSION['id'] = $user_login['id'];
        $_SESSION['email'] = $user_login['email'];
        $_SESSION['username'] = $user_login['username'];
        $_SESSION['admin'] = $user_login['role'];
        $_SESSION['messages'] = "You are now logged in";
        $_SESSION['type'] = "success";
        unset($user_login);
        header("Location: index.php");
      } else {
        array_push($errors, "Password incorrect");
      }
    } else {
      array_push($errors, "User not exist");
    }
  };
}