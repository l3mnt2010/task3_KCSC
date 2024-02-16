<?php
require_once "./config/db.php";
function getAllCommentInPost($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();

  $comments = [];
  while ($comment = $result->fetch_assoc()) {
    $comments[] = $comment;
  }

  $stmt->close();

  return $comments;
}

function createComments($user_id, $post_id, $body, $used_by)
{
  global $conn;
  $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, body,used_by) VALUES (?, ?, ?, ?)");
  if ($stmt) {
    $stmt->bind_param("iiss", $user_id, $post_id, $body, $used_by);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
  } else {
    return false;
  }
}
if (isset($_POST['btn_comment'])) {
  echo "hihiihii";
  if (isset($_SESSION['id']) && isset($_POST['body']) && isset($_GET['post_id'])) {
    $comment_id_created = createComments($_SESSION['id'], intval($_GET['post_id']), $_POST['body'], $_SESSION['username']);
    if ($comment_id_created !== false) {
      $_SESSION['type'] = 'success';
      $_SESSION['type'] = 'Comment create successfully';
    } else {
      $_SESSION['type'] = 'failed';
      $_SESSION['type'] = 'Comment create failed';
    }
  }
}