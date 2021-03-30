<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['title']) && isset($_POST['description'])
    && isset($_POST['Github']) && isset($_POST['links']) && isset($_POST['skills']) && isset($_POST['contact'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$title = validate($_POST['title']);
	$desc = validate($_POST['description']);
	$git = validate($_POST['Github']);
	$links = validate($_POST['links']);
	$skills = validate($_POST['skills']);
	$contact = validate($_POST['contact']);

    $sql_p = "INSERT INTO projects(Name, Description, Github, links, Contact, skills) VALUES('$title', '$desc', '$git', '$links', '$Contact', '$skills)";
    $result3 = mysqli_query($db, $sql_p);
	if($result3){
        echo "<script type='text/javascript'> document.location = 'project.php'; </script>";
		exit();
	}else{
        echo "<script type='text/javascript'> document.location = 'project.php?error=Unknown'; </script>";
		exit();
	}
	echo "<script type='text/javascript'> document.location = 'project.php'; </script>";
	exit();
}
?>