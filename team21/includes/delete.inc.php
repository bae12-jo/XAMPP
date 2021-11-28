<?php
    if(isset($_GET['del'])){
        require '../includes/dbh.inc.php';
        $id=$_GET['del'];
        $sql = "DELETE from history where id=?;";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        	mysqli_close($conn);
            header("Location: ../../team21/includes/calculator.php");
            exit();
        }
    }
?>