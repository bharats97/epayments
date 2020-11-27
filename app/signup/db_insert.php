<?php
    require("dbconn.php");
     $stmt = $conn->prepare("INSERT INTO user_details (contact, first_name, middle_name, last_name)
     VALUES (:contact, :first_name, :middle_name, :last_name);
     INSERT INTO login_credentials (contact, password) VALUES ( :contact, :password)");
     $stmt->bindParam(':contact', $contact);
     $stmt->bindParam(':first_name', $firstname);
     $stmt->bindParam(':middle_name', $middlename);
     $stmt->bindParam(':last_name', $lastname);
     $stmt->bindParam(':password', $password);

     if (isset($_POST['contact'])) {
         $contact = $_POST['contact'];
         $firstname = $_POST['firstname'];
         $middlename = $_POST['middlename'];
         $lastname = $_POST['lastname'];
         $password = $_POST['password'];
         $stmt->execute();
         require("dbshow.php");
     }
