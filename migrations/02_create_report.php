<?php
$connection = require_once('dbconnection.php');

$query = "CREATE TABLE grocery.Report (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(255),
    price FLOAT,
    store INT UNSIGNED,
    time DATETIME,
    FOREIGN KEY (store) REFERENCES Store(id) 
    )";

if ($connection->query($query) === true)
{
    print "Created table Report.\n";
}
else
{
    print "$connection->error\n";
}