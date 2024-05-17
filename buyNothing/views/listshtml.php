<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		/* Global styles */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		/* Header styles */
		header {
			background-color: #333;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 1rem;
		}

		nav ul {
			margin: 0;
			padding: 0;
			display: flex;
			list-style-type: none;
		}

		nav li:not(:last-child) {
			margin-right: 1rem;
		}

		nav a {
			color: #fff;
			text-decoration: none;
			font-weight: bold;
			padding: 0.5rem;
			border-radius: 5px;
		}

		nav a:hover {
			background-color: #fff;
			color: #333;
		}

		 /* Table Styles */
		table {
			border-collapse: collapse;
			min-width: 100%;
			margin: 10px 0;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		th, td {
			padding: 12px 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #333;
			color: white;
		}

		/* Main styles */
		main {
			margin: 2rem;
		}

		section {
			margin-bottom: 2rem;
		}

		h2 {
			font-size: 2rem;
			margin-bottom: 1rem;
		}

		td button {
			background-color: #ff0000;
			color: #fff;
			padding: 0.5rem;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		td button:hover {
			background-color: #cc0000;
		}

		.feedback-box {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 1rem;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
			z-index: 999;
			max-width: 90%;
			max-height: 90%;
			overflow: auto;
		}

		/* Responsive styles */
		@media only screen and (max-width: 768px) {
			header {
				flex-direction: column;
				align-items: flex-start;
			}

			nav ul {
				margin-top: 1rem;
				flex-direction: column;
			}

			nav li:not(:last-child) {
				margin-right: 0;
				margin-bottom: 0.5rem;
			}

			main {
				margin: 1rem;
			}

			h2 {
				font-size: 1.5rem;
			}

			table {
				font-size: 0.8rem;
			}

			td button {
				font-size: 0.8rem;
				padding: 0.2rem;
			}

			.feedback-box {
				max-width: 100%;
				max-height: 100%;
			}
		}
	</style>
</head>
<body>
	<header>
		<h1>groups list</h1>

	</header>
	<main>
	<section>
  <h2>Join a group</h2>
  <table>
    <thead>
      <tr>
        <th>name</th>
        <th>location</th>
        <th>number of members</th>
        <th>Join</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      // Database credentials
      $servername = "localhost:3307";
      $username = "root";
      $password = "";
      $dbname = "buynothing";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      session_start();
      if (isset($_POST['join-btn'])) {
        $query = "SELECT * FROM users where user_id = '{$_SESSION['user_id']}'";
        
        $result = $conn->query($query);
        $result2 =$result->fetch_all(MYSQLI_ASSOC);
    
        if(($result2[0]['group_id']=="")){
          $groupId = $_POST['group_ID'];
        
          $sql = "UPDATE groups SET num_members = num_members + 1 WHERE group_ID = '$groupId'";
          if ($conn->query($sql) === TRUE) {
            echo "<script>alert('You have joined the group.')</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
        $sql = "UPDATE users SET group_id = $groupId  WHERE user_id = '{$_SESSION['user_id']}'";
          if ($conn->query($sql) === TRUE) {
            echo "<script>alert('You have joined the group.')</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        }
    
      // Retrieve user data from the database
      $sql = "SELECT * FROM groups where location = '{$_SESSION['location']}'";
      $result = $conn->query($sql);
     
      // Generate HTML code for each row of user data
     
	 $groups = $result;
   foreach ($groups as $group) {
    echo "<tr>";
    echo "<td>{$group['name']}</td>";
    echo "<td>{$group['location']}</td>";
    echo "<td>{$group['num_members']}</td>";
    echo "<td><form method='post'><input type='hidden' name='group_ID' value='{$group['group_ID']}'><button name = 'join-btn' >Join</button></form></td>";
    echo "</tr>";
   
  }
  /* if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>{$row['name']}</td>";
      echo "<td>{$row['location']}</td>";
      echo "<td>{$row['num_members']}</td>";
      echo "<td><button class='join-btn' data-group-id='{$row['group_ID']}'>Join</button></td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='4'>No groups found.</td></tr>";
  } */
  // Handle join button click
  
  // Increment num_members column in the groups table
  /* $sql = "UPDATE groups SET num_members = num_members + 1 WHERE group_ID = '$groupId'";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('You have joined the group.')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} */
      // Close the database connection
      $conn->close();
      ?>
    </tbody>
  </table>
</section>
  

<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
	<script>
		const feedbackBtn = document.getElementById('feedback-btn');
		const closeBtn = document.getElementById('close-btn');
		const feedbackBox = document.querySelector('.feedback-box');

		feedbackBtn.addEventListener('click', () => {
			feedbackBox.style.display = 'block';
		});

		closeBtn.addEventListener('click', () => {
			feedbackBox.style.display = 'none';
		});

		const deleteBtns = document.querySelectorAll('.delete-btn');

		deleteBtns.forEach(deleteBtn => {
			deleteBtn.addEventListener('click', () => {
				const confirmation = confirm('Are you sure you want to delete this?');

				if (confirmation) {
					deleteBtn.parentElement.parentElement.remove();
				}
			});
		});
	</script>
</body>
</html>