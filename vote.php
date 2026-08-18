<?php
session_start();
if (!isset($_SESSION['voter_id'])) {
    header("Location: login.php");
    exit();
}
?>

<form action="process_vote.php" method="POST">
    <label>Select President:</label>
    <select name="candidate">
        <option value="Candidate A">DMK/option>
        <option value="Candidate B">TVK</option>
        <option value="Candidate A">ADMK</option>
    </select>
    <button type="submit">Vote</button>
</form>
