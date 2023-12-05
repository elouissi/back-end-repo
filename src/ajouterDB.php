
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_user"])){
 

  
   $name = test_input($_POST['name']);
   $PASSWORD = test_input($_POST['PASSWORD']);
   $email = test_input($_POST['email']);
 


   if($name == "" || empty($name)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `user` (`name`, `PASSWORD`, `email` ) 
    values ( '$name', '$PASSWORD', '$email' )";
    
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

