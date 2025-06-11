<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diva's Bloom Home Page</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter&display=swap" rel="stylesheet">
  
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a>Shop Now</a></span>
    </div>
    <!-- upper-nav -->
    <?php
    include('./includes/navbar.php');
    ?>
    
    <!-- Start Landing Section -->
    <section class="hero-section d-flex align-items-center text-center" style="background-image: url('./assets/images/bgsecond.jpeg'); background-repeat: no-repeat; background-position: center; background-size: cover; height: 90vh;">
        <div class="container1">
            <h1 class="display-4 fw-bold text-black" data-aos="fade-in">Glow Like Never Before </h1>
            <p class="lead text-dark" data-aos="fade-in" data-aos-delay="200">Discover premium beauty picks that love you back.</p>
            <a href="./products.php" class="btn btn-outline-dark rounded-pill px-4 py-2" style="border-color: #62447E; color: #62447E;">Shop Now</a>
        </div>
    </section>
    
    <!-- End Landing Section -->




    <section class="about-us-section py-5 bg-light" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
                    <img src="./assets/images/Logo.png" alt="About Diva's Bloom" class="img-fluid rounded-4 shadow-sm" />
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-3" style="color: #62447E;">Our Story</h2>
                    <p class="text-muted mb-3" style="font-size: 1.1rem;">
                        At Diva’s Bloom, we believe beauty is a journey—not a destination. Born from a passion for self-love, softness, and confidence, our brand brings you cosmetics that care as much as they shine.
                    </p>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Each product is handpicked with love, designed to make you feel radiant, powerful, and entirely YOU. Whether you’re bold, minimalist, or soft & dreamy—there’s a glow waiting for you here 💖
                    </p>
                    <a href="./contact.php" class="btn btn-outline-dark rounded-pill px-4 py-2" style="border-color: #62447E; color: #62447E;">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Category  -->
    <section class="category">
  <div class="container">
    <div class="categ-header text-center mb-5">
      <div class="sub-title d-flex align-items-center justify-content-center gap-2">
        <span class="shape"></span>
        <span class="title">Categories</span>
      </div>
      <h2 class="fw-semibold">Browse By Category</h2>
    </div>

    <div class="cards-wrapper d-flex flex-wrap gap-4 justify-content-center">
      <?php
        $categories = [
          ["id" => 1, "name" => "Makeup", "icon" => "makeupicon.png"],
          ["id" => 2, "name" => "Skincare", "icon" => "skincareicon.png"],
          ["id" => 3, "name" => "Haircare", "icon" => "haircareicon.png"],
          ["id" => 4, "name" => "Fragrances", "icon" => "fragrancesicon.png"],
          ["id" => 5, "name" => "Beauty Tools", "icon" => "beautytoolsicon.png"],
          ["id" => 6, "name" => "Bath & Body", "icon" => "bathandbodyicon.png"],
          ["id" => 7, "name" => "Nails", "icon" => "nailsproductsicon.png"],
          ["id" => 8, "name" => "Gifts & Sets", "icon" => "giftsandsetsicon.png"]
        ];

        foreach ($categories as $category) {
          echo '<a href="products.php?category=' . $category['id'] . '">
                  <article class="card" style="background-image: url(assets/images/' . $category['icon'] . ');">
                    <div class="label">' . $category['name'] . '</div>
                  </article>
                </a>';
        }
      ?>
    </div>
  </div>
</section>

<style>
  .card {
    background-size: 60%;
    background-position: center;
    background-repeat: no-repeat;
    width: 300px;
    height: 200px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    text-decoration: none;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    color: white;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
  }

  .label {
    background-color: rgba(0, 0, 0, 0.4);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 1rem;
    text-align: center;
    width: fit-content;
  }

  .shape {
    width: 8px;
    height: 8px;
    background-color: #DCA278;
    border-radius: 50%;
    display: inline-block;
  }

  .title {
    text-transform: uppercase;
    font-weight: bold;
    color: #999;
  }

  h2 {
    font-family: 'Playfair Display', serif;
    margin-top: 0.75rem;
  }
</style>

    <!-- End Category  -->
    <!-- Start Advertise  -->
    <div class="adver">
        <div class="container">
            <div class="cover" style="background-image: url('./assets/images/bgfirrst.jpg');">
                <span class="title fw-bold fs-4 text-uppercase">Our Categories</span>
                <span class="desc text-muted" style="font-style: italic;">
                    Whispered beauty in every shade,<br />
                    Discover your perfect bloom
                </span>


                <a href="products.php" class="btn btn-outline-dark rounded-pill px-4 py-2" style="border-color: #62447E; color: #62447E;">Buy Now!</a>
                
            </div>
        </div>
    </div>
    <!-- End Advertise  -->
    <!-- Start Products  -->

    <div class="products">
        <div class="container">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Our Products</span>
                </div>
                <h2>Explore Our Products</h2>
            </div>
            <div class="row mb-4">
                <?php
                getProduct(3);
                getIPAddress();
                ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->














    <!-- divider  -->
    <!-- <div class="container">
        <div class="divider"></div>
    </div> -->
    <!-- divider  -->




    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="./assets/js/bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>