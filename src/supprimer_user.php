<?php 
include("connexion.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query ="delete from `user` where `id`='$id'";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed".mysqli_error());
    }else{
        header('location:user.php?delete_msg=tu as supprimer le freelancer');

}
}

?>