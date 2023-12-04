
<?php
include("connexion.php");
include("script.php");
if(isset($_POST["add_freelancer"])){
    // $id = $_POST['id'];
    $username = test_input($_POST['username']);
   $name_freelince = test_input($_POST['name_freelince']);
   $skills = test_input($_POST['skills']);
//    $selectedUsername = $_POST['username'];
 
 


   if($name_freelince == "" || empty($name_freelince)){
    header('location:freelances.php?message=you need to fill in the name');
   }else{
    $query = "INSERT into `freelances` (`name_freelince`, `skills`,`id` ) 
    values ( '$name_freelince', '$skills', $username  )";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:freelancers.php?insert_msg=You data has benn added succes');
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

        $sql = "INSERT INTO freelances (name_freelince, skills, mame) VALUES ('$name_freelince', '$skills', '$username')";

        if (mysqli_query($conn, $sql)) {
            header("location:freelancers.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving UserID for the selected username.";
    }

    mysqli_free_result($result);
}


$sql = "SELECT f.Id_freelance, f.name_freelince, f.skills, u.mame
        FROM freelances f
        JOIN usersu ON f.Id_freelance = u.id";
$result = mysqli_query($conn, $sql);


 
?>



    