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
if(isset($_GET['IdFreelance'])){
    $IdFreelance = $_GET['IdFreelance'];
}

$query = "SELECT * FROM freelances WHERE `IdFreelance` = '$IdFreelance'";
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
if(isset($_POST['ajouter_freelancer'])){
    $IdFreelance = $_POST['IdFreelance'];
    $nom_du_freelancer = $_POST['nom_du_freelancer'];
    $Compétences = $_POST['Compétences'];
    $montant = $_POST['montant'];
    $region = $_POST['region'];
    $ville = $_POST['ville'];

    $query ="update `freelances` set `IdFreelance` = '$IdFreelance', `nom_du_freelancer` = '$nom_du_freelancer', `Compétences` = '$Compétences', `montant` = '$montant', `region` = '$region', `ville` = '$ville' 
    where `IdFreelance` = $IdFreelance";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query failed: " . mysqli_error($conn));
    }else{
        header('location:freelances.php?update_msg=success change');
    }
}

?>


          <form action="modifer_free.php?id_new= <?php echo  $IdFreelance ;?>" method="post">
          <div>
          <input type="text" name="IdFreelance" id="IdFreelance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="IdFreelance" value="<?php echo $row['IdFreelance']?>" >
              </div>
          <div>
                   <input type="nom_du_freelancer" name="nom_du_freelancer" id="nom_du_freelancer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="nom_du_freelancer"  value="<?php echo $row['nom_du_freelancer']?>" >
              </div>
          <div>
                   <input type="Compétences" name="Compétences" id="Compétences" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="Compétences" value="<?php echo $row['Compétences']?>" >
              </div>
          <div>
          <input type="text" name="montant" id="montant" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="montant" value="<?php echo $row['Montant'] ?>" >
              </div>
          <div>
                   <input type="region" name="region" id="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="region" value="<?php echo $row['region']?>"  >
              </div>
          <div>
                   <input type="ville" name="ville" id="ville" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="ville" value="<?php echo $row['ville']?>" >
              </div>
              <input   name="ajouter_freelancer" value="modifier" type="submit" class="btn btn-success ms-3  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 

            

         
          
      </div>
      </form>
<!-- <header class="flex py-2  justify-end h-12 px-8   gap-1 dark:bg-gray-800 dark:text-white ">
        <span id="dar_mode_btn">
        <img class="h-8 mx-5  dark:rotate-180  dark:bg-slate-300 dark:rounded-full " src="../images/dar_mode_icon.png" alt="icon">
    </span>
        <img class="h-auto  rounded-full" src="../images/cardYassine.jpg" alt="admin">
        <span class="text-lg self-center ">yassine eloussi</span>
    </header> -->
</body>
</html>
 