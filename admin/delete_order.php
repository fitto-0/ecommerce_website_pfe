<?php
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];

    // delete from user_orders
    $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
    $delete_result = mysqli_query($con,$delete_query);

    if($delete_result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Order deleted successfully ✅',
            confirmButtonColor: '#10B981'
        }).then(() => {
            window.location.href = 'index.php?list_orders';
        });
        </script>
        ";
    }
}
?>
