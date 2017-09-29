<?php

$user = "root";
$password = "b-212476";
$host = "localhost";
$db_name = "chat";

$connection = new mysqli($host, $user, $password, $db_name);

function formatDate($date) {
    return date('g:i a', strtotime($date));
}

?>