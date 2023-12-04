<?php include("connexion.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class=" md:p-5 space-y-4">

 
<?php
if(isset($_GET['Id_freelance'])){
    $Id_freelance = $_GET['Id_freelance'];
}

$query = "SELECT * FROM freelances WHERE `Id_freelance` = '$Id_freelance'";
$result = mysqli_query($conn, $query);

if (!$result){
    die("Query failed: " . mysqli_error($conn));
} else {
 
    $row = mysqli_fetch_assoc($result);
   
}
if (mysqli_num_rows($result) < 0) {
    $row = mysqli_fetch_assoc($result);
 
} else {
 
}

?>






<?php 
if(isset($_POST['ajouterdbfre'])){
    $Id_freelance = $_POST['Id_freelance'];
    $name_freelince = $_POST['name_freelince'];
    $skills = $_POST['skills'];
 
    

    $query ="update `freelances` set `Id_freelance` = '$Id_freelance', `name_freelince` = '$name_freelince', `skills` = '$skills' 
    where `Id_freelance` = $Id_freelance";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query failed: " . mysqli_error($conn));
    }else{
        header('location:freelancers.php?update_msg=success change');
    }
}

?>


          <form action="modifer_free.php?id_new= <?php echo  $id ;?>" method="post">
          <input type="hidden" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="IdFreelance" value="<?php echo $row['Id_freelance']?>" >
            <input type="name_freelince" name="name_freelince" id="name_freelince" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="name of user"  value="<?php echo $row['name_freelince']?>" >
                   <input type="skills" name="skills" id="skills" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="skills" value="<?php echo $row['skills']?>" >
            
           
              <input   name="ajouterdbfre" value="modifier" type="submit" class="btn btn-success ms-3  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 

            

         
          
      </div>
      </form>
 
</body>
</html>
 