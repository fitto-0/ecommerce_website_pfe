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
    <section class="hero-section d-flex align-items-center text-center" style="background-image: url('./assets/images/bgsengondd.jpeg'); background-repeat: no-repeat; background-position: center; background-size: cover; height: 90vh;">
  <div class="container">
    <h1 class="display-4 fw-bold text-black" data-aos="fade-in">Glow Like Never Before </h1>
    <p class="lead text-dark" data-aos="fade-in" data-aos-delay="200">Discover premium beauty picks that love you back.</p>
    <a href="./products.php" class="btn btn-dark px-4 py-2 mt-3" data-aos="fade-in" data-aos-delay="400">Shop Now</a>
  </div>
</section>

    <!-- End Landing Section -->
     



<section class="about-us-section py-5 bg-light" id="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
        <img src="./assets/images/Group 32.png" alt="About Diva's Bloom" class="img-fluid rounded-4 shadow-sm" />
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
    <div class="category">
        <div class="container">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Categories</span>
                </div>
                <h2>Browse By Category</h2>
            </div>
            <a href="products.php?category=1">
            <div class="cards">
            <div class="card" style="
            background-image: url('assets/images/makeupicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);           ">
           </div>

            </a>
            


                <!--<div class="card">
                    <span>

                    </span>
                    <span>Foundation</span>
                </div>-->
                <a href="products.php?category=2">
                <div class="card"  style="
            background-image: url('assets/images/skincareicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           ">
                </div>
                </a>
                
                <a href="products.php?category=3">
                <div class="card" style="
            background-image: url('assets/images/haircareicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           ">
                </div>
                </a>
                
                <a href="products.php?category=4">
                <div class="card" style="
            background-image: url('assets/images/fragrancesicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           ">
                </div>
                </a>
               
                <a href="products.php?category=5">
                <div class="card"  style="
            background-image: url('assets/images/beautytoolsicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           ">
                </div>
                </a>

                <a href="products.php?category=6">
                <div class="card"  style="
            background-image: url('assets/images/bathandbodyicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           "> 
                </div>
                </a>
                <a href="products.php?category=7">
                <div class="card"  style="
            background-image: url('assets/images/nailsproductsicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           "> 
                </div>
                </a>

                <a href="products.php?category=8">
                <div class="card"  style="
            background-image: url('assets/images/giftsandsetsicon.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
           "> 
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Category  -->
    <!-- Start Advertise  -->
    <div class="adver">
        <div class="container">
            <div class="cover">
                <span class="title">Categories</span>
                <span class="desc">Enhance Your<br />Beauty Experience</span>

                <button onclick="location.href='products.php'">
                    Buy Now!
                </button>
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