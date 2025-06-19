<footer class="divas-footer mt-5">
  <div class="container py-5">
    <div class="row gy-4 align-items-start">

      <!-- 🌺 Logo -->
      <div class="col-auto">
        <a href="index.php">
          <img src="assets/images/Logo.png" alt="Diva's Bloom Logo" class="footer-logo" />
        </a>
      </div>

      <!-- 💋 About -->
      <div class="col-md">
        <h5 class="footer-title">Diva's Bloom</h5>
        <p class="footer-text">
          Your go-to destination for aesthetic, cruelty-free cosmetics. Bloom with confidence 💋
        </p>
      </div>

      <!-- 💄 Links -->
      <div class="col-auto">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="list-unstyled footer-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <!-- 🌷 Socials -->
      <div class="col-auto">
        <h6 class="footer-title">Follow Us</h6>
        <ul class="list-unstyled footer-links">
          <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
          <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
          <li><a href="#"><i class="fab fa-tiktok"></i> TikTok</a></li>
        </ul>
      </div>

    </div>

    <hr class="mt-5" />

    <div class="text-center pt-3 small footer-bottom">
      © 2025 Diva's Bloom. Made with <span class="heart">❤️</span> by <a href="https://github.com/fitto-0" target="_blank">Her</a>.
    </div>
  </div>
</footer>

<style>
  .divas-footer {
  background: linear-gradient(135deg, #B99CC8, #62447E);
  color: #fff;
  font-family: 'Poppins', sans-serif;
}

.footer-logo {
  max-width: 120px;
  height: auto;
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
}

.footer-title {
  color: #E6D9F3;
  font-weight: 600;
  margin-bottom: 1rem;
}

.footer-text {
  font-size: 0.95rem;
  line-height: 1.7;
  color: #fff;
}

.footer-links a {
  color: #fff;
  text-decoration: none;
  font-size: 0.9rem;
  display: block;
  margin-bottom: 0.5rem;
  transition: all 0.3s ease;
}

.footer-links a:hover {
  text-decoration: underline;
  color: #fff;
  text-shadow: 0 0 5px #fff;
}

.footer-bottom a {
  color: #E6D9F3;
  text-decoration: none;
}

.footer-bottom .heart {
  animation: pulse 1s infinite;
  display: inline-block;
  color: #E6D9F3;
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.2); }
  100% { transform: scale(1); }
}
</style>