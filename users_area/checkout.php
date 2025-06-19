<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/40d2553a7a.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e0e6ed);
            color: #333;
        }

        .welcome-banner {
            background-color: #343a40;
            color: white;
            padding: 1rem;
            border-bottom: 4px solid #62447E;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .checkout-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .checkout-title {
            font-weight: 800;
            color: #62447E;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #62447E;
            border: none;
        }

        .btn-primary:hover {
            background-color: #513969;
        }

        a.nav-link {
            color: white;
            text-decoration: none;
        }

        a.nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Welcome Message -->
    <div class="welcome-banner text-center">
        <a class="nav-link d-flex justify-content-center align-items-center gap-2" href="../index.php">
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
                if ($userImg && file_exists(__DIR__ . "/user_images/" . $userImg)) {
                    // Show profile image
                    echo '<img src="./user_images/' . htmlspecialchars($userImg) . '" alt="' . htmlspecialchars($username) . ' photo" style="width:40px;height:40px;object-fit:cover;border-radius:50%;border:2px solid #fff;box-shadow:0 2px 8px rgba(98,68,126,0.2);">';
                } else {
                    // Fallback SVG if no image
                    echo '<svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
                }
                echo '<span>Welcome ' . htmlspecialchars($username) . '</span>';
            } else {
                // Guest: show SVG
                echo '<svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
                echo '<span>Welcome guest</span>';
            }
            ?>
        </a>
    </div>

    <!-- Main Checkout Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="checkout-container">
                    <h2 class="text-center checkout-title">🛒 Checkout Page</h2>
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
