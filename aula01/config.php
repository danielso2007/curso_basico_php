<?php
$mysql = new mysqli('db', 'root', 'root', 'blog', '3306');
$mysql->set_charset('utf8');

if (!$mysql) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
