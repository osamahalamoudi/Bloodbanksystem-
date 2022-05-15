<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
include 'conn-db.php';
   $donor_name=filter_var($_POST['donor_name'],FILTER_SANITIZE_STRING);
   $_SESSION['donor_name'] = $donor_name ;
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $donor_email=filter_var($_POST['donor_email'],FILTER_SANITIZE_EMAIL);
   $bloodtype=filter_var($_POST['bloodtype'],FILTER_SANITIZE_STRING);

   $errors=[];
   // validate name
   if(empty($donor_name)){
       $errors[]="you have to write the center name ";
   }

   // validate email
   if(empty($donor_email)){
    $errors[]="you have to write your Email";
   }elseif(filter_var($donor_email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="your email is invalid";
   }

   $stm="SELECT email FROM users WHERE donor_email ='$donor_email'";
   $q=$conn->prepare($stm);
   $q->execute();
   $data=$q->fetch();

   if($data){
     $errors[]="email is already exist";
   }


   // validate password
   if(empty($password)){
        $errors[]=" you have to write your password";
   }elseif(strlen($password)<6){
    $errors[]=" password must be longer than 6 digits  ";
}



   // insert or errros 
   if(empty($errors)){
      // echo "insert db";
      $password=password_hash($password,PASSWORD_DEFAULT);
      $stm="INSERT INTO donors (donor_name,donor_email,password,bloodtype) VALUES ('$donor_name','$donor_email','$password','$bloodtype')";
      $conn->prepare($stm)->execute();
      $_POST['donor_name']='';
      $_POST['donor_email']='';
      $_POST['bloodtype']='';

      $_SESSION['user']=[
        "donor_name"=>$donor_name,
        "donor_email"=>$donor_email,
        "bloodtype"=>$bloodtype,
      ];
      header('location:donorprofile.php');
   }
}

?>

<link rel="stylesheet" type="text/css" href="mys.css">


<form action="donorreg.php" method="POST">
    <?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['donor_name'])){echo $_POST['donor_name'];} ?>" name="donor_name" placeholder="donor name"><br><br>
    <input type="email" value="<?php if(isset($_POST['donor_email'])){echo $_POST['donor_email'];} ?>" name="donor_email" placeholder="email"><br><br>
    <input type="text" value="<?php if(isset($_POST['bloodtype'])){echo $_POST['bloodtype'];} ?>" name="bloodtype" placeholder="bloodtype"><br><br>
    <input type="password" name="password" placeholder="password"><br><br>
    <input type="submit" name="submit2" value="Register">
    <br><br>
  
</form> 
 <a href="login.php"><button>login</button></a><br><br><br>