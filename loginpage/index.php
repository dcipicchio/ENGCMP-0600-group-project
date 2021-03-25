
<!DOCTYPE html>
<html>
<head>
    <title>CollabQuest Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>

        <form action="login.php" method="post">
            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
            <?php } ?>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
     
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_btn">Login</button>
            </div>

            <p>Not a user yet? <a href="register.php"><b>Sign up</b></a></p>
        </form>
    </div>
</body>
</html>