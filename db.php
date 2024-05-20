<?php
// Establish a connection to MySQL server
$conn = new mysqli("localhost", "root", "");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists
$db_selected = mysqli_select_db($conn, 'videoteka');

// If the database does not exist, create it
if (!$db_selected) {
    $sql = "CREATE DATABASE videoteka";
    if ($conn->query($sql) === TRUE) {
        // Select the newly created database
        $db_selected = mysqli_select_db($conn, 'videoteka');
        if (!$db_selected) {
            die("Database selection failed: " . $conn->error);
        }
    }
  }


if (!mysqli_query($conn, "DESCRIBE `users`") ) {
  // "users" table doesnt exist
  $create_user_table="CREATE TABLE `users` (
     `id` int(11) NOT NULL,
     `email` varchar(50) NOT NULL,
     `user_name` varchar(20) NOT NULL,
     `password` varchar(20) NOT NULL,
     `name` varchar(30) DEFAULT NULL,
     `is_logged` tinyint(1) DEFAULT NULL
   )";
  if ($conn->query($create_user_table) !== TRUE) {
  echo "Error creating table 'users': " . $conn->error;
  }
}

?>
