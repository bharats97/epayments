<?php

if (isset($connection)) {
    $connection->close();
    unset($connection);
}
