<?php
include_once "./config/db.php";
?>
<?php


function selectAllPost()
{
  global $conn;

  $sql = "SELECT * FROM posts";
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

function getOnePost($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  $stmt->close();

  return $user;
}


