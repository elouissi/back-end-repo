<?php 
include ("connexion.php")
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



<body class="overflow-x-hidden  dark:bg-gray-900 dark:text-white">
   
<?php
    include ("sidebar.php")
    ?>
 
        <section class="flex-grow lg:w-9/12 flex flex-col gap-14 px-2 ">
           <h1 class="font-bold text-4xl text-center">Témoignages</h1>
            
 

           <table class=" table-auto w-full text-center whitespace-no-wrap border-spacing-2">
        <thead class="dark:bg-custom-green dark:text-black rounded-lg mb-3" >
           <th>Id_Testimonials</th>
            <th>commente</th>
            <th>name_user</th>
     
   
            <th>supprimer</th>


        </thead>
        <tbody>
            <?php
            $query = " SELECT  testimoniales.* , user.mame FROM testimoniales
            LEFT JOIN user ON testimoniales.Id_Testimonials = user.id";
            $result = mysqli_query($conn, $query);

            if (!$result){
                die("query failed".mysqli_error($conn));
            }else{
                while($row =mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?php echo $row['Id_Testimonials']?></td>
                    <td><?php echo $row['commente']?></td>
                        <td><?php echo $row['mame']?></td>                         
                         <td><a href="supprimer_tem.php?IdFreelance=<?php echo $row['Id_Testimonials'] ; ?>" class="btn flex items-center text-center  p-2 text-red-900 rounded-lg  dark:bg-custom-green hover:bg-gray-100 dark:hover:bg-gray-700 group"style="margin:10px " >supprimer</a></td>
 
                    </tr>
                    <?php

                }
            }            
            ?>
           
            

        </tbody>

    </table>

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

</html>

