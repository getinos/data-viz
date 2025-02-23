<?php
include './../DB/config.php';

// start

$currentId = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

// Check the amount of the bid 
$stmt1 = $conn->prepare("SELECT 
                            (SELECT GREATEST(pd.player_price, COALESCE(MAX(b.amount), 0)) AS max_price FROM player_details as pd
                             LEFT JOIN bidding as b ON pd.player_id = b.player_id
                             where pd.player_id > :currentId LIMIT 1) AS max_price,
                        * FROM team ORDER BY team_id DESC");
    $stmt1->bindParam(":currentId", $currentId, PDO::PARAM_INT);
    $stmt1->execute();

//     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

// //end

// $stmt = $conn->prepare("SELECT * FROM team ORDER BY team_id DESC");
// $stmt->execute();

$result = $stmt1->fetchAll();
if (is_array($result)) {
    $rank = 1;
    $totalTeams = count($result);
    foreach ($result as $row) {
        // Calculate brightness based on rank (higher rank = darker)
        // Calculate brightness based on rank (higher rank = darker)
        // The formula divides the total number of teams by the current rank and then scales it down by dividing by 4
        $brightness = ($totalTeams / $rank) / 4; // Adjust brightness scale

        echo "<div class='team-rank' style='background-color: hsla(348.23deg, 100%, 50%, {$brightness});'>
                <span>{$row['team_name']}</span>
                <span>{$row['team_id']} pts</span>
                <button style='font-size: 15px; padding: 5px;' onclick='placeBid({$row['team_id']})'>{$row['max_price']}</button>
              </div>";
        $rank++;
    }
} else {
    echo "<div class='team-rank'> No teams found. </div>";
}
?>