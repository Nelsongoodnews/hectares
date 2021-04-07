<?php 

if($_SESSION['accessytpe'] == "Student"){
    session_start();
    session_destroy();
    echo "<script>window.location='login'</script>";
}elseif($_SESSION['accessytpe'] == "Admin"){
    session_start();
    session_destroy();
    echo "<script>window.location='adlogin'</script>";
}

?>