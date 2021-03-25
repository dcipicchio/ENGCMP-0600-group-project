<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if(empty($username)){
        echo "<script type='text/javascript'> document.location = 'index.php?error=Username Required'; </script>";
        exit();

    }else if(empty($pass)){
        echo "<script type='text/javascript'> document.location = 'index.php?error=Password required'; </script>";
        exit();

    }
    else{
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $pass){
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
            }
        }
        else{
            echo "<script type='text/javascript'> document.location = 'index.php?error=Invalid Login'; </script>";
        }
    }

}else{
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    exit();
   
}

?>