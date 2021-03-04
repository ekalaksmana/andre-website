<?php
    require_once "../config/connection.php";
    require_once "../helper/alert.php";

    if (is_numeric($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $sql = "SELECT * FROM categories WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);

        if ($total == 1) {
            $sql = "DELETE FROM categories WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                alert("Data is successfully deleted", "./index.php");
            } 
            else {
                $error = mysqli_error($conn);
                alert("Something Error! $error");
            }
            
        } 
        else {
            alert("Data not found!", "./index.php");
        }
        
    } 
    else {
        header("location: index.html");
    }
    
?>