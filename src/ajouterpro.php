
<?php
 
include("connexion.php");
if(isset($_POST["add_project"])){
   $titre = $_POST['titre'];
   $description = $_POST['description'];
   $name_cat = $_POST['name_cat'];
var_dump($name_cat);
//    $IdSousCatégories = $_POST['IdSousCatégories'];
//    $idUser = $_POST['idUser'];


   if($titre == "" || empty($titre)){
    header('location:projects.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `project` (`titre`, `description`, `id_cat` ) 
    values ('$titre', '$description', '$name_cat')";
    
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

