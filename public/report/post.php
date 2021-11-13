<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Store.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/Report.php');


$product = $_POST['product'];
$price = (float) $_POST['price'];
$store = Store::get((int) $_POST['store']);

Report::create($product, $price, $store);

header('Location: ' . $_SERVER['DOCUMENT_ROOT']);