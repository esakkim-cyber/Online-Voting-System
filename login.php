<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voter_id = $_POST['voter_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM voters WHERE voter_id='$voter_id' AND is_approved=1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['voter_id'] = $voter_id;
        header("Location: vote.php");
    } else {
        echo "Invalid Voter ID or Not Approved Yet.";
    }
}
?>

<form method="POST">
    <input type="text" name="voter_id" placeholder="Voter ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
