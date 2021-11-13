<?php
$config = include_once('local.config.php');

return new mysqli($config->database->server, $config->database->username, $config->database->password);