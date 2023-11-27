
<?php
include("connexion.php");
if(isset($_POST["add_freelancer"])){
  
   $name_freelince = $_POST['name_freelince'];
   $skills = $_POST['skills'];
   $id = $_POST['id'];
 


   if($name_freelince == "" || empty($name_freelince)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `freelances` (`name_freelince`, `skills`, `id` ) 
    values ( '$name_freelince', '$skills', '$id' )";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:freelancers.php?insert_msg=You data has benn added succes');
    }
   }
}


 
?>

