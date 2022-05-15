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
<link rel="stylesheet" type="text/css" href="mys.css">
<body>
   
    <h1>
  Center name  : <?php echo $_SESSION['user']['name']; ?><br><br>
  
   </h1>
    <br><br>


    <br><br>
    

    <a href="addpatient.php"> <button>add new patient</button></a> <br><br><br>

<a href="getcridet.php"> <button>give credit to donors  </button> </a>

<br><br><br>

 
    <a href="display.php"><button> Display all patients </button></a>
    <br><br><br>
        <a href="logout.php">
        <button> logout</button>
    </a>
</body>

</style>
</html>