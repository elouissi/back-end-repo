<?php
include("connexion.php");


if(isset($_GET['Id_freelance'])){
    $Id_freelance = $_GET['Id_freelance'];
    $query = "DELETE FROM `freelances` WHERE `Id_freelance`='$Id_freelance'";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("query failed" . mysqli_error($conn));
    } else {
        echo "Suppression réussie";
        header('location:freelancers.php?delete_msg=tu as supprimer le freelancer');
    }
}
?>