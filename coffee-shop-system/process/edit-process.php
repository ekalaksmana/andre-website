<?php
    require_once "../config/connection.php";
    require_once "../helper/alert.php";

    if(isset($_POST['submit'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $itemName = mysqli_real_escape_string($conn, $_POST['item_name']);
        $idCategory = mysqli_real_escape_string($conn, $_POST['id_category']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
      
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');   
        $filename = $_FILES['image']['name'];
        $ukuran = $_FILES['image']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!empty($itemName) && is_numeric($idCategory) &&  !empty($desc) && in_array($ext, $ekstensi)){
           if ($ukuran < 1044070) {
               $xx = $rand . '_' . $filename;
               $test = move_uploaded_file($_FILES['image']['tmp_name'],  '../images/' . $xx);

            //    var_dump($test);

               $sql = "UPDATE items SET name='$itemName', id_category='$idCategory', desc='$desc', images='$xx' WHERE id='$id' ";
                // var_dump($id); die;
               $query = mysqli_query($conn, $sql);
               
               if ($query) {
                    alert("Data is successfully inserted!", "../index.php");
               } else {
                    $error = mysqli_error($conn);
                    alert("Something Error! $error", "../index.php");
                    header("location:../index.php");
               }
               
           } else {
            alert("Something Error! $error", "../index.php");
           }
           
        }
        else{
            alert("Please fill all form!", "../index.php");
        }
    }
    else{
        header('location: ../index.php');
    }
    
?>
