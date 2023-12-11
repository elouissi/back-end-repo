
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_offres"])){
    // $id = $_POST['id'];
   
   $Amount = test_input($_POST['Amount']);
   $Deadline = test_input($_POST['Deadline']);
   $message = test_input($_POST['message']);
   $id = test_input($_POST['id']);
   $id_project = test_input($_POST['id_project']);

   
//    $selectedmessage = $_POST['message'];
 
 


   if($Deadline == "" || empty($Deadline)){
    header('location:offre.php?message=you need to fill in the message');
   }else{
    $query = "INSERT into `offre` (`Amount`, `Deadline`,`message`,`id`,`id_project` ) 
    values ( '$Amount', '$Deadline', '$message' , $id, $id_project)";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:remplissage_offre.php?insert_msg=You data has benn added succes');
    }
   }
}

 
?>



    