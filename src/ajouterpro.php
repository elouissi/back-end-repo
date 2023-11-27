
<?php
echo "ghhhhhhhhhhhhh";
include("connexion.php");
if(isset($_POST["add_project"])){
    $id_project = $_POST["id_project"];
   $TitleOfProject = $_POST['TitleOfProject'];
   $description = $_POST['description'];
   $name_cat = $_POST['name_cat'];
//    $IdSousCatégories = $_POST['IdSousCatégories'];
//    $idUser = $_POST['idUser'];


   if($TitleOfProject == "" || empty($TitleOfProject)){
    header('location:projects.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `project` (`id_project`, `titre`, `description`, `IdCatégorie` ) 
    values ($id_project, '$titre', '$description', '$name_cat')";
    
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:projects.php?insert_msg=You data has benn added succes');
    }
   }
}

$query = "SELECT name_cat FROM project";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn) . "<br>Query: " . $query);
}
$name_cats = [];
while ($row = mysqli_fetch_assoc($result)) {
    $name_cats[] = $row['name_cat'];
}
mysqli_free_result($result);

$selectedcatname = isset($_POST["name_cat"]) ? $_POST["name_cat"] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Assuming you have a column named 'UserID' in the 'users' table
    $query = "SELECT id_cat FROM project WHERE name_cat = '$selectedcatname'";

    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $userID = $row['id'];

        $sql = "INSERT INTO project (TitleOfProject, description, name_cat) VALUES ('$TitleOfProject', '$description', '$name_cat')";

        if (mysqli_query($conn, $sql)) {
            header("location:projects.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving UserID for the selected username.";
    }

    mysqli_free_result($result);
}
$sql ="SELECT id_project, titre, name_cat  FROM project INNER JOIN 
categores on project.id_cat=categores.id_cat";
$result = mysqli_query($conn, $sql);



 
?>

