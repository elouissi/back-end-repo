<?php 
include("connexion.php");
?>
<?php
if(isset($_GET['id_cat'])){
    $id = $_GET['id_cat'];
    $query ="DELETE from `categores` where `id_cat`='$id'";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed".mysqli_error());

    }else{

  
        header('location:CategoryManagement.php?delete_msg=tu as supprimer le freelancer');

}
}

?>