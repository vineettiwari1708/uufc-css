<?php
/*
Template Name: AI Custom calculating
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating Your AI House Plan...</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aiuf-progress.css">
       
</head>

<body>

<div class="container">
    <div class="progress-wrapper">
        <svg class="progress-ring" width="220" height="220">
            <circle class="progress-ring-bg" cx="110" cy="110" r="90" />
            <circle class="progress-ring-fill" cx="110" cy="110" r="90" />
        </svg>
        <div class="progress-text">0%</div>
    </div>

    <div id="message">Initializing AI system...</div>
</div>

<script>
    const circle = document.querySelector(".progress-ring-fill");
    const text = document.querySelector(".progress-text");
    const message = document.getElementById("message");

    const radius = 90;
    const circumference = 2 * Math.PI * radius;

    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = circumference;

    // Random duration between 15-20 seconds
    const duration = Math.floor(Math.random() * 5000) + 15000;
    const intervalTime = duration / 100;

    let percent = 0;

    const messages = [
        "Analyzing your plot dimensions...",
        "Designing optimized room layout...",
        "Calculating sunlight direction...",
        "Optimizing ventilation flow...",
        "Planning parking allocation...",
        "Structuring bedroom proportions...",
        "Positioning bathrooms efficiently...",
        "Generating structural blueprint...",
        "Applying modern architectural style...",
        "Finalizing your AI house design..."
    ];

    // Shuffle messages
    const shuffled = messages.sort(() => Math.random() - 0.5);
    let msgIndex = 0;

    const interval = setInterval(() => {
        percent++;

        const offset = circumference - (percent / 100) * circumference;
        circle.style.strokeDashoffset = offset;
        text.textContent = percent + "%";

        // Change message every 10%
        if (percent % 10 === 0 && msgIndex < shuffled.length) {
            message.style.opacity = 0;

            setTimeout(() => {
                message.textContent = shuffled[msgIndex];
                message.style.opacity = 1;
                msgIndex++;
            }, 300);
        }

        if (percent >= 100) {
            clearInterval(interval);

            setTimeout(() => {
                window.location.href = "https://urbanfeatconstruction.com/aiuf-cf/";  // Replace with the correct URL
            }, 1000);
        }

    }, intervalTime);
</script>

</body>
</html>
