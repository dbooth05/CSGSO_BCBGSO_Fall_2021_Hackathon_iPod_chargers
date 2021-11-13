<?php
$connection = require_once('dbconnection.php');

$query = "CREATE DATABASE IF NOT EXISTS grocery;";
$query = "CREATE TABLE grocery.Store (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    address VARCHAR(255)
    );";

if ($connection->query($query) === true)
{
    print "Created table Store.\n";
}
else
{
    print "$connection->error\n";
}