<div class="custom-footer">
  <span>All rights reserved &copy; 2025</span>
  <span>
    Made with <span class="heart">❤️</span> by 
    <a href="https://github.com/fitto-0" target="_blank">Fatima Zahra Elkasmi</a>
  </span>
</div>

<style>
.custom-footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(135deg, #62447E, #B99CC8);
  color: #fff;
  text-align: center;
  padding: 10px 20px;
  font-family: 'Poppins', sans-serif;
  font-size: 0.95rem;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
  box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2);
  z-index: 999;
  animation: slideUp 1s ease forwards;
}

.custom-footer a {
  color: #E6D9F3;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease;
}

.custom-footer a:hover {
  color: #fff;
  text-shadow: 0 0 5px #fff;
}

.heart {
  animation: pulse 1s infinite;
  display: inline-block;
}

@keyframes slideUp {
  from {
    transform: translateY(100%);
    opacity: 0;
  }
  to {
    transform: translateY(0%);
    opacity: 1;
  }
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.2); }
  100% { transform: scale(1); }
}

</style>