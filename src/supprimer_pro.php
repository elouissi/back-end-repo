<?php 
include("connexion.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query ="delete from `project` where `id_project`='$id_project'";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed".mysqli_error());
    }else{
        header('location:projects.php?delete_msg=tu as supprimer le freelancer');

}
}

?>