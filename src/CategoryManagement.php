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
</head>

<body class="overflow-x-hidden dark:bg-gray-900 dark:text-white ">
<?php
    include ("sidebar.php")
    ?>
    
    <!-- end side bar -->
    <section class="flex-grow lg:w-9/12 flex flex-col gap-14 px-2 ">
           <h1 class="font-bold text-4xl text-center">catégories</h1>
           <table class=" table-auto w-full text-center whitespace-no-wrap border-spacing-2">
        <thead>
            <th>IdCatégorie</th>
            <th>name_of_Catégorie</th>
         </thead>
         <tbody>
            <?php
            $query = " SELECT * FROM catégories";
            $result = mysqli_query($conn, $query);

            if (!$result){
                die("query failed".mysqli_error($conn));
            }else{
                while($row =mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['IdCatégorie']?></td>
                        <td><?php echo $row['name_of_Catégorie']?></td>
                   
                        


                    </tr>
                    <?php

                }
            }
            
       
 

 
            
            ?>
           
            

        </tbody>
    

      
    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>

    <script src="../javascript/dashCategories.js"></script>

</body>

</html>