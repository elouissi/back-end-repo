
<?php
 
include("connexion.php");
include("script.php");
if(isset($_POST["add_project"])){
   $name = test_input($_POST['name']);
   $titre = test_input($_POST['titre']);
   $description = test_input($_POST['description']);
   $name_cat = test_input($_POST['name_cat']);
var_dump($name_cat);
//    $IdSousCatégories = $_POST['IdSousCatégories'];
//    $idUser = $_POST['idUser'];


   if($titre == "" || empty($titre)){
    header('location:projects.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `project` (`titre`, `description`, `id_cat` ,`id`) 
    values ('$titre', '$description', '$name_cat','$name')";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error($conn));
    }
    else{
        header('location:projects.php?insert_msg=You data has benn added succes');
    }
   }
}




 
?>

