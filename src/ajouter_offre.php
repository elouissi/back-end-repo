
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_offres"])){
    // $id = $_POST['id'];
    $titre = test_input($_POST['titre']);
   $Amount = test_input($_POST['Amount']);
   $Deadline = test_input($_POST['Deadline']);
//    $selectedtitre = $_POST['titre'];
 
 


   if($Deadline == "" || empty($Deadline)){
    header('location:offre.php?message=you need to fill in the titre');
   }else{
    $query = "INSERT into `offre` (`Amount`, `Deadline`,`id_project` ) 
    values ( '$Amount', '$Deadline', $titre  )";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:offre.php?insert_msg=You data has benn added succes');
    }
   }
}



$query = "SELECT titre FROM project";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn) . "<br>Query: " . $query);
}
$titres = [];
while ($row = mysqli_fetch_assoc($result)) {
    $titres[] = $row['titre'];
}
mysqli_free_result($result);
 

$selectedtitre = isset($_POST["titre"]) ? $_POST["titre"] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Assuming you have a column titred 'projectid_project' in the 'projects' table
    $query = "SELECT id_project FROM project WHERE titre = '$selectedtitre'";

    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $projectid_project = $row['id_project'];

        $sql = "INSERT INTO offre (Amount, Deadline, titre) VALUES ('$Amount', '$Deadline', '$titre')";

        if (mysqli_query($conn, $sql)) {
            header("location:offre.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving projectid_project for the selected titre.";
    }

    mysqli_free_result($result);
}


$sql = "SELECT o.Id_offer, o.Amount, o.Deadline, p.titre
        FROM offre o
        JOIN project p ON o.Id_offer = p.id_project";
$result = mysqli_query($conn, $sql);


 
?>



    