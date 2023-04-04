<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Pexeso | Registrace</title>
</head>

<body>
  <nav>
    <div class="logo">
      <a href="../index.php">Pexeso</a>
    </div>
    <ul class="nav-links">
      <li><a href="./register.html">Registrovat</a></li>
      <li><a href="./login.html">Přihlásit se</a></li>
      <li><a href="./scoreboard.html">Žebříček</a></li>
    </ul>
  </nav>
  <div class="container">
  <h1>Registration Form</h1>
    <?php
    // Initialize variables
    $username = '';
    $email = '';
    $password = '';
    $confirm_password = '';
    $errors = [];

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get input values
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate input values
        if (empty($username)) {
            $errors[] = 'Username is required';
        }
        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        } elseif ($password != $confirm_password) {
            $errors[] = 'Passwords do not match';
        }

        // If there are no errors, save the user data to the database
        if (empty($errors)) {
            // TODO: Save user data to database
            echo '<p>Registration successful!</p>';
            $username = '';
            $email = '';
        }
    }
    ?>
    <?php if (!empty($errors)) { ?>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <form method="post" action='../controllers/register.php'>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required> 
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
  </div>
</body>

</html>