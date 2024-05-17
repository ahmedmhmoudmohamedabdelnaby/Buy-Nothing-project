<?php

// Include the DBController class
include_once 'C:\xampp\htdocs\project8\controllers\DBController.php';
include_once 'C:\xampp\htdocs\project8\Models\user.php';
include_once 'C:\xampp\htdocs\project8\Models\post.php';

// Create a new DBController object
session_start();
$db = new DBController();
$db->openconc();
$user_id = $_SESSION['user_id'];
$user_query = "SELECT group_id FROM users WHERE user_id = '$user_id'";
$user_result = $db->select($user_query);
$group_id = $user_result[0]['group_id'];
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $user=new User;
    //$user_query = ("SELECT group_id FROM users WHERE user_id = '$user_id'");
    // Get the form data
    $description = $_POST['description'];
    $postType = $_POST['postType'];
    $productType = $_POST['producttype'];
    
    // Check if an image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        // Upload the image
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image);
       // move_uploaded_file($tempImage, $targetFile);
    } else {
        $image = '';
    }
    
    // Generate the createdat date/time stamp
    $createdAt = date('Y-m-d H:i:s');

    // Create a new Post object
    $post = new Post();

    // Set the Post object properties
    $post->setDescription($description);
    $post->setPostType($postType);
    $post->setProductType($productType);
    $post->setImage($image);
    $post->setCreatedAt($createdAt);
    $post->setNumOfLikes(0);
    $post->setNumOfComments(0);
    $post->setUserId($user_id);

    // Prepare the SQL query
    $sql = "INSERT INTO post (description, post_type, product_type, image, created_at, user_id,group_id) VALUES ('$description','$postType' ,'$productType' , '$image', '$createdAt','$user_id','$group_id')";
    $result=$db->insert($sql);
    
    // Close the database connection
    $db->closeConc();
    header("Location: view_posts.php");
    exit();

    // Redirect to the homepage or show a success message
}
?>



<html>
    <head>
    <title>create post form</title>
        <style>
form {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
}

label {
  margin-bottom: 10px;
}

textarea {
  width: 100%;
  height: 100px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  margin-bottom: 20px;
}

input[type="radio"] {
  margin-right: 5px;
}

input[type="file"] {
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

</style>
</head>
<body>
<form action="posthtml.php" method="post" enctype="multipart/form-data">

<h1>create post</h1>
  <label for="description">Post description:</label>
  <textarea id="description" name="description"required></textarea>
  
  <div>
    <label>Type of post:</label>
    <label for="give">Give</label>
    <input type="radio" id="give" name="postType" value="give">
    <label for="ask">Ask</label>
    <input type="radio" id="ask" name="postType" value="ask">
  </div>
  <div>
    <label>product type:</label>
    <label for="item">item</label>
    <input type="radio" id="item" name="producttype" value="item">
    <label for="service">service</label>
    <input type="radio" id="service" name="producttype" value="service">
  </div>
  
  <div>
    <label for="image">Add image:</label>
    <input type="file" id="image" name="image">
  </div>
  
  <input type="submit" name="submit" value="Create post">
</form>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>
</html>
