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
    <link rel="stylesheet" href="./assets/css/style.css"> <!-- Link to your CSS file -->
</head>
<body>
<div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a>Shop Now</a></span>
</div>
<?php
    include('./includes/navbar.php');
    ?>
    <section class="about py-5 bg-light" id="about">
    <div class="container text-center">
        <h1 class="about-title fw-bold mb-4" style="color: #62447E; font-size: 2.8rem;">About Diva's Bloom</h1>
        <p class="about-description mx-auto mb-5" style="max-width: 800px; font-size: 1.15rem; color: #6c757d;">
            At <strong>Diva’s Bloom</strong>, we believe beauty is not about perfection, it’s about expression, softness, and soul.  
            Born from a love for elegance, self-care, and all things feminine, our brand was created to help you bloom into your most radiant self.
            Whether you’re getting ready for a bold night out or embracing your softest glow, every product we create is designed to celebrate *you*, just as you are.
        </p>
        <p class="about-description mx-auto mb-5" style="max-width: 800px; font-size: 1.15rem; color: #6c757d;">
            We handpick gentle, skin-loving ingredients, infuse every package with a little magic, and pour intention into every detail, because we know beauty isn’t just what you wear, it’s what you feel.
            From lip gloss to lotions, we’re here for your rituals, your moments, and your mirror dances of self-love.
        </p>
        <div class="row my-5">
    <div class="col-md-4 mb-4" data-aos="zoom-in">
        <img src="./assets/images/gir-with-lipstick.jpg" class="img-fluid rounded-4 shadow" alt="Beauty Ritual" />
    </div>
    <div class="col-md-4 mb-4" data-aos="zoom-in">
        <img src="./assets/images/skincare-flatlay.jpg" class="img-fluid rounded-4 shadow" alt="Skincare Collection" />
    </div>
    <div class="col-md-4 mb-4" data-aos="zoom-in">
        <img src="./assets/images/happy-customer.jpg" class="img-fluid rounded-4 shadow" alt="Happy Customer" />
    </div>
</div>



    </div>
</section>

    <!-- Start Footer -->
    <?php
    include('./includes/footer.php');
    ?>
    <!-- End Footer -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome for icons -->
    <script src="./assets/js/script.js"></script>
</body>
</html>


