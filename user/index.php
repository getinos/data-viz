<?php
    include './Backend/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="team-details">


            <h2 style="margin:0%; color: #fbdb9c;"><?php echo $_SESSION["username"]."'s team" ?></h2>
            <?php
               echo '<a href="./Backend/logout.php">Logout</a>';
            ?>
            <div class="role-tracker">
                <?php include 'Backend/player_tracker.php'; ?>
                <!-- Batsmen -->
                <!-- <div class="role">
                    <img src="../images/styles/batsmen.png" alt="Batsman">
                   <p class="team-role">Batsman 1</p>
                </div>
                <div class="role">
                    <img src="../images/styles/batsmen.png" alt="Batsman">
                    <p class="team-role">Batsman 2</p>
                </div>
                <div class="role">
                    <img src="../images/styles/batsmen.png" alt="Batsman">
                    <p class="team-role">Batsman 3</p>
                </div> -->

                <!-- Bowlers -->
                <!-- <div class="role">
                    <img src="../images/styles/batsmen.png" alt="Batsman">
                    <p class="team-role">Bowler 1</p>
                </div>
                <div class="role">
                    <img src="../images/styles/batsmen.png" alt="Batsman">
                    <p class="team-role">Bowler 2</p>
                </div>
                <div class="role">
                    <img src="batsmen.png" alt="Bowler">
                    <p class="team-role">Bowler 3</p>
                </div> -->

                <!-- All-Rounders -->
                <!-- <div class="role">
                    <img src="batsmen.png" alt="All-Rounder">
                    <p class="team-role">All-Rounder 1</p>
                </div>
                <div class="role">
                    <img src="batsmen.png" alt="All-Rounder">
                    <p class="team-role">All-Rounder 2</p>
                </div> -->

                <!-- Wicket Keepers -->
                <!-- <div class="role">
                    <img src="batsmen.png" alt="Wicket Keeper">
                    <p class="team-role">Wicket Keeper</p>
                </div>
                <div class="role">
                    <img src="batsmen.png" alt="Uncapped">
                    <p class="team-role">Uncapped</p>
                </div>
                <div class="role">
                    <img src="batsmen.png" alt="Uncapped">
                    <p class="team-role">Uncapped</p>
                </div> -->
            </div>
            
            <div>
                <?php include 'Backend/player_category.php'; ?>
                <!-- Batsmen -->
                <!-- <div class="player-category">
                    <p class="category-title">Batsmen</p>
                    <div class="slots">
                        <div class="slot"></div>
                        <div class="slot"></div>
                        <div class="slot"></div>
                    </div>
                </div> -->

                <!-- Bowlers -->
                <!-- <div class="player-category">
                    <p class="category-title">Bowlers</p>
                    <div class="slots">
                        <div class="slot"></div>
                        <div class="slot"></div>
                        <div class="slot"></div>
                    </div>
                </div> -->

                <!-- All-Rounders -->
                <!-- <div class="player-category">
                    <p class="category-title">All-Rounders</p>
                    <div class="slots">
                        <div class="slot"></div>
                        <div class="slot"></div>
                    </div>
                </div> -->

                <!-- Wicketkeeper -->
                <!-- <div class="player-category">
                    <p class="category-title">Wicketkeeper</p>
                    <div class="slots">
                        <div class="slot"></div>
                    </div>

                </div> -->

                <!--Overseas-->
                <!-- <div class="player-category">
                    <p class="category-title">Overseas</p>
                    <div class="slots">
                        <div class="slot"></div>
                        <div class="slot"></div>
                        <div class="slot"></div>
                        <div class="slot"></div>
                    </div>

                </div> -->

                <!--Uncapped-->
                <!-- <div class="player-category">
                    <p class="category-title">Uncapped</p>
                    <div class="slots">
                        <div class="slot"></div>
                        <div class="slot"></div>
                    </div>

                </div> -->

            </div>  
        </div>

        <div class="hero-section">
            
            <?php include 'Backend/player_details.php'; ?>

            <!-- <div class="image-div">
                <div class="player-card">
                    <div class="banner">Player Name
                        <img src="../images/Players/vk.png" alt="Player Image" class="player-img">
                    </div>
                    
                    <button id="player-name">
                        <p>Virat Kohli</p>
                    </button> 
                </div>  
            </div> -->
            
            <!-- <div class="player-name-container">
                        </div> -->
            <!-- <div class="player-stats">
                <div class="stat">
                    <h3>100</h3>
                    <p>Matches</p>
                </div>
            
                <div class="stat">
                    <h3>3500</h3>
                    <p>Runs</p>
                </div>
            
                <div class="stat">
                    <h3>120</h3>
                    <p>Wickets</p>
                </div>
    
                <div class="stat">
                    <h3>150</h3>
                    <p>Strike Rate</p>
                </div>

            </div> -->
        
          <div class="bidding-card">
            <div class="left-section">
              <div class="current-price">
                <span>💰 Current Price</span>
                <span id="current-price-value"></span>
              </div>
              <div class="amount-remaining">
                <span>💵 Purse Remaining</span>
                <span id="amount-remaining-value">₹10,000 L</span>
              </div>
            </div>
            <div class="right-section">
              <div class="timer">
                <span>⏳ Time Left</span>
                <span id="timer">01:00</span>
                <div class="progress-bar">
                  <div id="progress"></div>
                </div>
              </div>
              <!-- <button id="bid-button">✨ Bid Now (+₹25 L)</button> -->
              <?php include 'Backend/bidder.php'; ?>
            </div>
          </div>
        
          <!-- Sound Effect for Bid Button -->
          <audio id="bid-sound" src="bid_sound.mp3"></audio>
        </div>

        <div class="bidding-history">
            <div class="bidding-history-container">
                <div class="timer-container">
                    <h2 style="color:#fbdb9c;">📜 Bidding History</h2>
                    <!--<div class='stat-item'><span>TIME:</span> <span id='player-wickets'>90s</span>
                    </div>-->
                </div>

                <!-- <div id="bidding-history" class="bidding-history-box">
                    <p>balboli</p>
                </div> -->

                <?php include 'Backend/bidding_history.php'; ?>

            </div>
        </div>
    </div>  
        <script src="./script/script.js"></script>
</body>

</html>
