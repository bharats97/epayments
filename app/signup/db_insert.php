<?php

include_once('../connection/connect.php');

session_start();

if (isset($_SESSION['user_id']) or !isset($_POST['contact'])) {
    include('../connection/disconnect.php');
    header('Location: http://localhost/epayments/accounts/user/');
    exit();
} else {
    $contact = $connection->real_escape_string($_POST['contact']);
    $firstname = $connection->real_escape_string($_POST['firstname']);
    $middlename = $connection->real_escape_string($_POST['middlename']);
    $lastname = $connection->real_escape_string($_POST['lastname']);
    $password = $connection->real_escape_string($_POST['password']);

    $statement = "INSERT INTO `user_details` (`contact`, `first_name`, "
                 . "`middle_name`, `last_name`) VALUES ('$contact', "
                 . "'$firstname', '$middlename', '$lastname');";

    if (($connection->query($statement)) === FALSE) {
        include('../connection/disconnect.php');
        header('Location: http://localhost/epayments/error/');
        exit();
    }

    $statement = "INSERT INTO `login_credentials` (`contact`, `password`)"
                 . " VALUES ('$contact', '$password');";

    if (($connection->query($statement)) === FALSE) {
        include('../connection/disconnect.php');
        header('Location: http://localhost/epayments/error/');
        exit();
    }

    $result = $connection->query("SELECT `user_id` from `user_details` "
                                 . "WHERE `contact` = '$contact';");

    if ($result === FALSE or $result->num_rows === 0) {
        include('../connection/disconnect.php');
        header('Location: http://localhost/epayments/error/');
        exit();
    }

    $user_id = ($result->fetch_assoc())['user_id'];
    $statement = "INSERT INTO `user_wallet` (`user_id`) VALUES ('$user_id');";

    if (($connection->query($statement)) === FALSE) {
        include('../connection/disconnect.php');
        header('Location: http://localhost/epayments/error/');
        exit();
    }

    $_SESSION['status'] = 'logged_in';
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = trim($firstname . ' ' . $middlename . ' ' . $lastname);

    include('../connection/disconnect.php');
    header('Location: http://localhost/epayments/accounts/user/');
    exit();
}

include_once('../connection/disconnect.php');
