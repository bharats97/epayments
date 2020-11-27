<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../connection/connect.php');

    $contact = $connection->real_escape_string($_POST['contact']);
    $password = $connection->real_escape_string($_POST['password']);

    $statement = "SELECT * FROM `login_credentials` WHERE `contact` = '"
                 . $contact . "';";
    $result = $connection->query($statement);

    if ($result === FALSE or $result->num_rows === 0) {
        include('../connection/disconnect.php');
        header('Location: http://localhost/epayments/error/');
        exit();
    } else {
        session_start();
        $_SESSION['status'] = 'logged_in';
        $statement = "SELECT `user_id` FROM `user_details` WHERE `contact` = '"
                     . $contact . "';";
        $result = $connection->query($statement);
        if ($result === FALSE or $result->num_rows === 0) {
            include('../connection/disconnect.php');
            header('Location: http://localhost/epayments/error/');
            exit();
        } else {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['first_name'];
            $_SESSION['name'] .= (strlen((string) $row['middle_name']) > 0 ?
                                 ' ' . $row['middle_name'] : '');
            $_SESSION['name'] .= (strlen((string) $row['last_name']) > 0 ?
                                 ' ' . $row['last_name'] : '');
        }
    }

    include_once('../connection/disconnect.php');
}
