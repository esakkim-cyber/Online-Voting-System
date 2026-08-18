<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $voter_id = uniqid("VOTER_");

    $sql = "INSERT INTO voters (name, email, password, voter_id) VALUES ('$name', '$email', '$password', '$voter_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Your Voter ID: $voter_id";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
