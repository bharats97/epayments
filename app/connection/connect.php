<?php

$connection = new mysqli('localhost', 'root', '', 'epayments');

if ($connection->connect_error) {
    fwrite(STDERR, 'Connection Error (' . $connection->connect_errno . '): '
                   . $connection->connect_error . PHP_EOL);
    unset($connection);
    exit(126);
}
