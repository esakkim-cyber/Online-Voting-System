<?php
include 'db.php';

if (isset($_GET['approve'])) {
    $voter_id = $_GET['approve'];
    $conn->query("UPDATE voters SET is_approved=1 WHERE voter_id='$voter_id'");
    echo "Voter approved successfully!<br>";
}

$result = $conn->query("SELECT * FROM voters WHERE is_approved=0");
echo "<h3>Pending Approvals</h3>";
while ($row = $result->fetch_assoc()) {
    echo $row['name'] . " - " . $row['voter_id'] . " ";
    echo "<a href='?approve=".$row['voter_id']."'>Approve</a><br>";
}
?>
