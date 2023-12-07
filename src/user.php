<?php 
include ("connexion.php");
include ("script.php")
?>
<!doctype html>
<html >

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/style.css">
</head>

<?php
    
    if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "freelancer" ):
    ?>

<body class="overflow-x-hidden  dark:bg-gray-900 dark:text-white">
   
<?php
    include ("sidebar.php")
    ?>

        <!-- end side bar -->

   

 
    <!-- end side bar -->

        <section class="flex-grow lg:w-9/12 flex flex-col gap-14 px-2 ">
           <h1 class="font-bold text-4xl text-center">users</h1>
           <button id="btnmodal" class="flex items-center text-center  p-2 text-gray-900 rounded-lg dark:bg-custom-green hover:bg-gray-100 dark:hover:bg-gray-700 group"style="width: 105px ;padding-left:35px">ADD  </button>
           

<!-- Modal toggle -->
 
<!-- Main modal -->
<form action="ajouterDB.php" method="post">
<div id="default-modal" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  add freelance
                </h3>
                <button id="close-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" md:p-5 space-y-4">
            <form action="">
               
                <div>
                         <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="name"  >
                    </div>
                <div>
                         <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="password"  >
                    </div>
                <div>
                         <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 mb-4 dark:text-white" placeholder="email"  >
                    </div>
                 
                    </form>
                  

               
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button id="last_btn_close" data-modal-hide="default-modal" type="button" class="btn btn-secondary text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            <input   name="add_user" value="add" type="submit" class="btn btn-success ms-3  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 
            </div>
        </div>
    </div>
</div>
</form>

           <table class=" table-auto w-full text-center whitespace-no-wrap border-spacing-2">
        <thead class="dark:bg-custom-green dark:text-black rounded-lg mb-3" >
           <th>id</th>
            <th>name complet</th>
 
            <th>email</th>
            
            <th>ajouter</th>
            <th>supprimer</th>


        </thead>
        <tbody>
            <?php
            $query = " SELECT * FROM user";
            $result = mysqli_query($conn, $query);

            if (!$result){
                die("query failed".mysqli_error($conn));
            }else{
                while($row =mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                     
                        <td><?php echo $row['email']?></td>
                         
                        <td><a href="modifer_user.php?id=<?php echo $row['id'] ; ?>" class="btn flex items-center text-center  p-2 text-gray-900 rounded-lg dark:bg-custom-green hover:bg-gray-100 dark:hover:bg-gray-700 group"style=" margin:10px" >modifier</a></td>
                        <td><a href="supprimer_user.php?id=<?php echo $row['id'] ; ?>" class="btn flex items-center text-center  p-2 text-red-900 rounded-lg  dark:bg-custom-green hover:bg-gray-100 dark:hover:bg-gray-700 group"style="margin:10px " >supprimer</a></td>
                        
                        


                    </tr>
                    <?php

                }
            }
            
       
 

 
            
            ?>
           
            

        </tbody>

    </table>
    <?php
    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }
    ?>
    <?php
    if(isset($_GET['insert_msg'])){
        echo "<h6>".$_GET['insert_msg']."</h6>";
    }
    ?>
    <?php
    if(isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']."</h6>";
    }
    ?>
    
 
        </section>
    </div>



    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
    <script src="../javascript/freelances.js"></script>

    <script src="../javascript/dashUser.js"></script>

</body>
<?php else: ?>
    <?php
        // Redirect to a specific location if the role is neither admin nor freelancer
        header("Location: index.php");
        exit; // Ensure that the script stops here after the redirect
    ?>
  <?php
  endif;
  ?>

</html>

