<?php
require "functions.php";
// require_once "config/connection.php";
// require_once "helper/alert.php";
// require_once "helper/authentication.php";

//* id,
//* nama,
//* id_category,
//* desc,
//* image


if (isset($_POST['submit'])) {
    if (editItem($_POST) > 0) {
        echo "<script>
                alert('data berhasil diedit!!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('data Gagal diedit!!');
                document.location.href = 'index.php';
            </script>";
    }
}


// Check data dari get
$id = $_GET['id'];

// cari data di database
// $data = query("SELECT * FROM items WHERE id = $id ")[0];


//* Pengambilan data untuk dimunculkan di value form
if (is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM items WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($query);

    //? Pengecheckan data berhasil muncul atau tidak
    if ($total == 1) {
        $data = mysqli_fetch_assoc($query);
        // var_dump($data);
    } else {
        alert("Data not found!", "./index.php");
    }
} else {
    header("location: ./index.php");
}

// var_dump(__DIR__);
// var_dump(__DIR__ . '/images/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Item</title>
</head>


<body>
    <?php require_once "./helper/header.php" ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <h1 align="center">Edit Item</h1>
        <table align="center">
            <tr>
                <td>Item Name</td>
                <td>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="hidden" name="gambarLama" value="<?= $data['images'] ?>">
                    <input type="text" name="namaItem" value="<?= $data['nameItem']; ?>">
                </td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td>
                    <select name="id_category" style="width: 100%">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $query = mysqli_query($conn, $sql);
                        while ($data_category = mysqli_fetch_assoc($query)) {
                            if ($data['id_category'] == $data_category['id']) {
                                echo "<option value='$data_category[id]' selected>$data_category[name]</option>";
                            } else {
                                echo "<option value='$data_category[id]'>$data_category[name]</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>desc</td>
                <td><input type="text" name="desc" value="<?= $data['deskripsi'] ?>"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><img src="images/<?= $data['images']; ?>" width="50px" alt=""></td>
                <td><input type="file" name="image"></td>
            </tr>

            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>