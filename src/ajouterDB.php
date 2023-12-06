
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_user"])){
 

  
   $name = test_input($_POST['name']);
   $password = test_input($_POST['password']);
   $email = test_input($_POST['email']);
 


   if($name == "" || empty($name)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `user` (`name`, `password`, `email` ) 
    values ( '$name', '$password', '$email' )";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:user.php?insert_msg=You data has benn added succes');
    }
   }
}


 
?>

