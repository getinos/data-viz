
<?php
    
    require_once './../DB/config.php';

    $currentId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Fetch the current record
    $sql = "SELECT * FROM player_details WHERE player_id = :currentId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":currentId", $currentId, PDO::PARAM_INT);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record):
        
        $img_path = "../images/Players/";
        $img = htmlspecialchars($record['player_img']);
        $name = htmlspecialchars($record['player_name']);
        $role = htmlspecialchars($record['player_specialism']);
        $price = htmlspecialchars($record['player_price']);
        $run4 = htmlspecialchars($record['player_4s']);
        $run6 = htmlspecialchars($record['player_6s']);
        $wkts = htmlspecialchars($record['player_wkts']);
        $matches = htmlspecialchars($record['player_ipl_mat']);
        $status = htmlspecialchars($record['player_status']);
        $catches = htmlspecialchars($record['player_catches']);
        $run_outs = htmlspecialchars($record['player_run_outs']);
        $stump = htmlspecialchars($record['player_stumpings']);

            echo " <div class='image-div'>
                        <div class='player-card'>
                            <div class='banner'>Player Name
                                <img src='".$img_path.$img."' alt='Player Image' class='player-img'>
                            </div>
                            
                            <button id='player-name'>
                                <p>$name</p>
                            </button> 
                        </div>  
                    </div>";
            
            echo "  <div class='player-stats'>
                <div class='stat'>
                    <h3>$matches</h3>
                    <p>Matches</p>
                </div>
            
                <div class='stat'>
                    <h3>"//.($run4*4)+($run6*6).//
                    
                    
                    $role"</h3>
                    <p>Specialisation</p>
                </div>
            
                <div class='stat'>
                    <h3> $wkts</h3>
                    <p>Wickets</p>
                </div>
    
                <div class='stat'>
                    <h3>$status</h3>
                    <p>Player Type</p>
                </div>

            </div>";

    else: "<p>No record found</p>"; 
    endif;
?>
