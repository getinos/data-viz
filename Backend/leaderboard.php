<?php
    include 'config.php';

    $stmt = $conn->prepare("SELECT team_id, team_name FROM team order by team_id DESC");
    $stmt->execute();
   
    // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if (is_array($result)) {

        foreach($result as $row) {
            echo "<div class='team-rank'>
                    <span>".$row['team_name']."</span>
                    <span>".$row['team_id']." pts</span> 
                 </div>";
        }

    } else {

        echo "<div class='team-rank'>
                No teams found..
            </div>";

    }

?>