<?php
function connectToDatabase()
{
    // Create a connection
    $connection = new mysqli("localhost", "root", "", "crud_contact");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}
