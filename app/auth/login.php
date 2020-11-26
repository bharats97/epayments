<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../connection/connect.php');

    $contact = $connection->real_escape_string($_POST['contact']);
    $password = $connection->real_escape_string($_POST['password']);

    $statement = "SELECT * FROM `login_credentials` WHERE `contact` = '"
                 . $contact . "';";
    $result = $connection->query($statement);

    if ($result === FALSE or $result->num_rows === 0) {
        // TODO: error
    } else {
        session_start();
        $_SESSION['status'] = 'logged_in';
        $statement = "SELECT `user_id` FROM `user_details` WHERE `contact` = '"
                     . $contact . "';";
        $result = $connection->query($statement);
        if ($result === FALSE or $result->num_rows === 0) {
            // TODO: error
        } else {
            $_SESSION['user_id'] = ($result->fetch_assoc())['user_id'];
        }
    }

    include_once('../connection/disconnect.php');
}
