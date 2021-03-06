<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');


$product = $_POST['product'];
$price = (float) $_POST['price'];
$store = Store::get((int) $_POST['store']);

$product = trim($product);
$product = htmlspecialchars($product);
$product = strtoupper($product);

Report::create($product, $price, $store);

header('Location: /index.php');