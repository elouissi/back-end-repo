
<?php
include("connexion.php");
if(isset($_POST["ajouter_tem"])){
    // $id = $_POST['id'];
    $username = $_POST['username'];
   $commente = $_POST['commente'];
 
//    $selectedUsername = $_POST['username'];
 
 


   if($commente == "" || empty($commente)){
    header('location:témoignages.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `freelances` (`commente`, `id` ) 
    values ( '$commente',   $username  )";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:témoignages.php?insert_msg=You data has benn added succes');
    }
   }
}



$query = "SELECT mame FROM user";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn) . "<br>Query: " . $query);
}
$usernames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $usernames[] = $row['UserName'];
}
mysqli_free_result($result);
 

$selectedUsername = isset($_POST["username"]) ? $_POST["username"] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Assuming you have a column named 'UserID' in the 'users' table
    $query = "SELECT id FROM user WHERE mame = '$selectedUsername'";

    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $userID = $row['id'];

        $sql = "INSERT INTO testimoniales (commente,  mame) VALUES ('$commente', '$username')";

        if (mysqli_query($conn, $sql)) {
            header("location:témoignages.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving UserID for the selected username.";
    }

    mysqli_free_result($result);
}


$sql = "SELECT t.Id_Testimonials, f.commente , u.mame
        FROM testimoniales t
        JOIN users u ON t.Id_Testimonials = u.id";
$result = mysqli_query($conn, $sql);


 
?>

