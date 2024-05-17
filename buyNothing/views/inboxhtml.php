<!DOCTYPE html>
<html>
<head>
<style>
		.container {
	max-width: 600px;
	margin: auto;
	padding: 20px;
}

h1 {
	text-align: center;
}

ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

li {
	padding: 10px;
	margin-bottom: 10px;
	border: 1px solid #ddd;
}

li:last-child {
	margin-bottom: 0;
}

strong {
	display: inline-block;
	min-width: 70px;
}

.date {
	font-size: 0.8em;
	color: #777;
	margin-top: 5px;
}
</style>
<title>Inbox</title>
</head>
<body>
	<div class="container">
	<h1>Inbox</h1>
<?php 
require_once '../controllers/DBController.php';
require_once '../models/Chat.php';
require_once '../models/user.php';

// Start session and connect to database
session_start();
//$db = new DBController();
$user = new User();
        $host = 'localhost:3307';
        $username = 'root';
        $password = '';
        $dbname = 'buynothing';
        
        // Create a new mysqli object
        $conn = new mysqli($host, $username, $password, $dbname); 

// Check if user is logged in and has an email
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id']; // Current user's ID
  $sql = "SELECT chat.sender_id, users.email, chat.message, chat.created_at
          FROM chat
          INNER JOIN users ON chat.sender_id = users.user_id
          WHERE chat.receiver_id = $user_id";
  $result = mysqli_query($conn, $sql);

  // Display inbox
  echo '<ul>';
  while ($row = mysqli_fetch_assoc($result)) {
    $chat = new Chat();
    $chat->setSenderId($row['sender_id']);
    $chat->setMessage($row['message']);
    $chat->setCreatedAt($row['created_at']);
    $sender = $row['email'];
    $content = $chat->getMessage();
    $timestamp = $chat->getCreatedAt();
    echo "<li><strong>From:</strong> $sender<br>";
    echo "<strong>Message:</strong> $content<br>";
    echo "<span class='date'><strong>Date:</strong> $timestamp</span></li>";
  }
  echo '</ul>';
  //$db->closeConc();
} else {
  echo "Please log in to view your inbox.";
}
?>
</div>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>
</html>
