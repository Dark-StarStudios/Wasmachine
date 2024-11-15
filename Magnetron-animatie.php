<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Microwave Animation</title>
<style>
  /* Main container styling */
  .microwave {
    position: relative;
    width: 300px;
    height: 180px;
    border-radius: 20px;
    background: linear-gradient(to bottom, #e0e0e0, #bdbdbd);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  /* Timer display styling */
  .timer {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 20px;
    color: #000;
    background: rgba(255, 255, 255, 0.8);
    padding: 5px 10px;
    border-radius: 5px;
  }

  /* Temperature display styling */
  .temp-display {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    color: #000;
  }

  /* Window styling with gradient */
  .window {
    width: 80%;
    height: 60%;
    border-radius: 10px;
    background: linear-gradient(to bottom, #d0d0d0, #f5f5f5, #d0d0d0);
    position: relative;
  }

  /* Animated loading bar inside the window */
  .loading-bar {
    width: 50%;
    height: 20px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    animation: loading 3s infinite ease-in-out;
  }

  /* Loading animation */
  @keyframes loading {
    0% { width: 10%; }
    50% { width: 80%; }
    100% { width: 10%; }
  }
</style>
</head>
<body>

<!-- Microwave container -->
<div class="microwave">
  <!-- Timer display -->
  <div class="timer" id="timer">00:30</div>
  <!-- Temperature display -->
  <div class="temp-display" id="temp">0°C</div>
  <!-- Microwave window with loading bar -->
  <div class="window">
    <div class="loading-bar"></div>
  </div>
</div>

<script>
  // Initial time in seconds
  let timeRemaining = 30;
  // Initial temperature in Celsius
  let temp = 20;

  // Timer and Temperature update function
  function updateMicrowave() {
    // Update timer display
    const timerDisplay = document.getElementById("timer");
    const minutes = String(Math.floor(timeRemaining / 60)).padStart(2, '0');
    const seconds = String(timeRemaining % 60).padStart(2, '0');
    timerDisplay.textContent = `${minutes}:${seconds}`;

    // Update temperature display
    const tempDisplay = document.getElementById("temp");
    tempDisplay.textContent = `${temp}°C`;

    // Countdown timer logic
    if (timeRemaining > 0) {
      timeRemaining--;
      temp += 1;  // Increase temperature over time
    }
  }

  // Update microwave display every second
  setInterval(updateMicrowave, 1000);
</script>

</body>
</html>
