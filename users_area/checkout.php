<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/connect.php');
//include(__DIR__ . '/../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/40d2553a7a.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center gap-2" href="../index.php">
                <img src="../assets/images/Group 32.png" alt="Diva's Bloom Logo" style="height: 60px;">
                <span class="fw-bold"></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="user_login.php">Login</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Welcome Message -->
        <div class="bg-secondary text-white p-2 text-center">
            <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<span>
                                    Welcome guest
                                </span>";
                            }else{
                                    echo "<span>
                                    Welcome ".$_SESSION['username']. "</span>";
                                }
                                ?>
                        </a>
                    </li>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-4">
        <h2 class="text-center mb-4">Checkout Page</h2>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (!isset($_SESSION['username'])) {
                    include('user_login.php');
                } else {
                    include('payment.php');
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional Cart Preview (You can uncomment these if needed) -->
    <!-- -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                 cart_item();
                 total_cart_price();
                ?>
            </div>
        </div>
    </div>
    

    <!-- Footer 
    <footer class="bg-dark text-white text-center p-3">
        <small>&copy; 2025 Diva's Bloom. All Rights Reserved.</small>
    </footer>-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
