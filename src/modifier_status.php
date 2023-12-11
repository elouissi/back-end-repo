<?php
include("connexion.php");
require 'script.php';
require("statistiques.php");
?>
<?php
if(isset($_GET['Id_offer'])){
    $Id_offer = $_GET['Id_offer'];

 
 
 
  
   
  
    $query_status ="update `offre` set `status` = 'Approved' 
    where `Id_offer` = $Id_offer";
    $result_status = mysqli_query($conn, $query_status);

    if (!$result_status){
      
        echo"error";
    }else{
        header('location:search.php?update_msg=success change');
    }
    // Your code here
 
}
 


?>

 