<?php
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];
    $delete_query = "DELETE FROM `products` WHERE product_id = $delete_id";
    $delete_result = mysqli_query($con,$delete_query);

    if($delete_result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            title: 'Deleted!',
            text: 'Product deleted successfully 🗑️',
            icon: 'success',
            confirmButtonColor: '#6C5CE7' // Feel free to match this to your brand
        }).then(() => {
            window.location.href = 'index.php?view_products';
        });
        </script>
        ";
    }
}
?>
