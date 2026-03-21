<?php
/*
Template Name: AI Custom client form
*/
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="AI-powered house plan generator form" />
<title>AI Form Page</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aiuf-cf.css">


</head>
<body>

<!-- Logo Section -->


<!-- Form Section -->
<div class="form-box">
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
  <form id="aiForm">
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" id="fullname" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label>Contact</label>
        <input type="tel" id="contact" placeholder="Mobile number" required>
    </div>

    <button type="button" class="submit-btn" id="submitBtn" disabled>
        Get Response
    </button>
</form>

<script>
const form = document.getElementById("aiForm");
const fullname = document.getElementById("fullname");
const email = document.getElementById("email");
const contact = document.getElementById("contact");
const submitBtn = document.getElementById("submitBtn");

function validateForm() {
    if (
        fullname.value.trim() !== "" &&
        email.value.trim() !== "" &&
        contact.value.trim().length === 10
    ) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
}

fullname.addEventListener("input", validateForm);
email.addEventListener("input", validateForm);
contact.addEventListener("input", validateForm);

submitBtn.addEventListener("click", function () {

    const name = fullname.value.trim();
    const userEmail = email.value.trim();
    const phone = contact.value.trim();

       const message = `Hello ${name},

Thank you for contacting us! 🎉

Your AI house plan request has been received.
Our executive will contact you soon.

- Team AI House Plan`;

    const whatsappNumber = "91" + phone; 
    // Sends message directly to CLIENT number entered in form

    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    // Open WhatsApp chat with client number
    window.open(whatsappURL, "_blank");

    // Redirect to confirmation page
    setTimeout(() => {
        window.location.href = "https://urbanfeatconstruction.com/aiuf-thanks/";
    }, 1200);

});
</script>
</body>
</html>

