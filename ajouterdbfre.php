
<?php
include("connexion.php");
if(isset($_POST["add_user"])){
  
   $mame = $_POST['mame'];
   $PASSWORD = $_POST['PASSWORD'];
   $email = $_POST['email'];
 


   if($mame == "" || empty($mame)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `user` (`mame`, `PASSWORD`, `email` ) 
    values ( '$mame', '$PASSWORD', '$email' )";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:freelances.php?insert_msg=You data has benn added succes');
    }
   }
}


 
?>

