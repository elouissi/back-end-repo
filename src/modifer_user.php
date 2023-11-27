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
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "SELECT * FROM user WHERE `id` = '$id'";
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
if(isset($_POST['ajouterDB'])){
    $id = $_POST['id'];
    $mame = $_POST['mame'];
    $PASSWORD = $_POST['PASSWORD'];
    $email = $_POST['email'];
    

    $query ="update `user` set `id` = '$id', `mame` = '$mame', `PASSWORD` = '$PASSWORD', `email` = '$email' 
    where `id` = $id";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query failed: " . mysqli_error($conn));
    }else{
        header('location:user.php?update_msg=success change');
    }
}

?>


          <form action="modifer_user.php?id_new= <?php echo  $id ;?>" method="post">
          <input type="hidden" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="IdFreelance" value="<?php echo $row['id']?>" >
            <input type="mame" name="mame" id="mame" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="name of user"  value="<?php echo $row['mame']?>" >
                   <input type="PASSWORD" name="PASSWORD" id="PASSWORD" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="PASSWORD" value="<?php echo $row['PASSWORD']?>" >
          <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="email" value="<?php echo $row['email'] ?>" >
           
           
              <input   name="ajouterDB" value="modifier" type="submit" class="btn btn-success ms-3  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 

            

         
          
      </div>
      </form>
 
</body>
</html>
 