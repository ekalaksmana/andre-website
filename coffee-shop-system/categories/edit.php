<?php
    require_once "../config/connection.php";
    require_once "../helper/alert.php";

    if (is_numeric($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $sql = "SELECT * FROM categories WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);

        if ($total == 1) {
            $data = mysqli_fetch_assoc($query);
            // var_dump($data);
        } 
        else {
            alert("Data not found!", "./index.php");
        }
        
    } 
    else {
        header("location: index.html");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Category</title>
</head>
<body>
    <form action="./procces/edit-procces.php" method="POST">
    <input type="hidden" name="id" value=" <?= $data['id']; ?>">
        <h1 align="center">Edit Category</h1>
        <table align="center">
            <tr>
                <td>Category Name</td>
                <td><input type ="text" name="category_name" value="<?= $data['name']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>