<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voter_id = $_SESSION['voter_id'];
    $candidate = $_POST['candidate'];

    $checkVote = $conn->query("SELECT * FROM votes WHERE voter_id='$voter_id'");
    
    if ($checkVote->num_rows > 0) {
        echo "You have already voted!";
    } else {
        $sql = "INSERT INTO votes (voter_id, candidate) VALUES ('$voter_id', '$candidate')";
        if ($conn->query($sql) === TRUE) {
            echo "Vote Casted Successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
