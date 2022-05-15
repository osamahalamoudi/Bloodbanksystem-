

<?php
session_start();

if(isset($_POST['add'])){
include 'congih.php';
$name = $_POST['name'] ;
$bloodtype = $_POST['bloodtype']; 
$phonenumber = $_POST['phonenumber'] ;
$status = $_POST['status'] ;


$errors=[];
if(empty($name)){
  $errors[]="you have to write the patient name ";


  
  
}
if(empty($bloodtype)){
  $errors[]="you have to write the patient  BloodType ";
}

if(empty($phonenumber)){
  $errors[]="you have to write the patient phonenumber ";
}
if(empty($status)){
  $errors[]="you have to write the patient status ";
}


   // insert or errros 
   if(empty($errors)){
      // echo "insert db";
     
      $stm="INSERT INTO patient (name,bloodtype,phonenumber,status) VALUES ('$name','$bloodtype','$phonenumber','$status')";
      $conn->prepare($stm)->execute();
      $_POST['name']='';
      $_POST['bloodtype']='';
      $_POST['phonenumber']='';
      $_POST['status']='';


      $alert = '<script>alert("Patient added ")</script>';
echo $alert;



      
   }
   
   
   
   
}

?> 



 

<link rel="stylesheet" type="text/css" href="mys.css">

<form action="addpatient.php" method="POST">
<h1 id="newp"> Add New patient </h1>



  
  <input type="text" id="tx"  name="name" placeholder="patient name "><br><br>
  <input type="text" id="tx" name="bloodtype" placeholder="patient blood type "><br><br>
  <input type="text" id="tx"  name="phonenumber" placeholder=" patient phonenumber  "><br><br>
  <input type="text" id="tx" name="status" placeholder="patient status "><br><br>
   
    <input type="submit" id ="a" name="add" value="add ">
    <br><br>
  

</form>
  <a href="profile.php"><button>Home page</button> </a>











