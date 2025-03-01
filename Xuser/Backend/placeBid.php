<?php
    include '../../DB/config.php';

        $currentId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $currentBId = isset($_GET['bid']) ? intval($_GET['bid']) : 0;
        
    // Check if button_id is received
    if ($currentBId) {
        $stmt = $conn->prepare("INSERT INTO bidding (player_id, team_id, amount, time) VALUES (:player_id, :team_id, '100', NOW())");
        
        $stmt->bindParam(':player_id', $currentId, PDO::PARAM_INT);
        $stmt->bindParam(':team_id', $currentBId, PDO::PARAM_INT);
        $stmt->execute();

        echo "Button click recorded successfully!";
    } else {
        echo json_encode(["error" => "No button_id received"]);
    }

?>