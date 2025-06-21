<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'];?> Profile</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a href="products.php" class="text-white text-decoration-underline fw-bold ms-1">Shop Now</a></span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <!-- Start NavBar -->
    <!-- Start NavBar -->
<style>
    .navbar-custom {
        background: linear-gradient(90deg, #f8f6fa 0%, #e9e0f3 100%);
        border-radius: 18px;
        box-shadow: 0 6px 24px rgba(98,68,126,0.10), 0 1.5px 4px rgba(185,156,200,0.10);
        animation: navbarFadeIn 1.1s cubic-bezier(.4,0,.2,1);
        margin-top: 18px;
        margin-bottom: 18px;
        padding: 0.5rem 1.5rem;
    }
    @keyframes navbarFadeIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .navbar-brand img {
        height: 60px;
        transition: transform 0.3s cubic-bezier(.4,0,.2,1);
    }
    .navbar-brand img:hover {
        transform: scale(1.08) rotate(-2deg);
    }
    .navbar-nav .nav-link {
        color: #62447E !important;
        font-weight: 600;
        font-size: 1.08rem;
        letter-spacing: 0.5px;
        border-radius: 8px;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        padding: 0.5rem 1.1rem;
        margin: 0 0.2rem;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
        background: #f3e7fa;
        color: #513969 !important;
        box-shadow: 0 2px 8px rgba(185,156,200,0.10);
        text-decoration: none;
    }
    .navbar-nav .nav-item {
        display: flex;
        align-items: center;
    }
    .navbar-nav .nav-link svg {
        margin-right: 0.3rem;
        vertical-align: middle;
    }
    .navbar-profile {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        margin-left: 1.2rem;
    }
    .navbar-profile img, .navbar-profile svg {
        box-shadow: 0 2px 12px rgba(98,68,126,0.10);
        border-radius: 50%;
        border: 2.5px solid #62447E;
        background: #fff;
    }
    .navbar-profile span {
        font-weight: 700;
        color: #62447E;
        font-size: 1.08rem;
    }
    .navbar .form-control {
        border-radius: 8px;
        border: 1.5px solid #B99CC8;
        transition: border 0.2s;
    }
    .navbar .form-control:focus {
        border-color: #62447E;
        box-shadow: 0 0 0 2px #e9e0f3;
    }
    .navbar .btn-outline-primary {
        border-radius: 8px;
        border: 1.5px solid #62447E;
        color: #62447E;
        font-weight: 600;
        background: #f8f6fa;
        transition: background 0.2s, color 0.2s;
    }
    .navbar .btn-outline-primary:hover {
        background: #62447E;
        color: #fff;
    }
    @media (max-width: 991px) {
        .navbar-profile { margin-left: 0; margin-top: 1rem; }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom" data-aos="fade-in" data-aos-delay="200" data-aos-duration="1000">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <!-- LEFT SIDE: Logo + Links -->
    <div class="d-flex align-items-center">
      <a class="navbar-brand d-flex align-items-center gap-2 me-3" href="../index.php">
        <img src="../assets/images/Logo.png" alt="Diva's Bloom Logo">
        <span class="fw-bold"></span>
      </a>
      <ul class="navbar-nav d-flex flex-row gap-2 align-items-center mb-0">
        <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'index.php') echo 'active'; ?>" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($current_page == 'products.php') echo 'active'; ?>" href="../products.php">Products</a>
        </li>
        <?php
          if(isset($_SESSION['username'])){                            
              echo "<li class='nav-item'><a class='nav-link' href='./profile.php'>My Account</a></li>";
          } else {
              echo "<li class='nav-item'><a class='nav-link' href='./user_registration.php'>Register</a></li>";
          }
        ?>
      </ul>
    </div>

    <!-- RIGHT SIDE: Search + Cart + Profile -->
    <div class="d-flex align-items-center">
      <form class="d-flex ms-lg-3 my-2 my-lg-0" method="GET" action="../search_product.php">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit" name="search_data_btn">Search</button>
      </form>

      <ul class="navbar-nav navbar-profile mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">
            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3 5H7L10 22H26" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <sup style="color:#62447E;font-weight:700;"><?php cart_item(); ?></sup>
          </a>
        </li>
        <li class="nav-item">
          <?php
            if (isset($_SESSION['username'])) {
              $username = $_SESSION['username'];
              
              $select_user_img = "SELECT user_image FROM user_table WHERE username='" . mysqli_real_escape_string($con, $username) . "'";
              $select_user_img_result = mysqli_query($con, $select_user_img);
              $userImg = '';
              if ($select_user_img_result && mysqli_num_rows($select_user_img_result) > 0) {
                $row_user_img = mysqli_fetch_assoc($select_user_img_result);
                $userImg = $row_user_img['user_image'];
              }
              if ($userImg && file_exists(__DIR__ . '/../users_area/user_images/' . $userImg)) {
                echo '<img src="../users_area/user_images/' . htmlspecialchars($userImg) . '" alt="' . htmlspecialchars($username) . ' photo" style="width:52px;height:52px;object-fit:cover;border-radius:50%;border:2.5px solid #62447E;box-shadow:0 2px 12px rgba(98,68,126,0.18);">';
              } else {
                echo '<svg width="36" height="36" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
              }
              echo '<span class="fw-semibold">Welcome ' . htmlspecialchars($username) . '</span>';
            } else {
              echo '<svg width="36" height="36" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="#62447E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
              echo '<span class="fw-semibold">Welcome guest</span>';
            }
          ?>
        </li>
        <li class="nav-item">
          <?php
            if(!isset($_SESSION['username'])){
              echo "<a class='nav-link' href='./user_login.php'>Login</a>";
            } else {
              echo "<a class='nav-link' href='./logout.php'>Logout</a>";
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End NavBar -->


    <!-- End NavBar -->


    <!-- End NavBar -->


    <!-- Start All Prodcuts  -->
    <div class="all-prod">
        <div class="container">
            <div class="sub-container pt-4 pb-4">
                <div class="categ-header">
                    <div class="sub-title">
                        <span class="shape"></span>
                        <span class="title h3 text-dark">Profile</span>
                    </div>
                    <!-- <h2>Browse By Category & Brand</h2> -->
                </div>
                <div class="row mx-0">
                    <div class="col-md-2 side-nav p-0">
                        <!-- side nav  -->
                        <!-- Profile Tabs -->
                        <ul class="navbar-nav me-auto navbar-profile">
                            <?php
                                $username = $_SESSION['username'];
                                $select_user_img = "SELECT * FROM `user_table` WHERE username='$username'";
                                $select_user_img_result = mysqli_query($con,$select_user_img);
                                $row_user_img = mysqli_fetch_array($select_user_img_result);
                                $userImg = $row_user_img['user_image'];
                                echo "                            <li class='nav-item d-flex align-items-center gap-2'>
                                <img src='./user_images/$userImg' alt='$username photo' class='img-profile img-thumbnail'/>
                            </li>";
                            ?>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?pending_orders" class="nav-link fw-bold">
                                    <h6>Pending Orders</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?edit_account" class="nav-link fw-bold">
                                    <h6>Edit Account</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?my_orders" class="nav-link fw-bold">
                                    <h6>My Orders</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="profile.php?delete_account" class="nav-link fw-bold">
                                    <h6>Delete Account</h6>
                                </a>
                            </li>
                            <li class="table-group-divider"></li>
                            <li class="nav-item d-flex align-items-center gap-2">
                                <a href="./logout.php" class="nav-link fw-bold">
                                    <h6>Logout</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <!-- Main View  -->
                        <div class="row">
                            <?php
                                if(isset($_GET['edit_account'])){
                                    include('./edit_account.php');
                                } elseif(isset($_GET['my_orders'])){
                                    include('./user_orders.php');
                                } elseif(isset($_GET['delete_account'])){
                                    include('./delete_account.php');
                                } else {
                                    // Show pending orders by default or if ?pending_orders is set
                                    get_user_order_details();
                                }
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
    
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>