<?php session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="sylesheet" href="style.css">
</head>

<body>
    <div class="message">
        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        <a href="logout.php" class="logout">Logout</a>
</div>
</body>
</html>

<?php
}else{
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}