<?php
session_start();
    require_once "config/connection.php";

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM users WHERE username='$username'";
            // var_dump($sql);
            // die();
            $query = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($query);
            // var_dump($total);
            // die();

            if($total == 1){
                $data = mysqli_fetch_assoc($query);
                $encrypted_password = $data['password'];

                if (password_verify($password, $encrypted_password)) {
                    $_SESSION['fullname'] = $data['fullname'];
                    echo "<script>
                    alert('Your account is successfully login!');
                    location.href = 'dashboard.php'
                    </script>";
                } else {
                    $error = mysqli_error($conn);
                    echo "<script>
                        alert(\"Register Dulu Bossquu! $error\");
                        location.href = 'login.php'
                    </script>";
                }
                
               
            }
            else{
                $error = mysqli_error($conn);
                echo "<script>
                    alert(\"Register Dulu Bossquu! $error\");
                    location.href = 'login.php'
                </script>";
            }
        }
        else{
            echo "<script>
                alert('Please fill all forms!');
                location.href = 'login.php'
            </script>";
        }
    }
    else{
        header('location: login.php');
    }
?>