// let currentPrice = 80; // Current price in lakhs
let text = document.getElementById('bid-button').textContent; // Current price in lakhs
let currentPrice = text.match(/\d+/g).join("");

let spentPrice = document.getElementById('total_amount');
let amountRemaining = 10000 - spentPrice.defaultValue; // Amount remaining in lakhs (₹10,000 Lakhs)
console.log(spentPrice.defaultValue);
// let amountRemaining = 10000; // Amount remaining in lakhs (₹10,000 Lakhs)
let timeLeft = 90; // 90 seconds
let timerInterval;


// Sound Effect
const bidSound = document.getElementById('bid-sound');

// Update Display
function updateDisplay() {
  document.getElementById('current-price-value').textContent = `₹${currentPrice} L`;
  document.getElementById('amount-remaining-value').textContent = `₹${amountRemaining.toLocaleString()} L`; // Format with commas
  updateBidButton();
}

// Update Bid Button Text
function updateBidButton() {
  const bidIncrement = currentPrice < 100 ? 25 : 75; // ₹25 L or ₹75 L
  // document.getElementById('bid-button').textContent = `✨ Bid Now (+₹${bidIncrement} L)`;
}

// Update Timer
function updateTimer() {
  const minutes = Math.floor(timeLeft / 60);
  const seconds = timeLeft % 60;
  document.getElementById('timer').textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
  document.getElementById('progress').style.width = `${(timeLeft / 90) * 100}%`;

  if (timeLeft === 0) {
    clearInterval(timerInterval);
    document.getElementById('bid-button').disabled = true;
    alert('⏰ Bidding time is over!');
  } else {
    timeLeft--;
  }
}

// Handle Bidding
function placeBid() {
  // const bidIncrement = currentPrice < 100 ? 25 : 75; // ₹25 L or ₹75 L

  // Calculate total deduction
  // const totalDeduction = currentPrice < 100 ? currentPrice + bidIncrement : bidIncrement;

  // Check if enough amount is remaining
  // if (amountRemaining >= totalDeduction) {
  //   amountRemaining -= totalDeduction; // Deduct the total amount from the available balance
  //   currentPrice += bidIncrement; // Increase price by the determined bid increment
    // updateDisplay();

    // Play sound effect
    bidSound.play();

    // Trigger confetti animation
  // confetti({
  //     particleCount: 100,
  //     spread: 70,
  //     origin: { y: 0.6 }
  //   });
  // } else {
  //   alert('🚫 Not enough amount remaining to place a bid!');
  // }
}

function placeBid(a, b, c) {
      $.ajax({
        url: 'Backend/placeBid.php',
        type: 'POST',
        data: {
            team_id: a,
            amount: b,
            player_id: c
        },
        success: function(_response) {
            bid();
            // location.reload();
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
          
}

function bid() {
  // Play sound
  let audio = new Audio('bid_sound.mp3');
  audio.play();

  confetti({
    particleCount: 100,
    spread: 70,
    origin: { y: 0.6 }
  });

  setTimeout(() => {
    location.reload();
}, 1500);
}

// Start Timer
timerInterval = setInterval(updateTimer, 1000);

// Ensure jQuery is included
if (typeof $ === 'undefined') {
    alert('jQuery is not loaded. Please include jQuery in your project.');
}

// Add Event Listener to Bid Button
document.getElementById('bid-button').addEventListener('click', placeBid);

// Initial Display Update
updateDisplay();