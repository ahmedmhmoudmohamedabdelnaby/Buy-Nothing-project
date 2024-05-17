<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
    <style>
      .post {
        border: 1px solid black;
        padding: 10px;
        margin-bottom: 10px;
      }
      .comment {
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
    <h1>Posts</h1>
    <?php
      // Include the DBController class
      include_once 'C:\xampp\htdocs\project8\controllers\DBController.php';
      include_once 'C:\xampp\htdocs\project8\Models\user.php';
      include_once 'C:\xampp\htdocs\project8\Models\post.php';
     // include_once 'C:\xampp\htdocs\project8\Models\Comment.php';

      // Create a new DBController object
      $db = new DBController();
      $db->openconc();

      // Get all the posts from the database
      $post_query = "SELECT * FROM post ORDER BY created_at DESC";
      $post_result = $db->select($post_query);

      // Loop through each post
      foreach ($post_result as $post) {
        $user_id = $post['user_id'];
        $user_query = "SELECT email FROM users WHERE user_id = '$user_id'";
        $user_result = $db->select($user_query);
        $useremail = $user_result[0]['email'];

        // Output the post information
        echo '<div class="post">';
        echo '<p><strong>' . $useremail . '</strong> posted on ' . $post['created_at'] . '</p>';
        echo '<p>' . $post['description'] . '</p>';
        if ($post['image'] != '') {
          echo '<img src="uploadedImages/' . $post['image'] . '" width="200">';
        }
        
        
        
        echo '
        
        
      </br>
      </br>
            
            </br>
            <a href="chathtml.php" class="p">message poster</a>
        ';
      
       
        //echo '<button type="submit">Post comment</button>';
        echo '</form>';
        echo '</div>';
      }

      // Close the database connection
      $db->closeConc();
    ?>
    <script>
        
      function showComments(postId) {
        
        // Get the comments container element
        const commentsContainer = document.getElementById('comments-' + postId);

        // If the comments are already loaded, toggle the visibility
        if (commentsContainer.innerHTML.trim() !== '') {
          commentsContainer.style.display = commentsContainer.style.display === 'none' ? 'block' : 'none';
          return;
        }

        // Otherwise, load the comments via AJAX
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            commentsContainer.innerHTML = this.responseText;
            commentsContainer.style.display = 'block';
          }
        };
        xhr.open('GET', 'load_comments.php?post_id=' + postId, true);
        xhr.send();
      }

      function addComment(event, postId) {
        event.preventDefault();

        // Get the comment input element
        const commentInput = event.target.querySelector('[name="comment"]');

        // Get the comment value
        const commentValue = commentInput.value;

// Send the comment via AJAX
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    // Reload the comments for the current post
    showComments(postId);

    // Clear the comment input
    commentInput.value = '';
  }
};
xhr.open('POST', 'add_comment.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send('post_id=' + postId + '&comment=' + commentValue);
}
</script>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>
</html>