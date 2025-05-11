<?php
if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];
    $delete_query = "DELETE FROM `categories` WHERE category_id = $delete_id";
    $delete_result = mysqli_query($con,$delete_query);

    if($delete_result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Category deleted successfully ✅',
            confirmButtonColor: '#10B981'
        }).then(() => {
            window.location.href = 'index.php?view_categories';
        });
        </script>
        ";
    }
}
?>
