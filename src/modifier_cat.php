<?php include("connexion.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification du categorie</title>
</head>
<body>
<div class=" md:p-5 space-y-4">

 
<?php
if(isset($_GET['id_cat'])){
    $id_cat = $_GET['id_cat'];
}

$query = "SELECT * FROM categores WHERE `id_cat` = '$id_cat'";
$result = mysqli_query($conn, $query);

if (!$result){
    die("Query failed: " . mysqli_error($conn));
} else {
 
    $row = mysqli_fetch_assoc($result);
   
}
if (mysqli_num_rows($result) < 0) {
    $row = mysqli_fetch_assoc($result);
    // Your code here
} else {
    // Handle the case when no rows are returned
    
}

?>






<?php 
if(isset($_POST['ajouter_cat'])){
    $id_cat = $_POST['id_cat'];
    $name = $_POST['name_cat'];
 
    

    $query ="update `categores` set `id_cat` = '$id_cat', `name_cat` = '$name' 
    where `id_cat` = $id_cat";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query failed: " . mysqli_error($conn));
    }else{
        header('location:CategoryManagement.php?update_msg=success change');
    }
}

?>


          <form action="modifer_cat.php?id_new= <?php echo  $id_cat ;?>" method="POST">
             <input type="text" name="name_cat" id="mame" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="name of user"  value="<?php echo $row['name_cat']?>" >
  
           
           
              <input   name="ajouter_cat" value="modifier" type="submit" class="btn btn-success ms-3  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 

            

         
          
      </div>
      </form>
 
</body>
</html>
 
 
