<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/../template.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');

$stores = Store::get();
?>

<head>
    <title>Report Price</title>
</head>
<h1>
    Price Reporting
</h1>
<header>
    
</header>
<body>
    <form action="post.php" method="POST">
        <label for="product">Product Name: </label><br>
        <input type="text" id="product" name="product"><br>
        <label for="price">Product Price: </label><br>
        <input type="text" id="price" name="price"><br>
        <label for="store">Store Name: </label><br>
        <select name="store">
            <?php foreach ($stores as $store): ?>
                <option value="<?= $store->id ?>"><?= "$store->name ($store->address)" ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

</body>
<footer>
    <p>Authors Renze, Fisher, Booth  all </p>
    <p><a href="mailto:dbooth05@iastate.edu">Contact Us</a></p>
</footer>
