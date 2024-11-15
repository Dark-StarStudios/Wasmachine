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
    height: 250px;
    border-radius: 20px;
    background: linear-gradient(to bottom, #e0e0e0, #bdbdbd);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    padding-top: 20px;
    flex-direction: column; /* Align items vertically */
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
    cursor: pointer;
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
    width: 10%;
    height: 20px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
  }

  /* Control button container */
  .button-container {
    display: flex;
    justify-content: space-around;
    width: 100%;
    position: absolute;
    bottom: 10px;
    padding: 0 20px;
  }

  /* Button styling */
  .control-button {
    padding: 8px 16px;
    font-size: 14px;
    color: #fff;
    background-color: #333;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .control-button:hover {
    background-color: #555;
  }

  /* Animation */
  @keyframes loadingAnimation {
    0% { width: 10%; }
    50% { width: 50%; }
    100% { width: 10%; }
  }
</style>
</head>
<body>

<!-- Microwave container -->
<div class="microwave">
  <!-- Timer display -->
  <div class="timer" id="timer">00:30</div>
  <!-- Temperature display (clickable) -->
  <div class="temp-display" id="temp" onclick="increaseTemp()">20°C</div>
  <!-- Microwave window with loading bar -->
  <div class="window">
    <div class="loading-bar" id="loading-bar"></div>
  </div>
  
  <!-- Control buttons container -->
  <div class="button-container">
    <button class="control-button" id="startButton" onclick="toggleMicrowave()">Start</button>
    <button class="control-button" onclick="openMicrowave()">Open</button>
    <button class="control-button" onclick="resetMicrowave()">Reset</button>
  </div>
</div>

<script>
  // Initial time in seconds
  let timeRemaining = 30;
  // Initial temperature in Celsius
  let temp = 20;
  // Variable to track if the microwave is running
  let isRunning = false;
  let timerInterval = null;

  // Function to update timer and temperature display
  function updateMicrowave() {
    if (timeRemaining > 0 && isRunning) {
      timeRemaining--;
      temp += 1;  // Increase temperature over time
      updateDisplay();
    } else if (timeRemaining <= 0) {
      clearInterval(timerInterval);  // Stop the interval when time is up
      isRunning = false; // Stop the microwave when time reaches zero
      document.getElementById("startButton").textContent = "Start";
      toggleAnimation(false); // Stop animation when time is up
    }
  }

  // Function to start or stop the microwave
  function toggleMicrowave() {
    const startButton = document.getElementById("startButton");
    
    if (!isRunning) {
      // Start the microwave
      isRunning = true;
      startButton.textContent = "Stop";
      timerInterval = setInterval(updateMicrowave, 1000);  // Update every second
      toggleAnimation(true);
    } else {
      // Stop the microwave
      isRunning = false;
      startButton.textContent = "Start";
      clearInterval(timerInterval);
      toggleAnimation(false);
    }
  }

  // Function to open (stop) the microwave
  function openMicrowave() {
    isRunning = false;  // Stop the microwave
    clearInterval(timerInterval);  // Clear the interval to stop the timer
    toggleAnimation(false); // Stop animation
    document.getElementById("startButton").textContent = "Start";
  }

  // Function to reset the microwave
  function resetMicrowave() {
    isRunning = false;  // Stop the microwave
    clearInterval(timerInterval);  // Clear any existing timer
    timeRemaining = 30;  // Reset time to 30 seconds
    temp = 20;  // Reset temperature to 20°C
    updateDisplay();  // Update the timer and temperature display
    toggleAnimation(false);  // Stop the animation
    document.getElementById("startButton").textContent = "Start";  // Set button text to "Start"
  }

  // Function to update the timer and temperature display
  function updateDisplay() {
    const timerDisplay = document.getElementById("timer");
    const minutes = String(Math.floor(timeRemaining / 60)).padStart(2, '0');
    const seconds = String(timeRemaining % 60).padStart(2, '0');
    timerDisplay.textContent = `${minutes}:${seconds}`;

    const tempDisplay = document.getElementById("temp");
    tempDisplay.textContent = `${temp}°C`;
  }

  // Function to increase the temperature when clicking on the temp display
  function increaseTemp() {
    if (isRunning) {
      temp += 5;  // Increase temperature by 5°C when clicked
      updateDisplay();
    }
  }

  // Function to toggle the animation of the loading bar
  function toggleAnimation(start) {
    const loadingBar = document.getElementById("loading-bar");
    if (start) {
      loadingBar.style.animation = "loadingAnimation 1s infinite ease-in-out";
    } else {
      loadingBar.style.animation = "none";
    }
  }

  // Initial display update
  updateDisplay();
</script>

</body>
</html>
