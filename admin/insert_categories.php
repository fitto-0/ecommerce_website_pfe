<?php
include('../includes/connect.php');

if (isset($_POST['insert_categ_title'])) {
    $category_title = trim($_POST['categ_title']);
    
    // Check if category title is empty
    if (empty($category_title)) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Category title cannot be empty',
                    showConfirmButton: false,
                    timer: 1500
                });
              </script>";
    } else {
        // Prevent SQL injection with prepared statements
        $select_query = "SELECT * FROM `categories` WHERE category_title = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "s", $category_title);
        mysqli_stmt_execute($stmt);
        $select_result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($select_result) > 0) {
            echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Category already exists',
                        text: 'This category is already in the database.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                  </script>";
        } else {
            // Insert query with prepared statement
            $insert_query = "INSERT INTO `categories` (category_title) VALUES (?)";
            $stmt = mysqli_prepare($con, $insert_query);
            mysqli_stmt_bind_param($stmt, "s", $category_title);
            $insert_result = mysqli_stmt_execute($stmt);

            if ($insert_result) {
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Category inserted successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error inserting category',
                            text: 'There was an issue while inserting the category.',
                            showConfirmButton: true
                        });
                      </script>";
            }
        }
    }

    // Close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>



<div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>Insert Categories</h2>
            </div>
        </div>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text secondry-1" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="#ffffff" viewBox="0 0 384 512">
                <path d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z" />
            </svg>
        </span>
        <input type="text" class="form-control" name="categ_title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3">
        <input type="submit" class="btn btn-primary" name="insert_categ_title" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>