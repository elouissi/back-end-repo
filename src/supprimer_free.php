<?php 
include("connexion.php");
?>
<?php
if(isset($_GET['IdFreelance'])){
    $IdFreelance = $_GET['IdFreelance'];
    $query ="delete from `freelances` where `IdFreelance`='$IdFreelance'";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed".mysqli_error());
    }else{
        header('location:freelances.php?delete_msg=tu as supprimer le freelancer');

}
}

?>