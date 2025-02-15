
<?php

    $currentId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Fetch the current record
    $sql = "SELECT * FROM player_details WHERE player_id = :currentId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":currentId", $currentId, PDO::PARAM_INT);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record):
        echo "<p>
            <strong>Name:</strong> 
            <span id='record-name'>";
                echo htmlspecialchars($record['player_name']);
        echo "</span>
            </p>
            <p>
                <strong>Description:</strong>
                <span id='record-description'>";
                    echo htmlspecialchars($record['player_specialism']);
        echo "</span>
        </p>
        
        <button onclick='loadNextRecord()'>Next Record</button>";
    
    else: "<p>No record found</p>"; 
        endif;

?>