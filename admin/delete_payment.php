<?php
if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];

    // delete from user_payments
    $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_id";
    $delete_result = mysqli_query($con,$delete_query);

    if($delete_result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            title: 'Deleted!',
            text: 'Payment deleted successfully 💸',
            icon: 'success',
            confirmButtonColor: '#8E44AD'
        }).then(() => {
            window.location.href = 'index.php?list_payments';
        });
        </script>
        ";
    }
}
?>
