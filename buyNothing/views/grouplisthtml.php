<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Group List</title>
  <style>
    /* Add some simple styling to make the page look nicer */
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
    }
    table {
      margin: auto;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border: 1px solid black;
    }
    th {
      background-color: #ddd;
    }
    td {
      text-align: center;
    }
    .join-btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Group List</h1>
  <table>
    <thead>
      <tr>
        <th>Group Name</th>
        <th>Location</th>
        <th>Number of Members</th>
      </tr>
    </thead>
    <tbody id="group-list">
      <!-- This will be filled with groups loaded from the API -->
    </tbody>
  </table>

  <div id="join-group-container"></div>

  <script>
    // Load the list of groups from the API and add them to the table
    fetch('/api/groups.php')
      .then(response => response.json())
      .then(groups => {
        const groupList = document.getElementById('group-list');
        groups.forEach(group => {
          const tr = document.createElement('tr');
          const joinBtn = document.createElement('button');
          joinBtn.classList.add('join-btn');
          joinBtn.dataset.groupId = group.id;
          joinBtn.innerHTML = 'Join';
          joinBtn.addEventListener('click', () => {
            // Call the API to join the group with the specified ID
            fetch(`/api/groups.php?id=${group.id}&action=join`, { method: 'POST' })
              .then(response => {
                if (response.ok) {
                  // Reload the page to reflect the updated group membership
                  location.reload();
                } else {
                  alert('Failed to join the group.');
                }
              });
          });
          tr.innerHTML = `
            <td>${group.name}</td>
            <td>${group.location}</td>
            <td>${group.numMembers}</td>
          `;
          const td = document.createElement('td');
          td.appendChild(joinBtn);
          tr.appendChild(td);
          groupList.appendChild(tr);
        });
      });
  </script>

  <?php
require_once '../controllers/DBController.php';

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

    // Retrieve the list of groups from the database
    $sql = "SELECT * FROM groups";
    $result = $conn->query($sql);
    $groups = array();

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $group = array(
          'id' => $row['group_ID'],
          'name' => $row['name'],
          'location' => $row['location'],
          'numMembers' => $row['num_members'],
        );

        array_push($groups, $group);
      }
    }

    $conn->close();
  ?>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
  <script>
    // Set the list of groups retrieved from the PHP backend as a global variable
    const groups = <?php echo json_encode($groups); ?>;
  </script>
</body>
</html>