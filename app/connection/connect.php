<?php

$connection = new mysqli('localhost', 'root', '', 'epayments');

if ($connection->connect_error) {
    header('Location: http://localhost/epayments/error/');
    exit();
}
