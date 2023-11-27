
<?php
include("connexion.php");
if(isset($_POST["add_freelancer"])){
    $IdFreelance = $_POST["IdFreelance"];
   $nom_du_freelancer = $_POST['nom_du_freelancer'];
   $Compétences = $_POST['Compétences'];
   $montant = $_POST['montant'];
   $region = $_POST['region'];
   $ville = $_POST['ville'];


   if($nom_du_freelancer == "" || empty($nom_du_freelancer)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `freelances` (`IdFreelance`, `nom_du_freelancer`, `Compétences`, `Montant`, `region`, `ville`) 
    values ($IdFreelance, '$nom_du_freelancer', '$Compétences', '$montant', '$region', '$ville')";
    
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

IdFreelance