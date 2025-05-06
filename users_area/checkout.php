<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/connect.php');
include('../functions/common_function.php');
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
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Diva's Bloom</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
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
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<h5>Welcome Guest!</h5>";
            } else {
                echo "<h5>Welcome <span class='text-warning'>" . htmlspecialchars($_SESSION['username']) . "</span></h5>";
            }
            ?>
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
    <!--
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                // cart_item();
                // total_cart_price();
                ?>
            </div>
        </div>
    </div>
    -->

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">
        <small>&copy; 2025 Diva's Bloom. All Rights Reserved.</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
