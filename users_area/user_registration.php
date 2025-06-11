<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!-- Same PHP includes -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Diva's Bloom Registration</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
  <style>
    body {
      background: #FFF9E2;
      font-family: 'Segoe UI', sans-serif;
    }

    .register {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: linear-gradient(to right, #EBECCC, #FEECD0);
    }

    .register .form-container {
      background-color: white;
      padding: 2.5rem;
      border-radius: 1.5rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }

    .form-label {
      font-weight: 500;
      color: #210B25;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ddd;
      padding: 0.75rem;
    }

    .btn-primary {
      background-color: #DCA278;
      border: none;
      padding: 0.6rem 1.5rem;
      border-radius: 1rem;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #b3704f;
    }

    h2 {
      font-weight: bold;
      color: #62447E;
    }

    a.text-primary {
      color: #B99CC8 !important;
    }

    a.text-primary:hover {
      text-decoration: none;
      color: #62447E !important;
    }
  </style>
</head>
<body>
  <div class="register">
    <div class="form-container">
      <h2 class="text-center mb-4">Create Your Account</h2>
      <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
        <div>
          <label for="user_username" class="form-label">Username</label>
          <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" required>
        </div>

        <div>
          <label for="user_email" class="form-label">Email</label>
          <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div>
          <label for="user_image" class="form-label">Profile Picture</label>
          <input type="file" name="user_image" id="user_image" class="form-control" required>
        </div>

        <div>
          <label for="user_password" class="form-label">Password</label>
          <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Create password" required>
        </div>

        <div>
          <label for="conf_user_password" class="form-label">Confirm Password</label>
          <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Re-enter password" required>
        </div>

        <div>
          <label for="user_address" class="form-label">Address</label>
          <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Where do you live?" required>
        </div>

        <div>
          <label for="user_mobile" class="form-label">Mobile</label>
          <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Phone number" required>
        </div>

        <div class="d-flex flex-column align-items-center gap-2 mt-3">
          <input type="submit" name="user_register" value="Register" class="btn btn-primary w-100"/>
          <p class="text-center">Already have an account? 
            <a href="user_login.php" class="text-primary"><strong>Login</strong></a>
          </p>
          <a href="../index.php" class="btn btn-outline-secondary w-100">Back to Home</a>
        </div>
      </form>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<!-- php code  -->
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // check if user already exists
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $select_result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($select_result);

    if ($rows_count > 0) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops! 🚫',
            text: 'Username or email already exists.',
            background: '#F3E8FF',
            color: '#6B21A8',
            confirmButtonColor: '#A855F7'
        });
        </script>
        ";
    } else if ($user_password != $conf_user_password) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Mismatch 😬',
            text: 'Passwords do not match.',
            background: '#F3E8FF',
            color: '#6B21A8',
            confirmButtonColor: '#A855F7'
        });
        </script>
        ";
    } else {
        // insert user
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
                         VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Welcome to the Fam 🎉',
                text: 'Your account has been created successfully!',
                background: '#F3E8FF',
                color: '#6B21A8',
                confirmButtonColor: '#A855F7',
                confirmButtonText: 'Let’s Go!'
            }).then(() => {
                window.location.href = 'login.php';
            });
            </script>
            ";
        } else {
            die(mysqli_error($con));
        }
    }
}


    // //select cart items check if items in cart go to checkout !| go to index.php
    // $select_cart_items = "SELECT * FROM `card_details` WHERE ip_address='$user_ip'";
    // $select_cart_items_result = mysqli_query($con,$select_cart_items);
    // $rows_count_cart_items = mysqli_num_rows($select_cart_items_result);
    // if($rows_count_cart_items > 0 ){
    //     $_SESSION['username'] = $user_username;
    //     echo "<script>window.alert('You have items in your cart');</script>";
    //     echo "<script>window.open('checkout.php','_self');</script>";
    // }else{
    //     echo "<script>window.open('../index.php','_self');</script>";
    // }

?>