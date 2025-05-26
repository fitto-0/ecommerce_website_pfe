<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Diva’s Bloom</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
    <style>
        body {
            background: linear-gradient(135deg, #FEECD0, #E6D9F3);
            font-family: 'Inter', sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 500px;
            width: 100%;
        }

        .login-card h2 {
            font-weight: 600;
            color: #62447E;
        }

        .form-control:focus {
            border-color: #B99CC8;
            box-shadow: 0 0 0 0.25rem rgba(185, 156, 200, 0.25);
        }

        .btn-custom {
            background-color: #62447E;
            color: white;
        }

        .btn-custom:hover {
            background-color: #452e5e;
        }

        a {
            color: #62447E;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h2 class="text-center mb-4">Login to Diva’s Bloom</h2>
            <form action="" method="post" class="d-flex flex-column gap-3">
                <div>
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" placeholder="Your username" required class="form-control">
                </div>
                <div>
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" placeholder="Your password" required class="form-control">
                </div>
                <div>
                    <input type="submit" value="Login" name="user_login" class="btn btn-custom w-100">
                </div>
                <div class="text-center">
                    <small>
                        Don’t have an account?
                        <a href="user_registration.php"><strong>Register here</strong></a>
                    </small>
                </div>
                <div class="text-center">
                    <a href="../index.php" class="btn btn-outline-secondary mt-2">← Back to Home</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
    $select_result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($select_result);

    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($select_result);
        $stored_password = $row_data['user_password'];
        $user_role = $row_data['role'];
        $user_ip = getIPAddress();

        if (password_verify($user_password, $stored_password)) {
            $_SESSION['username'] = $user_username;
            $_SESSION['role'] = $user_role;
            $_SESSION['admin_image'] = $row_data['user_image'];
            $_SESSION['admin_id'] = $row_data['user_id'];

            if ($user_role === 'admin') {
                echo "
                <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Welcome Admin 👑',
                    text: 'Redirecting to admin dashboard...',
                    confirmButtonColor: '#62447E'
                }).then(() => {
                    window.location.href = '../admin/index.php';
                });
                </script>";
                exit();
            }

            $select_cart_query = "SELECT * FROM `card_details` WHERE ip_address='$user_ip'";
            $select_cart_result = mysqli_query($con, $select_cart_query);
            $row_cart_count = mysqli_num_rows($select_cart_result);

            $redirect_url = ($row_cart_count > 0) ? '../index.php' : 'profile.php';
            $message = ($row_cart_count > 0) ? 'You have items waiting in your cart!' : 'Redirecting to your profile...';
            $title = ($row_cart_count > 0) ? 'Login Successful 🎉' : 'Welcome Back 💖';

            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: '$title',
                text: '$message',
                confirmButtonColor: '#62447E'
            }).then(() => {
                window.location.href = '$redirect_url';
            });
            </script>";
            exit();
        } else {
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Wrong Password ❌',
                text: 'Try again, soldier!',
                confirmButtonColor: '#EF4444'
            });
            </script>";
        }
    } else {
        echo "
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Username Not Found 🚫',
            text: 'Are you sure you registered?',
            confirmButtonColor: '#FBBF24'
        });
        </script>";
    }
}
?>
