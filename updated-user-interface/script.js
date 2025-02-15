
let timer;
let minutes = 0;
let seconds = 0;
let isRunning = false;

function updateTimerDisplay() {
    document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
    document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
}

function startTimer() {
    if (!isRunning) {
        isRunning = true;
        timer = setInterval(() => {
            seconds++;
            if (seconds === 60) {
                seconds = 0;
                minutes++;
            }
            updateTimerDisplay();
        }, 1000);
    }
}

function stopTimer() {
    clearInterval(timer);
    isRunning = false;
}

document.querySelector(".start-timer").addEventListener("click", startTimer);
document.querySelector(".stop-timer").addEventListener("click", stopTimer);
