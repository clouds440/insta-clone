<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'insta-db');

// connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check connection
if($conn === false) {
	die("Connecting to the database failed" . mysqli_connect_error());
}
else {
	// Database is now connected
	echo "";
}
?>