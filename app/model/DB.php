<?php

$username = 'root';
$password = '';

try {
    $con = new PDO('mysql:host=localhost;dbname=desafiophp', $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
