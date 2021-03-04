<?php
    require_once "../config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <?php require_once "../helper/header.php" ?>
    <form action="./procces/add-procces.php" method="POST">
        <h1 align="center">Add Category</h1>
        <table align="center">
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="category_name"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <hr>

    <table cellpadding="5" border="1" align="center" style="border-collapse: collapse">
        <tr>
            <td>#No</td>
            <td>Category Name</td>
            <td>Date Added</td>
            <td>Actions</td>
        </tr>
        <?php
            $sql = "SELECT * FROM categories ORDER BY name ASC";
            $query = mysqli_query($conn, $sql);
            $number =1;
            while ($data = mysqli_fetch_assoc($query)) {
                // var_dump($data);
                
            ?>
                <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= date("d F Y H:i:s", strtotime($data['date_added'])); ?></td>
                    <td><a href="edit.php?id=<?= $data['id'] ?>">Edit | <a href="delete.php?id=<?= $data['id'] ?>">Delete</a></a></td>
                </tr>
            <?php
            }
            // var_dump($data)            ;
        ?>
    </table>
</body>
</html>