<?php
session_start();
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
    <br><br><br>
   
    <?php 
 
        if(isset($_SESSION['user'])){
            ?>
            
            <a href="profile.php"><button>profile</button></a><br><br><br>











            <?php
        }else{
            ?>
          <a href="register.php"> <button> register a new center </button></a> <br><br><br>
       <a href="donorreg.php"> <button> log in as admin  </button></a><br><br><br>
        <a href="login.php"> <button>login as a center </button> </a>
      
            <?php
        }
    ?>
    
    <br>

    <h1>
        Who we are ?
    </h1>
    <hr>
    <p>

    The project aims to provide a better fast solution for patients And Blood banks by connecting donors with patients and blood banks through this web page and mobile application for fast blood donations. <br>
Blood banks notify if there’s an emergency blood donation to nearby donors using the mobile application, after donating to an emergency case the donor gets credits in the donor’s community in the application,<br> if it’s a normal donation donor gets credits but less than the emergency, it’s a type of motivation to donors, donors could use this credit to get discounts or gifts.
 
 	 


    </p>
    <h1>
why us ?
    </h1>
    <hr>
    <p>
        Becuase our system is easy to use and clear .
    </p>
    
    
  
</body>
</html>