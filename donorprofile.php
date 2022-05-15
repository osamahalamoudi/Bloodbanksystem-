<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="mys.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
 donor name  : <?php echo $_SESSION['user']['donor_name']; ?><br><br>

 
  
   </h1>
    <br><br>
    <a href="logout.php"><button>logout</button></a>

    <br><br>
    <a href="index.php"><button>home</button></a>
    <a href = "r.php">         <button>Rate centers </button></a>
</body>
</html>