<?php

session_unset();
session_destroy();

header('Location: http://localhost/epayments/login/');
exit();
