<?php
// DEFINE DATABASE CONNECTION SETTINGS AS CONSTANTS — CONSTANTS NEVER CHANGE ONCE SET
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'freestream');
define('DB_PORT', 3307); // WAMP MYSQL IS ON PORT 3307 NOT DEFAULT 3306

// CREATE A NEW MYSQLI CONNECTION OBJECT USING OUR CONSTANTS
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

// CHECK IF CONNECTION FAILED — IF SO STOP EVERYTHING AND SHOW THE ERROR
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>