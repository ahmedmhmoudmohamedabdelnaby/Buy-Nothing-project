<?php
require_once '../models/user.php';
require_once '../models/groupcreation.php';
session_start();

// Database credentials
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "buynothing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle search button click
if (isset($_POST['btn_search'])) {
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $sql = "SELECT * FROM groups WHERE location LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
}

// Handle join button click
if (isset($_POST['btn_join'])) {
    $groupId = $_POST['group_ID'];
    $userId = $_SESSION['user_id'];

    // Check if user is already in a group
    $query = "SELECT group_id FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $userGroupId = $row['group_id'];
    
    // If user is not in a group, update group and user data
    if (!$userGroupId) {
        $sql = "UPDATE groups SET num_members = num_members + 1 WHERE group_ID = '$groupId'";
        if (mysqli_query($conn, $sql)) {
            $sql = "UPDATE users SET group_id = '$groupId' WHERE user_id = '$userId'";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('You have joined the group.')</script>";
            } else {
                echo "Error updating user data: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating group data: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('You are already a member of another group.')</script>";
    }
}

?>

<div align='center'>
    <form action="" method='post'>
        <input type="text" name='search'/>
        <input type="submit" name='btn_search' value="search"/>
    </form>

    <?php if (isset($_POST['btn_search'])) { ?>
        <table border='2'>
            <tr>
                <td>Group ID</td>
                <td>Name</td>
                <td>Location</td>
                <td>Number of Members</td>
                <td>Join</td>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['group_ID'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['location'] ?></td>
                    <td><?php echo $row['num_members'] ?></td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='group_ID' value='<?php echo $row['group_ID'] ?>'>
                            <input type="submit" name='btn_join' value="join"/>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>
