const teams = [
    {
        name: "CSK",
        logo: "https://upload.wikimedia.org/wikipedia/en/2/2b/Chennai_Super_Kings_Logo.svg",
        players: [
            { name: "MS Dhoni", role: "Wicketkeeper", price: "₹9 Cr", image: "dhoni.jpg" },
            { name: "Ravindra Jadeja", role: "All-rounder", price: "₹7 Cr", image: "jadeja.jpg" },
            { name: "Ruturaj Gaikwad", role: "Batsman", price: "₹6 Cr", image: "gaikwad.jpg" }
        ],
        score: 1500
    },
    {
        name: "RCB",
        logo: "https://upload.wikimedia.org/wikipedia/en/2/2a/Royal_Challengers_Bangalore_2020.svg",
        players: [
            { name: "Virat Kohli", role: "Batsman", price: "₹8.5 Cr", image: "kohli.jpg" },
            { name: "Faf du Plessis", role: "Batsman", price: "₹7.5 Cr", image: "faf.jpg" },
            { name: "Glenn Maxwell", role: "All-rounder", price: "₹7 Cr", image: "maxwell.jpg" }
        ],
        score: 1400
    }
];

let currentPlayerIndex = 0;
let allPlayers = [];

// Extract all players from teams into a separate array
teams.forEach(team => {
    team.players.forEach(player => {
        allPlayers.push({ ...player, teamName: team.name });
    });
});

// Function to update leaderboard
function updateLeaderboard() {
    const leaderboardList = document.getElementById('leaderboard-list');
    leaderboardList.innerHTML = teams
        .sort((a, b) => b.score - a.score)
        .map(team => `
            <div class="team-rank">
                <span>${team.name}</span>
                <span>${team.score} pts</span>
            </div>
        `).join('');
}

// Function to update the current player display
function updateCurrentPlayer() {
    if (currentPlayerIndex >= allPlayers.length) {
        alert("All players have been assigned!");
        return;
    }

    let currentPlayer = allPlayers[currentPlayerIndex];

    // Mock statistics for testing
    let randomStats = {
        runs: Math.floor(Math.random() * 1000),
        average: (Math.random() * 50).toFixed(2),
        strikeRate: (Math.random() * 150).toFixed(1),
        matches: Math.floor(Math.random() * 20) + 1
    };

    // Update UI elements
    document.getElementById("player-name").innerText = currentPlayer.name;
    document.getElementById("player-role").innerText = currentPlayer.role;
    document.getElementById("current-bid").innerText = `Current Bid: ${currentPlayer.price}`;
    document.getElementById("player-runs").innerText = randomStats.runs;
    document.getElementById("player-average").innerText = randomStats.average;
    document.getElementById("player-strike-rate").innerText = randomStats.strikeRate;
    document.getElementById("player-matches").innerText = randomStats.matches;

    // Update player image (default if missing)
    let imageElement = document.getElementById("player-image");
    imageElement.src = currentPlayer.image ? currentPlayer.image : "default-player.png";
}

// Function to handle "Next Player" button click
function nextPlayer() {
    if (currentPlayerIndex >= allPlayers.length) return;

    let player = allPlayers[currentPlayerIndex];

    // Find the player's team and add them to their respective team
    let team = teams.find(t => t.name === player.teamName);
    if (team) {
        team.players.push(player);
    }

    // Move to next player
    currentPlayerIndex++;

    // Update UI components
    updateLeaderboard();
    createTeamCards();
    updateCurrentPlayer();
}

// Function to create team cards
function createTeamCards() {
    const teamListContainer = document.getElementById('team-list-container');
    teamListContainer.innerHTML = teams.map(team => `
        <div class="team-card">
            <div class="team-header">
                <img src="${team.logo}" alt="${team.name} Logo" class="team-logo">
                <h3 class="team-name">${team.name}</h3>
            </div>
            <div class="players-scroll">
                ${team.players.map(player => `
                    <div class="player-card">
                        <img src="${player.image ? player.image : 'default-player.png'}" alt="${player.name}">
                        <div>${player.name}</div>
                        <div>${player.role}</div>
                        <div>${player.price}</div>
                    </div>
                `).join('')}
            </div>
        </div>
    `).join('');
}

// Attach event listener to "Next Player" button
document.getElementById("next-player-btn").addEventListener("click", nextPlayer);

// Initialize UI
updateCurrentPlayer();
updateLeaderboard();
createTeamCards();
