<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Donate to Our site</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  <body>
    <header>
      <h1>Donate to Our site</h1>
    </header>
    <main>
      <form>
        <h2>Personal Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <h2>Donation Amount</h2>
        <label for="donate-custom">Custom Amount</label>
        <input type="number" id="custom-amount" name="custom-amount" min="1" max="10000">

        <h2>Payment Information</h2>
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>
        <button type="submit">Donate</button>
      </form>
    </main>
    <footer>
      <p>Thank you for your support!</p>
    </footer>
  </body>
</html> -->



<!DOCTYPE html>
<html>
  <head>
    <title>Donate to Our site</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  <body>
    <header>
      <h1>Donate to Our site</h1>
    </header>
    <main>
      <form method="post" action="">
        <h2>Personal Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <h2>Donation Amount</h2>
        <label for="donate-custom">Custom Amount</label>
        <input type="number" id="custom-amount" name="custom-amount" min="1" max="10000">

        <h2>Payment Information</h2>
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>
        <button type="submit">Donate</button>
      </form>

      <?php
require_once '../controllers/DBController.php';
require_once '../models/Donation.php';

$db = new DBController();
 $db->openconc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['custom-amount'];
    $creditCardNumber = $_POST['card-number'];
    //$query = "select * from users where email='$email'and name='$name'";
    $query1 = "select * from users where email = '{$email}'";
    $result1=$db->select($query1);

    $donation = Donation::getInstance();
    $donation->addDonation($amount, $creditCardNumber);

    $query = "INSERT INTO donation  VALUES ('',$amount, '$creditCardNumber','{$result1[0]['user_id']}')";
    $result = $db->insert($query);

    if ($result !== false) {
        echo '<div class="success">Thank you for your donation!</div>';
    } else {
        echo '<div class="error">Something went wrong. Please try again later.</div>';
    }
}
$db->closeConc();
?>
    </main>
    <footer>
      <p>Thank you for your support!</p>
    </footer>
    <form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
  </body>
</html>