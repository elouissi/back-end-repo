
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_cat"])){
 

  
   $name = test_input($_POST['name_cat']);
 
 


   if($name == "" || empty($name)){
    header('location:CategoryManagement.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `categores` (`name_cat` ) 
    values ( '$name' )";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:CategoryManagement.php?insert_msg=You data has benn added succes');
    }
   }
}


 
?>