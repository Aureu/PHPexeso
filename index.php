<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pexeso</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>
    <div class="logo">
        <a href="#">Pexeso</a>
    </div>
    <ul class="nav-links">
        <li><a href="./pages/register.html">Registrovat</a></li>
        <li><a href="./pages/login.html">Přihlásit se</a></li>
        <li><a href="./pages/scoreboard.html">Žebříček</a></li>
    </ul>
</nav>
<div class="container">
    <button id="start-button">Začít hru</button>
    <button id="reset-button">Restart</button>
    <br>
    <br>
    <label for="height">Výška:</label>
    <input type="number" id="height" name="height" min="3" max="10" value="3">
    <label for="width">Šířka:</label>
    <input type="number" id="width" name="width" min="3" max="10" value="4">

    <div class="game-board">
    <?php
    // Array of images
    $images = array("apple", "banana", "cherry", "grape", "lemon", "orange", "pear", "watermelon", "strawberry", "avocado", "plum", "pineapple", "blackberry", "tomato", "brocoli", "carrot", "radish", "eggplant", "potato", "pumpkin", "green_pepper", "chili", "red_pepper", "ROCHOV", "axios_post");


    // Shuffle the images
    shuffle($images);

    // Duplicate the images and shuffle again
    $cards = array_merge($images, $images);
    shuffle($cards);

    // Create the cards
    for ($i = 0; $i < 16; $i++) {
        echo "<div class='card' data-card='$cards[$i]'><img src='images/$cards[$i].png' alt='$cards[$i]'></div>";
    }
    ?>
</div>
</div>

<script>
    const images = <?php echo json_encode($images); ?>;
</script>

<script src="script.js"></script>
</body>
</html>
