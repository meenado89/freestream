<?php
// ALLOW ANY PAGE ON THIS SAME SERVER TO FETCH DATA FROM THIS FILE
header('Access-Control-Allow-Origin: *');

// TELL THE BROWSER THIS FILE RETURNS JSON DATA NOT HTML
header('Content-Type: application/json');

// BRING IN THE DATABASE CONNECTION — $conn IS NOW AVAILABLE TO USE
include '../includes/db.php';

// GET THE GENRE FILTER FROM THE URL IF IT EXISTS — EXAMPLE: api/movies.php?genre=horror
// IF NO GENRE IS PASSED IN THE URL, DEFAULT TO 'all'
$genre = isset($_GET['genre']) ? $_GET['genre'] : 'all';

// BUILD THE SQL QUERY — IF GENRE IS 'all' GET EVERYTHING, OTHERWISE FILTER BY GENRE
if ($genre === 'all') {
    // NO FILTER — FETCH ALL MOVIES FROM THE DATABASE
    $sql = "SELECT * FROM movies ORDER BY title ASC";
    $result = $conn->query($sql);
} else {
    // FILTER BY GENRE — USE PREPARED STATEMENT TO PREVENT SQL INJECTION ATTACKS
    $stmt = $conn->prepare("SELECT * FROM movies WHERE genre = ? ORDER BY title ASC");
    // BIND THE GENRE VALUE TO THE ? PLACEHOLDER — 's' MEANS STRING TYPE
    $stmt->bind_param('s', $genre);
    $stmt->execute();
    $result = $stmt->get_result();
}

// CREATE AN EMPTY ARRAY TO HOLD OUR MOVIES
$movies = [];

// LOOP THROUGH EACH ROW RETURNED FROM DATABASE AND ADD IT TO OUR ARRAY
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

// CONVERT THE PHP ARRAY TO JSON AND SEND IT TO THE BROWSER
echo json_encode($movies);

// CLOSE THE DATABASE CONNECTION — GOOD HABIT TO ALWAYS CLOSE WHEN DONE
$conn->close();
?>
