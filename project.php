<?php include'db_conn.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link rel="stylesheet" href="project.css">
</head>

<body>
    <div class="main-section">
    <div class="add-section"></div>
            <form action="create.php" method="POST">
                <h1>Create a Project</h1>

                <div class="input-group">
                    <label for="title">Project Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="input-group">
                    <label for="description">Project Description</label>
                    <input type="text" name="description">
                </div>

                <div class="input-group">
                <label for="Github">Project Github/Repository
                <input type="text" name="Github">
                </div>

                <div class="input-group">
                <label for="links">Other links</label>
                <input type="text" name="links">
                </div>

                <div class="input-group">
                <label for="skills">Skills for Project</label>
                <input type="text" name="skills">
                </div>

                <div class="input-group">
                <label for="contact">contact Info</label>
                <input type="text" name="contact">
                </div>

                <div class="input-group">
                <button type="submit" class="btn" name="project_btn">Create</button>
                </div>

            </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
            $proj  = "SELECT * FROM projects ORDER BY id DESC";
            $proj = mysqli_query($db, $proj);
            ?>
        <div class="display-section">  
        <?php if(mysqli_num_rows($proj) <= 0) { ?>
            <div class="project">
                <h2>There are currently no projects!</h2>
            </div>
            <?php } ?> 

            <?php while($projs = mysqli_fetch_assoc($proj)) { ?>
            <div class="project-item">
                <h1><?php echo $projs['Name'] ?></h1>
                <h3>Description: </h3>
                <p><?php echo $projs['Description'] ?></p>
                <h3>Project Skills</h3>
                <p><?php echo $projs['skills'] ?></p>
                <h3>Github/Repository link</h3>
                <p><?php echo $projs['Github']?></p>
                <h3>Other Links</h3>
                <p><?php echo $projs['links']?></p>
                <h3>Contact Info</h3>
                <p><?php echo $projs['Contact']?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>