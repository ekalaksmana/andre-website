<?php
require_once "config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Items</title>
</head>

<body>
    <?php require_once "helper/header.php" ?>
    <form action="./process/add-process.php" method="POST" enctype="multipart/form-data">
        <h1 align="center">Add Item</h1>
        <table align="center">
            <tr>
                <td>Item Name</td>
                <td><input type="text" name="item_name"></td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td>
                    <select name="id_category" style="width: 100%">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $query = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_assoc($query)) {
                            echo "<option value='$data[id]'>$data[name]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Desc</td>
                <td><input type="text" name="desc"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="file" name="image"></td>
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
            <td>Item Name</td>
            <td>Category</td>
            <td>Desc</td>
            <td>Images</td>
            <td>Actions</td>
        </tr>
        <?php
        $data = mysqli_query($conn, "select * from items");
        while ($d = mysqli_fetch_array($data)) {
            $number = 1;
        ?>
            <tr>
                <td><?= $number++ ?></td>
                <td><?= $d['nameItem'] ?></td>
                <td><?= $d['id_category'] ?></td>
                <td><?= $d['deskripsi'] ?></td>
                <td><img src="images/<?= $d['images']; ?>" width="100"></td>
                <td><a href="edit.php?id=<?= $d['id']; ?>">Edit</a> | <a href="delete.php?id=<?= $d['id'] ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>