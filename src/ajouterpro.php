
<?php
echo "ghhhhhhhhhhhhh";
include("connexion.php");
if(isset($_POST["add_projects"])){
    $IdProject = $_POST["IdProject"];
   $TitleOfProject = $_POST['TitleOfProject'];
   $Description_of_project = $_POST['Description_of_project'];
   $IdCatégorie = $_POST['IdCatégorie'];
   $IdSousCatégories = $_POST['IdSousCatégories'];
   $idUser = $_POST['idUser'];


   if($TitleOfProject == "" || empty($TitleOfProject)){
    header('location:projects.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `projects` (`IdProject`, `TitleOfProject`, `Description_of_project`, `IdCatégorie`, `IdSousCatégories`, `idUser`) 
    values ($IdProject, '$TitleOfProject', '$Description_of_project', '$IdCatégorie', '$IdSousCatégories', '$idUser')";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:projects.php?insert_msg=You data has benn added succes');
    }
   }
}


 
?>

