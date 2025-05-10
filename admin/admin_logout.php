<?php
session_start();
session_unset(); // This clears all session variables
session_destroy(); // This destroys the session
echo "<script>window.open('../index.php','_self');</script>"; // Redirect to login
?>

//btw hada bach ykhrej o ymchi l index l 3adi kaymchi l ./admin/users_aera/user_login.php w huwa hada aslan ga3 makayen so what should i do????
//what should i do???