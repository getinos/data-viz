<?php
    include 'config.php';
    
    $stmt = $conn->prepare("SELECT * FROM player_details where player_id=1 Limit 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (is_array($row)) {

            echo "  
                     
                 <div class='player-image-container'>
                    <img id='player-image' src=".$row['player_img']." alt='Player'>
                 </div>
                <div class='bid-details'>
                    <h2 id='player-name'>".$row['player_name']."</h2>
                    <p class='role' id='player-role'>".$row['player_specialism']."</p>
                
                    <div class='current-bid' id='current-bid'>Current Bid: ₹".$row['player_price']." Cr</div>
                    <div class='current-bidder' id='current-bidder'><strong>Bidder:</strong> None</div>
               
            
                <div class='player-stats'>
                    <div class='stat-item'><span>Runs:</span> <span id='player-runs'>".$row['player_4s']."</span></div>
                    <div class='stat-item'><span>Average:</span> <span id='player-average'>".$row['player_points']."</span></div>
                    <div class='stat-item'><span>Strike Rate:</span> <span id='player-strike-rate'>".$row['player_6s']."</span></div>
                    <div class='stat-item'><span>Matches:</span> <span id='player-matches'>".$row['player_ipl_mat']."</span></div>
                </div>";
    }

?>