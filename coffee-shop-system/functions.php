<?php
require 'config/connection.php';


//* Query data
function query($query)
{
    global $connection;

    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function editItem($data)
{
    global $conn;

    //* jabarkan data dulu
    $id = htmlspecialchars($data['id']);
    $namaItem = htmlspecialchars($data['namaItem']);
    $id_category = htmlspecialchars($data['id_category']);
    $desc = htmlspecialchars($data['desc']);
    $gambar = htmlspecialchars($data['image']);
    $gambarLama = htmlspecialchars($data['gambarLama']);


    //? check apakah user memilih untuk upload gambar baru atau tidak?
    if ($_FILES['image']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    //*Query update data
    $query = "UPDATE items SET
            nameItem = '$namaItem',
            id_category = '$id_category',
            deskripsi = '$desc',
            images = '$gambar' WHERE id = '$id'
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    //* ambil dulu beberapa data di $_FILES
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    //? check apakah tidak ada gambar yg diupload
    if ($error === 4) {
        echo "<script>
            alert('Upload gambar terlebih dahulu!!');
        </script>";
        return false;
    }

    //? Check apakah ukurannya terlalu besar!?
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran terlalu besar!');
        </script>";
        return false;
    }

    //? Check apakah yg diupload itu gambar?
    //* jadi kita ambil ekstensi gambar yg didalam database lalu kita valid kan dengan ekstensi gambar yang sudah kita siapkan sendiiri.

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png']; //* Pilih format yg valid
    $ekstensiGambar = explode('.', $namaFile); //* Pecahkan formatfile menjadi array
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //* Ambil data yg paling akhir alias array yg berisi format filennya

    //* check apakah ekstensi gambar sesuai dengan ekstensigambarvalid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Masukan gambar berformat JPEG,PNG,JPG');
        </script>";
        return false;
    }

    //? ketika ternyata gambar memiliki nama file yg sama
    //* Generate Gambar baru;
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //* Memindahkan file kedalam directory kita
    move_uploaded_file($tmpName, 'images/' . $namaFile);

    return $namaFile;
}
