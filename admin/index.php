<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    // Use prepared statements to prevent SQL injection
    $get_admin_data = "SELECT * FROM `user_table` WHERE username = ? AND role = 'admin'";
    $stmt = mysqli_prepare($con, $get_admin_data);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $get_admin_result = mysqli_stmt_get_result($stmt);
    
    if($get_admin_result && mysqli_num_rows($get_admin_result) > 0){
        $row_fetch_admin_data = mysqli_fetch_array($get_admin_result);
        $username = $row_fetch_admin_data['username'];
        $user_image = $row_fetch_admin_data['user_image'];
    } else {
        // Graceful redirection with error message
        $_SESSION['error_message'] = 'Access denied. Not an admin.';
        header('Location: users_aera/user_login.php');
        exit();
    }
} else {
    // Redirect to login page if no session
    header('Location: users_aera/user_login.php');
    exit();
}



if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    $delete_query = "DELETE FROM user_table WHERE user_id = $delete_id";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('User deleted successfully'); window.location.href='index.php?view_users';</script>";
    } else {
        echo "<script>alert('Failed to delete user');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Admin Dashboard And Free Express Delivery</span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="./index.php">
                <img src="./admin_images/Group 32.png" alt="Diva's Bloom Logo" style="height: 60px;">
                <span class="fw-bold"></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentad" aria-controls="navbarSupportedContentad" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContentad">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Welcome <?php echo $username;?></a>
                    </li>
                    <li class="nav-item">
                    <button class="btn btn-primary p-0 px-1">
                            <a href="./admin_logout.php" class="nav-link text-light">Logout</a>
                        </button>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!--wa wikwiiiiiiiik a 3ibad lah -->
    <!-- End NavBar -->
    <!-- Start Control Buttons -->
    <div class="control">
        <div class="container pt-4 pb-0">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Admin Dashboard</span>
                </div>
                <h2>Manage Details Of Ecommerce</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="admin-image">
                        <img src="../users_area/user_images/<?php echo urlencode($user_image); ?>" class="img-thumbnail" alt="Admin Photo">
                        <p><?php echo $username;?></p>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="buttons">
                        <button class="btn btn-outline-primary m-2">
                            <a href="./insert_product.php" class="nav-link">Insert Products</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_products" class="nav-link">View Products</a>
                        </button>
                        
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_category" class="nav-link">Insert Categories</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_categories" class="nav-link">View Categories</a>
                        </button>
                       <!--  <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_brand" class="nav-link">Insert Brands</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_brands" class="nav-link">View Brands</a>
                        </button> -->
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_orders" class="nav-link">All Orders</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_payments" class="nav-link">All Payments</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_users" class="nav-link">List Users</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Control Buttons -->
        <!-- divider  -->
    <div class="container">
        <div class="divider"></div>
    </div>
    <!-- divider  -->
    <!-- Start Changed Page  -->
    <div class="change-page">
        <div class="container">
            <?php
            if(isset($_GET['insert_category'])){
                include('./insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('./insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('./view_products.php');
            }
            if(isset($_GET['edit_product'])){
                include('./edit_product.php');
            }
            if(isset($_GET['delete_product'])){
                include('./delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('./view_categories.php');
            }
            if(isset($_GET['edit_category'])){
                include('./edit_category.php');
            }
            if(isset($_GET['delete_category'])){
                include('./delete_category.php');
            }
            if(isset($_GET['view_brands'])){
                include('./view_brands.php');
            }
            if(isset($_GET['edit_brand'])){
                include('./edit_brand.php');
            }
            if(isset($_GET['delete_brand'])){
                include('./delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('./list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('./delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('./list_payments.php');
            }
            if(isset($_GET['delete_payment'])){
                include('./delete_payment.php');
            }
            if(isset($_GET['list_users'])){
                include('./list_users.php');
            }

            ?>
        </div>
    </div>
    <!-- End Changed Page  -->







    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>