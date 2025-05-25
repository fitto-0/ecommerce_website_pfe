<?php
include("./includes/connect.php");
include("./functions/common_function.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Glamour Cosmetics</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
<div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a>Shop Now</a></span>
    </div>
    
    </nav>
    <div>
    <section class="contact">
        <div class="container">
            <h1 class="contact-title">Get in Touch</h1>
            <p class="contact-description">
                Have questions or need assistance? We're here to help! Fill out the form below, and our team will get back to you as soon as possible.
            </p>
            <form id="contact-form" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="contact-message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section>
    </div>




    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome for icons -->
    <script src="./assets/js/script.js"></script>
    <script
  type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
</body>

</html>

<?php
include 'includes/footer.php'; // Include the footer file
?>