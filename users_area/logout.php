<?php
session_start();

// Clear the cart BEFORE destroying the session
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}


// Destroy the session
session_unset();
session_destroy();

// Clear the cart cookie (if any)
setcookie('cart', '', time() - 3600, '/'); // expired in the past


// Redirect to homepage
echo "<script>window.open('../index.php','_self');</script>";
?>
