    <div class="container my-5">
        <h1 class="text-center mb-5">Delete an account</h1>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="post" class="d-flex flex-column gap-4 text-center" action="">
                    <div class="form-outline">
                        <input type="submit" value="Delete Account" name="submit_delete" class="btn btn-outline-primary form-control">
                    </div>
                    <div class="form-outline">
                        <input type="submit" value="Don't Delete Account" name="submit_dont_delete" class="btn btn-outline-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$username_session = $_SESSION['username'];

if (isset($_POST['submit_delete'])) {
    $delete_query = "DELETE FROM `user_table` WHERE username='$username_session'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        session_destroy();
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Account Deleted 💔',
            text: 'We’re sad to see you go...',
            confirmButtonText: 'Goodbye',
            background: '#F3E8FF',
            color: '#4B0082',
            confirmButtonColor: '#6B21A8',
        }).then(() => {
            window.location.href = '../index.php';
        });
        </script>
        ";
    }
}

if (isset($_POST['submit_dont_delete'])) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    Swal.fire({
        icon: 'info',
        title: 'Yay! 🥰',
        text: 'Glad you’re staying with us.',
        background: '#F3E8FF',
        color: '#4B0082',
        confirmButtonColor: '#6B21A8',
        confirmButtonText: 'Back to Profile'
    }).then(() => {
        window.location.href = './profile.php';
    });
    </script>
    ";
}


?>