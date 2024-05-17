<?php

require_once '../controllers/DBController.php';
require_once '../controllers/AuthController.php';
require_once '../models/user.php';


session_start();
$user_id = $_SESSION["user_id"];
//$user_id=2;
/* if(!isset($_SESSION['user_id'])){
   header('location:loginhtml.php');
} */

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginhtml.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="keywords" content="كليه  جامعه حلوان">
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/ico" href="images/??">
    <link rel="stylesheet" type="text/css" href="panel.css">
    <title>buynothing</title>
</head>

<div id="menu-btn" class="fas fa-bars"></div>
<body>
    
    <div class="dashboard ">
        <div class="sidebar place-items-center ">
            <div class="logo"><i class="ri-bank-line"></i></div>
           

            <div class="sidebar-items">
                <div class="sidebar-item s-iten-1  place-items-center ">
                    <i class="ri-layout-grid-line "></i>
                
                </div>
                <div class="sidebar-item s-iten-2 place-items-center">
                        <a href="Terms of Use1.php" class="ri-sound-module-line"></a>
                </div>
                <div class="sidebar-item s-iten-3 place-items-center">
                    <a  href="FAQ.php " class="ri-user-line"></a>
                </div>
                <div class="sidebar-item s-iten-4 place-items-center">
                    <i class="ri-line-chart-line"></i>
                </div>

            </div>
        </div>

        <div class="container d-grid">
            <section class="main-container">
                <div class="top-bar margin-b">
                    <h2 class="title "> </h2>
                    <button class="btn place-items-center">
                        <i class="ri-menu-3-line open-menu-icon"></i>
                    </button>
                </div>
                <div class="task-container d-grid margin-b">
                    <div class="exam card-1">
                   
                        <h2 class="exam">We wish you a great day</h2>
                        <p>2023</p>
                        <div class="start-testing-container d-flex">
                            <p></p>
                            <a href="#"> </a>
                        </div>
                    </div>
                    <div class="task-container-2 d-grid">
                        <div class="homework card-1">
                            <i class="ri-checkbox-circle-line check-mark"></i>
                            <div>
                            <a href="view_posts.php" class="p">view posts</a>
                        </div>
                            <h4></h4>
                            <p></p>
                        </div>
                        <div class="reading card-1">
                            <i class="ri-checkbox-circle-line check-mark"></i>
                            <div>
                            <a href="posthtml.php" class="p">create post</a>
                        </div>
                            <h4></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                 <div class="group-task-container d-grid margin-b">

                    <div class="language-progress card-2">
                        <i class="ri-notification-3-fill bell-icon"></i>
                        <!-- <div class="profile-img-box">
                            <img src="images/c.JPG" alt="">
                        </div>  -->
                        
                        
                        
               
                

               
                
                    </div>
                </section>
            </section>
            <section class="secondary-container ">
            <div class="profile">
      <?php
        $host = 'localhost:3307';
        $username = 'root';
        $password = '';
        $dbname = 'buynothing';
        
        // Create a new mysqli object
        $conn = new mysqli($host, $username, $password, $dbname); 
        
        
         $select = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'") or die('query failed');
         //print($user_id);
         if(mysqli_num_rows($select) > 0){
          $fetch = mysqli_fetch_assoc($select);
         }
         //$fetch = mysqli_fetch_assoc($select);
         if($fetch['image'] == ''){
            
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      
      <?php
      echo "<h2>Welcome " . $fetch['name'] . "</h2>"; ?>
      
      
      <p>             Welcome to buynothing </p>
                    <div class="course discount card-1 d-flex">
                        <div>
                            <h4</h4>
                      
                            <a href="updateprofilehtml.php" class="p">update profile</a>
                        </div>
                        
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                    <div class="course discount card-1 d-flex">
                        <div>
                            <a href="index.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
                        </div>
                        
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
                <div class="courses-progress">
                    <h2 class="progress-title">  </h2>
                    <div class="course card-1 d-flex">
                    <div>
                            
                      
                            <a href="donationhtml.php" class="p">Donation</a>
                        </div>
                        <p class="progress-text-1"></p>
                        <div class="progress-icon progress-bg-1 place-items-center">
                            <i class="ri-pencil-fill"></i>

                        </div>
                        <div>
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="course card-1 d-flex">
                        <p class="progress-text-2"></p>
                        <div>
                            <a href="feedbackhtml.php" class="p">Feedback</a>
                        </div>
                        <div class="progress-icon progress-bg-2 place-items-center">
                            <i class="ri-book-2-line"></i>
                        </div>
                        <div>
                            <h3> </h3>
                            <p></p>
                        </div>

                    </div>
                    <div class="course card-1 d-flex">
                        <p class="progress-text-3"></p>
                        <div class="progress-icon progress-bg-3 place-items-center">
                            <i class="ri-book-open-line"></i>
                           
                      
                      <a href="chathtml.php" class="p">Chat</a>
                        </div>
                        <div>
                            <h3></h3>
                            <p></p>
                        </div>

                    </div>
                </div>
                <div class="courses-progress">

                    <div class="course card-1 d-flex">
                        <p class="progress-text-1"></p>
                        <div class="progress-icon progress-bg-1 place-items-center">
                            <i class="ri-pencil-fill"></i>
                            <a href="inboxhtml.php" class="p">inbox</a>
                        </div>
                        <div>
                            <h3> </h3>
                            <p><p>
                        </div>
                    </div>
                    <div class="course card-1 d-flex">
                        <p class="progress-text-2"></p>
                        <div>
                            <a href="groupcreationhtml.php" class="p">create a group</a>
                        </div>
                        </div>
                        <div>
                            <h3> </h3>
                            <p></p>
                        </div>

                    </div>
                    <div class="course card-1 d-flex">
                        <p class="progress-text-3"></p>
                        <div>
                            <a href="listshtml.php" class="p">groups list</a>
                        </div>
                        
                            <h3></h3>
                            <p></p>
                        </div>
                        <div class="course card-1 d-flex">
                        <p class="progress-text-3"></p>
                        <div>
                            <a href="join[2].php" class="p">search for groups</a>
                        </div>
                        
                            <h3></h3>
                            <p></p>
                        </div>

                    </div>
                </div>
         

    </div>
    
    <form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
    <script>
        let navbar = document.querySelector('.header .navbar');

        document.querySelector('#menu-btn').onclick = () => {
            navbar.classList.toggle('active');
        }

        window.onscroll = () => {
            navbar.classList.remove('active');
        }

        let mainVid = document.querySelector('.main-video');

        document.querySelectorAll('.course-3 .box .video video').forEach(vid => {

            vid.onclick = () => {
                let src = vid.getAttribute('src');
                mainVid.classList.add('active');
                mainVid.querySelector('video').src = src;
            }

        });

        document.querySelector('#close-vid').onclick = () => {
            mainVid.classList.remove('active');
        }

    </script>
</body>

</html>