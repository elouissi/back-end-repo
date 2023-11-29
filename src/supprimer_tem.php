<?php 
include("connexion.php");
?>
<?php
if(isset($_GET['Id_Testimonials'])){
    echo "fffffffffffffff";
    $Id_Testimonials = $_GET['Id_Testimonials'];
    $query ="delete from `testimoniales` where `Id_Testimonials`='$Id_Testimonials'";
    $result = mysqli_query($conn, $query);
    if (!$result){
     
        die("query failed".mysqli_error());
    }else{
        header('location:témoignages.php?delete_msg=tu as supprimer le freelancer');

}
}

?>