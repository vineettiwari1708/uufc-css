<?php
/*
Template Name: AI Custom Page
*/
?>
<!DOCTYPE html>
<html>
<head>
  <title>Urbanfeat Construction AI</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aiuf.css">
</head>

<body>

<img src="https://urbanfeatconstruction.com/wp-content/uploads/2025/07/Urbanfeat-Construction-White-258x96-1.png" class="logo">

<div class="visualizer" id="visualizer"></div>

<!-- Stylish Button -->
<button class="action-button" onclick="goToForm()">Chat with AI</button>

<script>
  const visualizer = document.getElementById("visualizer");

  const BAR_COUNT = 40;
  let isSpeaking = false;

  // Create bars
  for (let i = 0; i < BAR_COUNT; i++) {
    const bar = document.createElement("div");
    bar.classList.add("bar");
    visualizer.appendChild(bar);
  }

  const bars = document.querySelectorAll(".bar");

  function animateBars() {
    if (isSpeaking) {
      bars.forEach((bar, i) => {
        const height =
          20 +
          Math.sin(Date.now() / 120 + i * 0.4) * 25 +
          Math.sin(Date.now() / 250 + i * 0.2) * 15;
        bar.style.height = Math.max(10, height) + "px";
      });
    }
    requestAnimationFrame(animateBars);
  }

  function speakWelcome() {
    const message = new SpeechSynthesisUtterance(
      "Welcome to Urbanfeat Construction AI Agent"
    );

    message.onstart = () => {
      isSpeaking = true;
      visualizer.style.opacity = "1";
    };

    message.onend = () => {
      isSpeaking = false;
      visualizer.style.opacity = "0";
    };

    speechSynthesis.speak(message);
  }

  animateBars();
  speakWelcome();

  setInterval(() => {
    speakWelcome();
  }, 15000);

  // Button click function

    function goToForm() {
    window.location.href = "https://urbanfeatconstruction.com/ai-form/";
}

</script>

</body>
</html>
