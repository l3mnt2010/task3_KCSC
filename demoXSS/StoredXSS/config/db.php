<?php
require("connectdb.php");
function createUserForAdmin($username, $password, $email, $admin, $avatar)
{
  global $conn;
  $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, avatar) VALUES (?, ?, ?, ?, ?)");
  if ($stmt) {
    $password = hash("sha1", $password);
    $stmt->bind_param("sssis", $username, $password, $email, $admin, $avatar);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
  } else {
    return false;
  }
}

function editUserForAdmin($userId, $newUsername, $newPassword, $newEmail, $newAdmin, $newAvatar)
{
  global $conn;
  $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, email = ?, role = ?, avatar = ? WHERE id = ?");

  if ($stmt) {
    $newPassword = hash("sha1", $newPassword);
    $stmt->bind_param("sssisi", $newUsername, $newPassword, $newEmail, $newAdmin, $newAvatar, $userId);
    $stmt->execute();
    $stmt->close();
    return true;
  } else {
    return false;
  }
}


function create($username, $password, $email, $admin)
{
  global $conn;
  $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
  if ($stmt) {
    $stmt->bind_param("sssi", $username, $password, $email, $admin);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
  } else {
    return false;
  }
}

function getUserByEmail($email)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();

  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  $stmt->close();

  return $user;
}


function selectAllTopic()
{
  global $conn;

  $sql = "SELECT * FROM topics";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->execute();
  $result = $stmt->get_result();
  if ($result) {
    $records = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();


    return $records;
  } else {
    die("Execute failed: " . $stmt->error);
  }
}


function selectAll()
{
  global $conn;

  $sql = "SELECT * FROM users";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    die("Prepare failed: " . $conn->error);
  }
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result) {
    $records = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $records;
  } else {
    die("Execute failed: " . $stmt->error);
  }
}


function getUserById($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  $stmt->close();

  return $user;
}


function getUserByEmailSQLi($email)
{
  global $conn;
  // $cleaned_email = mysqli_real_escape_string($conn, $email);
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result) {
    $user = $result->fetch_assoc();
    $result->free_result();
    return $user;
  } else {
    return null;
  }
}