<?php
include './../DB/config.php';

$stmt = $conn->prepare("SELECT team_id, team_name FROM team ORDER BY team_id DESC");
$stmt->execute();

$result = $stmt->fetchAll();
if (is_array($result)) {
    $rank = 1;
    $totalTeams = count($result);
    foreach ($result as $row) {
        // Calculate brightness based on rank (higher rank = darker)
        $brightness = ($totalTeams / $rank)/4; // Adjust brightness scale

        echo "<div class='team-rank' style='background-color: hsla(348.23deg, 100%, 50%, {$brightness});'>
                <span>{$row['team_name']}</span>
                <span>{$row['team_id']} pts</span>
              </div>";
        $rank++;
    }
} else {
    echo "<div class='team-rank'> No teams found. </div>";
}
?>