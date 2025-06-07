<?php
include('./includes/connect.php');
include('./functions/common_function.php');



// Handle item removal
if (isset($_POST['remove_item'])) {
    $remove_id = $_POST['remove_id'];
    $ip = getIPAddress();

    $stmt = $con->prepare("DELETE FROM `card_details` WHERE product_id = ? AND ip_address = ?");
    $stmt->bind_param("is", $remove_id, $ip);
    $stmt->execute();

    echo "<script>window.location.href='cart.php';</script>";
}

// Handle quantity update
if (isset($_POST['update_qty'])) {
    $update_id = $_POST['update_id'];
    $qty = $_POST['quantity'];
    $ip = getIPAddress();

    $stmt = $con->prepare("UPDATE `card_details` SET quantity = ? WHERE product_id = ? AND ip_address = ?");
    $stmt->bind_param("iis", $qty, $update_id, $ip);
    $stmt->execute();

    echo "<script>window.location.href='cart.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diva's Bloom - Cart</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fefefe; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #fddde6; }
        img { max-width: 100px; border-radius: 10px; }
        .btn-remove, .btn-update {
            background-color: #ff6b81;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        .btn-remove:hover, .btn-update:hover { background-color: #ff4757; }
        input[type="number"] {
            width: 60px;
            padding: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>

<?php 

?>

<h2>Your Cart 🛍️</h2>

<a href="./index.php" class="btn-back">← Back to Home</a>
<style>
    .btn-back {
    display: inline-block;
    margin: 20px 0;
    padding: 10px 20px;
    background-color: #ffdee9;
    background-image: linear-gradient(315deg, #ffdee9 0%, #b5fffc 74%);
    color: #4a4a4a;
    text-decoration: none;
    font-weight: bold;
    border-radius: 12px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 12px rgba(255, 182, 193, 0.4);
}

.btn-back:hover {
    background-image: linear-gradient(315deg, #b5fffc 0%, #ffdee9 74%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 182, 193, 0.6);
    color: #333;
}

</style>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ip = getIPAddress();
        $total = 0;

        $cart_query = "SELECT * FROM `card_details` WHERE ip_address = '$ip'";
        $cart_result = mysqli_query($con, $cart_query);

        if (mysqli_num_rows($cart_result) > 0) {
            while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                $product_id = $cart_row['product_id'];
                $qty = $cart_row['quantity'];

                $product_query = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                $product_result = mysqli_query($con, $product_query);
                $product = mysqli_fetch_assoc($product_result);

                $product_title = $product['product_title'];
                $product_image_one = $product['product_image_one'];
                $product_price = $product['product_price'];
                $subtotal = $product_price * $product_id;
                $total += $subtotal;

                echo "
                <tr>
                    <td>$product_title</td>
                    <td><img src='./admin/product_images/$product_image_one' alt='$product_title'></td>
                    <td>$product_price $</td>
                    <td>
                        <form method='POST'>
                            $product_id
                            
                    </td>
                    
                    <td>$subtotal $</td>
                    
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='remove_id' value='$product_id'>
                            <button type='submit' name='remove_item' class='btn-remove'>Remove</button>
                        </form>
                    </td>
                </tr>
                ";
            }

            echo "
                <tr>
                    <td colspan='4'><strong>Total:</strong></td>
                    <td colspan='3'><strong>$total $</strong></td>
                </tr>
            ";
        } else {
            echo "<tr><td colspan='7'>Your cart is empty 😢</td></tr>";
        }
        ?>
    </tbody>
</table>

<div class="cart-actions">
    <a href="./products.php" class="btn-back">🛍️ Continue Shopping</a>
    <a href="./users_area/checkout.php" class="btn-back">💳 Go to Checkout</a>
</div>

<style>
.cart-actions {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 30px 0;
}
</style>


</body>
<script src="./assets/js/script.js"></script>
</html>
