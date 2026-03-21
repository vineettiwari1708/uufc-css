<?php
/*
Template Name: AI Custom thnaks
*/
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="AI-powered form submission confirmation" />
<title>Submission Confirmation</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aiuf-form.css">

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: radial-gradient(circle at center, #111827, #030712);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

			/* #quiz-container {
				background: transparent;
				border-radius: 12px;
				width: 90%;
				max-width: 520px;
				min-height: 65vh;
				max-height: 90vh;
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-bottom: 16px;
				box-shadow: 0 0 15px rgba(0, 242, 255, 0.3);
			} */

		

.form-box {
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    
    border-radius: 15px;
    width: 90%;
    max-width: 520px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
    box-shadow: 0 0 15px rgba(0, 242, 255, 0.3);
}
.form-box:hover {
				box-shadow:
					0 0 20px #00f2ff,
					0 0 40px #00f2ff,
					0 0 60px #00f2ff;
			}


.ai_logo_image {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 15px;
}

.ai_logo_image img {
    width: 150px;
}

.ai_logo {
    position: relative;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #001f2e;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: visible;
}

.ai_logo::before,
.ai_logo .pulse2,
.ai_logo .pulse3 {
    content: '';
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(10px);
}

.ai_logo::before {
    width: 20%;
    height: 20%;
    top: 50%;
    left: 50%;
    background: rgba(0, 242, 255, 0.5);
    transform: translate(-50%, -50%);
    animation: pulse1 2s infinite;
    z-index: 5;
}

.ai_logo .pulse2 {
    width: 30%;
    height: 30%;
    top: 50%;
    left: 50%;
    background: rgba(0, 195, 255, 0.4);
    transform: translate(-50%, -50%);
    animation: pulse2 3s infinite;
    z-index: 5;
}

.ai_logo .pulse3 {
    width: 25%;
    height: 25%;
    top: 50%;
    left: 50%;
    background: rgba(0, 242, 255, 0.3);
    transform: translate(-50%, -50%);
    animation: pulse3 4s infinite;
    z-index: 5;
}

.text_orbit_wrapper {
    position: relative;
    display: inline-block;
    z-index: 20;
}

.logo_text {
    font-weight: bold;
    font-size: 1.5rem;
    color: white;
    position: relative;
    z-index: 20;
}

.orbit-container {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    transform-origin: center center;
    animation: orbit-rotate 3s linear infinite;
}

.orbit {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: white;
    top: 0;
    left: 0;
    transform: rotate(var(--angle)) translateX(30px);
    transform-origin: center center;
    box-shadow:
        0 0 6px rgba(0, 242, 255, 0.8),
        -2px 0 4px rgba(0, 242, 255, 0.6),
        -4px 0 3px rgba(0, 242, 255, 0.4),
        -6px 0 2px rgba(0, 242, 255, 0.2);
    animation: flicker 1s infinite alternate;
}

/* Animations */
@keyframes orbit-rotate { 0% { transform: rotate(0deg);} 100% { transform: rotate(360deg);} }
@keyframes flicker { 0% { transform: rotate(var(--angle)) translateX(30px) scale(0.8); opacity:0.6; } 50% { transform: rotate(var(--angle)) translateX(30px) scale(1.2); opacity:1;} 100% { transform: rotate(var(--angle)) translateX(30px) scale(0.7); opacity:0.5; } }
@keyframes pulse1 { 0%{width:0;height:0;opacity:.7}50%{width:80%;height:80%;opacity:.25}100%{width:0;height:0;opacity:0} }
@keyframes pulse2 { 0%{width:0;height:0;opacity:.6}50%{width:100%;height:100%;opacity:.2}100%{width:0;height:0;opacity:0} }
@keyframes pulse3 { 0%{width:0;height:0;opacity:.5}50%{width:70%;height:70%;opacity:.15}100%{width:0;height:0;opacity:0} }

.confirmation-message {
    text-align: center;
    color: #00f2ff;
    font-size: 1.2rem;
    line-height: 1.5;
}

.confirmation-message h2 {
    margin-bottom: 12px;
    font-size: 1.5rem;
    color: #fff;
}

.confirmation-message p {
    margin: 8px 0;
}

.back-btn {
    padding: 12px 28px;
    font-size: 16px;
    color: #00f2ff;
    background: transparent;
    border: 2px solid #00f2ff;
    border-radius: 10px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    transition: all 0.3s ease;
    margin-bottom: 15px;
}

.back-btn:hover {
    background: #00f2ff;
    color: #030712;
    box-shadow: 0 0 20px #00f2ff,0 0 40px #00f2ff,0 0 60px #00f2ff;
}
</style>
</head>
<body>

<div class="form-box">

    <!-- Logo Section -->
    <div class="ai_logo_image">
        <img src="https://urbanfeatconstruction.com/wp-content/uploads/2025/07/Urbanfeat-Construction-White-258x96-1.png" alt="House Plan AI Logo" />
        <div class="ai_logo">
            <div class="text_orbit_wrapper">
                <span class="logo_text">AI</span>
                <div class="orbit-container">
                    <div class="orbit" style="--angle: 0deg"></div>
                    <div class="orbit" style="--angle: 120deg"></div>
                    <div class="orbit" style="--angle: 240deg"></div>
                </div>
            </div>
            <div class="pulse2"></div>
            <div class="pulse3"></div>
        </div>
    </div>

    <!-- Confirmation Message -->
    <div class="confirmation-message">
        <h2>Query Submitted!</h2>
        <p>Thank you for contacting us.</p>
        <p>AI-generated response has been sent to your WhatsApp number.</p>
        <p>Our executive will contact you soon.</p>
    </div>

    <button class="back-btn" onclick="window.location.href='https://urbanfeatconstruction.com/aiuf/'">Back to Home</button>
</div>

</body>
</html>
