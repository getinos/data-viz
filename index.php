<?php
    // require "Backend/config.php";

    // $currentId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // // Fetch the current record
    // $sql = "SELECT * FROM player_details WHERE player_id = :currentId";
    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(":currentId", $currentId, PDO::PARAM_INT);
    // $stmt->execute();

    // $record = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL Bidding Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Left: Leaderboard -->
        <div class="leaderboard">
            <h2>🏆 Leaderboard</h2>
            <div id="leaderboard-list">
                <?php include 'Backend/leaderboard.php'; ?>
            </div>
            <!--  -->
        </div>
       
        
  
        <!-- Center: Current Player Panel -->
        <div class="current-player">
            <!-- <div class="player-image-container">
                <img id="player-image" src="default-player.png" alt="Player">
            </div>
            <h2 id="player-name">Player Name</h2>
            <p class="role" id="player-role">Role</p>
            <div class="current-bid" id="current-bid">Current Bid: ₹0 Cr</div>
            <div class="current-bidder" id="current-bidder"><strong>Bidder:</strong> None</div>

            <div class="player-stats">
                <div class="stat-item"><span>Runs:</span> <span id="player-runs">0</span></div>
                <div class="stat-item"><span>Average:</span> <span id="player-average">0.00</span></div>
                <div class="stat-item"><span>Strike Rate:</span> <span id="player-strike-rate">0.0</span></div>
                <div class="stat-item"><span>Matches:</span> <span id="player-matches">0</span></div>
            </div> -->
            
            <?php include 'Backend/player_details.php'; ?>

        </div>

        <!-- Right: Team List -->
       <!-- <div class="team-list">
            <h2>Team Squads</h2>
            <div id="team-list-container"></div>
        </div>-->
        <div class="bidding-history-container">
                <h2>📜 Bidding History</h2>
                <div id="bidding-history" class="bidding-history-box"></div>
            </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
