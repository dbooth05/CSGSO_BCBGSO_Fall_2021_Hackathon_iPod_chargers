<?php
include_once('../template.php');
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
    <form>
        <label for="item">Product Name: </label><br>
        <input type="text" id="item" name="item"><br>
        <label for="price">Product Price: </label><br>
        <input type="text" id="price" name="price"><br>
        <label for="store">Store Name: </label><br>
        <select name="store">
            <option value="null">Please select one</option>
            <option value="Hy-Vee">Hy-Vee</option>
            <option value="Walmart">Walmart</option>
            <option value="Aldi">Aldi</option>
            <option value="Fareway">Fareway</option>
            <option value="Target">Target</option>
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
