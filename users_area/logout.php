<?php
session_start();
session_unset();
session_destroy();
$_SESSION['cart'] = []; // clear cart array too, just to be safe
setcookie("cart", "", time() - 3600, "/"); // bye bye cookie

echo "<script>window.open('../index.php','_self');</script>";
?>