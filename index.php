<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'voting_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling vote submission
if (isset($_POST['vote'])) {
    $candidate = $_POST['vote'];
    $conn->query("UPDATE candidates SET votes = votes + 1 WHERE name='$candidate'");
}

// Fetching results
$result = $conn->query("SELECT * FROM candidates");
$candidates = [];
while ($row = $result->fetch_assoc()) {
    $candidates[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Vote for Your Candidate</h1>
        <form method="POST">
            <?php foreach ($candidates as $candidate): ?>
                <button class="vote-btn" type="submit" name="vote" value="<?= $candidate['name'] ?>">
                    <img src="<?= $candidate['logo'] ?>" alt="<?= $candidate['name'] ?>">
                    <?= $candidate['name'] ?>
                </button>
            <?php endforeach; ?>
        </form>
    </div>
    
    <button id="showResult" class="result-btn">Show Results</button>
    <div id="results" class="results-container"></div>
</body>
</html>
