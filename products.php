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
    <title>Ecommerce Products</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a>Shop Now</a></span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <?php 
    include('./includes/navbar.php');
    ?>
    <!-- End NavBar -->


    <!-- Start All Prodcuts  -->
    <div class="all-prod">
        <div class="container">
            <div class="sub-container pt-4 pb-4">
                <div class="categ-header">
                    <h2>Browse By Category</h2>
                </div>
                <div class="row mx-0">
                    <div class="col-md-4 mb-4">
                        <!-- side nav  -->
                        
                        <div class="divider"></div>
                        <!-- categories to display -->
                        <ul class="navbar-nav me-auto ">
                            <li class="nav-item d-flex align-items-center gap-2">
                                <span class="shape"></span>
                                <a href="products.php" class="nav-link fw-bolder nav-title">
                                    <h4>Categories</h4>
                                </a>
                            </li>
                            <?php
                            getCategories();
                            ?>

                        </ul>

                    </div>
                    <div class="col-md-8 mb-6">
                        <div style="display: flex; flex-direction: column; gap: 2rem; padding: 1rem; border-radius: 12px; background-color: #f8f9fa; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        <!-- products  -->
                        <div class="row">
                            <?php
                            getProduct();
                            filterCategoryProduct();
                            
                            $ip=getIPAddress();
                            cart();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Prodcuts  -->













    <!-- divider  -->
    <!-- <div class="container">
        <div class="divider"></div>
    </div> -->
    <!-- divider  -->




    <!-- Start Footer -->
    <?php
    include('./includes/footer.php');
    ?>
    <!-- End Footer -->

    <script src="./assets//js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>