<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
include 'conn-db.php';
   $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $errors=[];
   // validate name
   if(empty($name)){
       $errors[]="you have to write the center name ";
   }

   // validate email
   if(empty($email)){
    $errors[]="you have to write your Email";
   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="your email is invalid";
   }

   $stm="SELECT email FROM users WHERE email ='$email'";
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
      $stm="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
      $conn->prepare($stm)->execute();
      $_POST['name']='';
      $_POST['email']='';

      $_SESSION['user']=[
        "name"=>$name,
        "email"=>$email,
      ];
      header('location:profile.php');
   }
}

?>

<link rel="stylesheet" type="text/css" href="mys.css">

 <form action="register.php" method="POST"> 
    <?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder="center name"><br><br>
    <input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="email"><br><br>
    <input type="password" name="password" placeholder="password"><br><br>
    <input type="submit" name="submit" value="Register">
    
    <br><br>
   
        </form> 
        <a href="login.php">  <button>log in </button>
   <a href = "index.php">   <button>  Back</button></a> 
    </a><br><br><br>
