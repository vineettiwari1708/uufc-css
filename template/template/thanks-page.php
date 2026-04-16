<div class="thankyou-card">

  <div class="icon-check">
    <img src="https://urbanfeatconstruction.com/wp-content/uploads/2025/07/logo.png" alt="UrbanFeat Construction Logo" />
  </div>

  <h1 class="thankyou-title">Thank You!</h1>

  <p class="thankyou-text">
    Your request has been successfully submitted.
  </p>

  <p class="thankyou-text">
    Our team at <b>UrbanFeat Construction</b> will contact you shortly.
  </p>

  <!-- CONTACT INFO -->
  <div class="contact-box">

    <a href="tel:+919335983969">📞 +91 9335983969</a>

    <a href="tel:+917239001002">📞 +91 7239001002</a>

    <a href="mailto:info@urbanfeatconstruction.com">📧 info@urbanfeatconstruction.com</a>

  </div>

  <a class="home-button" href="https://urbanfeatconstruction.com">
    Back to Home
  </a>

</div>

<style>

/* BACKGROUND */
body {
  background: linear-gradient(135deg, #f3f7f3, #ffffff);
  font-family: Arial, sans-serif;
}

/* CARD */
.thankyou-card {
  max-width: 600px;
  margin: 140px auto;
  text-align: center;
  padding: 45px;
  background: rgba(255,255,255,0.96);
  border-radius: 18px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.08);
  border: 1px solid #e9f3ea;
}

/* LOGO */
.icon-check img {
  width: 140px;
  height: auto;
  margin-bottom: 15px;
  animation: zoomIn 0.6s ease-out;
  filter: drop-shadow(0px 6px 10px rgba(0,0,0,0.12));
}

@keyframes zoomIn {
  from { transform: scale(0.5); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

/* TITLE */
.thankyou-title {
  font-size: 36px;
  font-weight: 800;
  color: #1f7a3a;
  margin-bottom: 10px;
}

/* TEXT */
.thankyou-text {
  font-size: 17px;
  color: #444;
  margin: 8px 0;
  line-height: 1.5;
}

/* CONTACT BOX (FIXED SAFE VERSION) */
.contact-box {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}

/* CONTACT BUTTONS */
.contact-box a {
  text-decoration: none;
  font-weight: 600;
  font-size: 15px;
  padding: 10px 12px;
  border-radius: 8px;
  color: #1f7a3a;
  background: #eafaf0;
  border: 1px solid #d4f5dc;
  transition: 0.3s ease;

  /* FIX OVERFLOW */
  max-width: 100%;
  white-space: normal;
  word-break: break-word;
  text-align: center;
}

/* HOVER */
.contact-box a:hover {
  background: linear-gradient(135deg, #33cc33, #2ecc71);
  color: #fff;
  transform: scale(1.03);
}

/* BUTTON */
.home-button {
  display: inline-block;
  margin-top: 25px;
  padding: 14px 28px;
  background: linear-gradient(135deg, #33cc33, #2ecc71);
  color: #fff;
  font-weight: 700;
  text-decoration: none;
  border-radius: 10px;
  transition: 0.3s ease;
  box-shadow: 0 8px 18px rgba(46, 204, 113, 0.25);
}

.home-button:hover {
  background: linear-gradient(135deg, #1f7a3a, #33cc33);
  transform: translateY(-2px);
}

/* 📱 TABLET */
@media (max-width: 1024px) {
  .thankyou-card {
    margin: 90px auto;
  }
}

/* 📱 MOBILE */
@media (max-width: 768px) {
  .thankyou-card {
    margin: 60px 15px;
    padding: 30px 20px;
  }

  .contact-box {
    flex-direction: column;
  }

  .contact-box a {
    width: 100%;
  }
}

</style>

<script>
  fbq('track', 'Lead');
</script>
