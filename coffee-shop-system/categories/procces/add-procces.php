<?php 
    require_once "../../config/connection.php";
    require_once "../../helper/alert.php";

    if (isset($_POST['submit'])) {
        $categoryName = mysqli_real_escape_string($conn, $_POST['category_name']);

        if (!empty($categoryName)) {
            $sql = "INSERT INTO categories VALUES (NULL, '$categoryName', now())";
            $query = mysqli_query($conn, $sql);
        
            if ($query) {
                alert("Data is successfully inserted", "../index.php");
            } 
            else {
                $error = mysqli_error($conn);
                alert("Something Error! $error" , "../index.php");
            }
        }    
        else {
            alert("Please fill all form!", "../index.php");
        }
        
    } else {
        header('location: ../index.php');
    }
    
?>  