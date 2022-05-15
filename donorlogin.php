
<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:profile.php');
    exit();
}
if(isset($_POST['submit'])){
 include 'conn-db.php';
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $donor_email=filter_var($_POST['donor_email'],FILTER_SANITIZE_EMAIL);

   $errors=[];
   

   // validate email
   if(empty($donor_email)){
    $errors[]="يجب كتابة البريد الاكترونى";
   }


   // validate password
   if(empty($password)){
        $errors[]="يجب كتابة  كلمة المرور ";
   }



   // insert or errros 
   if(empty($errors)){
   
      // echo "check db";

    $stm="SELECT * FROM donors WHERE donor_email ='$donor_email'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    if(!$data){
       $errors[] = "خطأ فى تسجيل الدخول";
    }else{
        
         $password_hash=$data['password']; 
         
         if(!password_verify($password,$password_hash)){
            $errors[] = "خطأ فى تسجيل الدخول";
         }else{
            $_SESSION['user']=[
                "donor_name"=>$data['donor_name'],
                "donor_email"=>$email,
              ];
            header('location:profile.php');

         }
    }
     
    
   }
}

?>


<link rel="stylesheet" type="text/css" href="mys.css">
<form action="login.php" method="POST">
<?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['donor_email'])){echo $_POST['donor_email'];} ?>" name="donor_email" placeholder="email"><br><br>
    <input type="password" name="password" placeholder="password"><br><br>
    <input type="submit" name="submit" value="Login">
    <br><br></form>
 <a href="register.php"><button>register new center </button></a> <br><br><br>
   <a href="donorreg.php"> <button>rregister new donor </button></a> <br><br><br>
