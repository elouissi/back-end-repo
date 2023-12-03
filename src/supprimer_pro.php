<?php 
include("connexion.php");
 
if(isset($_GET['id_project'])){
    echo"errrro";
    $id_project = $_GET['id_project'];
    $query ="delete from `project` where `id_project`='$id_project'";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed".mysqli_error());
        echo "yassin";
    }else{
        header('location:projects.php?delete_msg=tu as supprimer le freelancer');

}
}

?>