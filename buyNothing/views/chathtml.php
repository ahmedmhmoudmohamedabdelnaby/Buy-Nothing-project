<?php
include_once 'C:\xampp\htdocs\project8\controllers\DBController.php';
include_once 'C:\xampp\htdocs\project8\models\Chat.php';
include_once 'C:\xampp\htdocs\project8\models\User.php';

session_start();
$db = new DBController();
$db->openconc();

if(isset($_POST['submit'])) {
  $chat = new Chat;
  $user = new User;

  $chat->setEmail($_POST['receiver_id']);
  $user->setEmail($_POST['email']);
  $chat->setMessage($_POST['message']);
  $created_at = date('Y-m-d H:i:s');
  $chat->setCreatedAt($created_at);

  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sender_id_query = "SELECT * FROM users WHERE email = '{$email}'";
    $result1 = $db->select($sender_id_query);

    $receiver_id_query = "SELECT * FROM users WHERE email = '{$_POST['receiver_id']}'";
    $result2 = $db->select($receiver_id_query);
    if (!empty($result1) && !empty($result2)) {
      $query = "INSERT INTO chat VALUES ('','{$result1[0]['user_id']}', '{$result2[0]['user_id']}','{$_POST['email']}','{$_POST['message']}','$created_at')";
      $result = $db->insert($query);
    } else {
      echo 'Error: Unable to find sender or receiver.';
    }
  } else {
    echo 'Error: User not logged in.';
  }
}

$db->closeConc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat App</title>
  <style>
    /* Chat form styles */
    #chat-form {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }
    #chat-form label {
      font-weight: bold;
      margin-bottom: 5px;
    }
    #chat-form input[type="text"], #chat-form textarea {
      padding: 5px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    #chat-form input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #chat-form input[type="submit"]:hover {
      background-color: #3e8e41;
    }

    /* Inbox styles */
    #inbox {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }
    #inbox h1 {
      font-weight: bold;
      margin-bottom: 10px;
    }
    #inbox ul {
      list-style: none;
      padding: 0;
    }
    #inbox li {
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }
    #inbox li:last-child {
      border-bottom: none;
    }
    #inbox li strong {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div id="chat-form">
    <h2>Send Message</h2>
    <form action="chathtml.php" method="POST">
      <label for="receiver_id">To:</label>
      <input type="text" name="receiver_id" id="receiver_id">
      <input type="email" name="email" id="email" required>
      <label for="message">Message:</label>
      <textarea name="message" id="message" rows="5"></textarea>
      <input type="submit"name="submit" value="Send">
    </form>   
  </div>
  <form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>
</html>