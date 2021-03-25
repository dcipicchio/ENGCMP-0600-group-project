
<!DOCTYPE html>
<html>
<head>
    <title>CollabQuest Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>

        <form action="signup-check.php" method="post">
            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
            <?php } ?>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email">
     
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="input-group">
                <label for="re_password">Confirm Password</label>
                <input type="password" name="re_password">
            </div>

            <div class="input-group">
                <button type="submit" class="btn" name="signup_btn">Sign up</button>
            </div>

            <p>Already a user? <a href="index.php"><b>Sign in</b></a></p>
        </form>
    </div>
</body>
</html>