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

<body class="overflow-x-hidden dark:bg-gray-900 dark:text-white">
  <!-- #endregion -->
   <?php
    include ("sidebar.php")
    ?>
      <!-- side bar -->
      <section class="flex-grow lg:w-9/12 flex flex-col gap-14 px-2 ">
           <h1 class="font-bold text-4xl text-center">témoignages</h1>
           <table class=" table-auto w-full text-center whitespace-no-wrap border-spacing-2">
        <thead>
            <th>IdTémoignage</th> 
            <th>comment</th>
            <th>idUser</th>
         
        </thead>
        <tbody>
        <?php
            $query = " SELECT * FROM témoignages";
            $result = mysqli_query($conn, $query);

            if (!$result){
                die("query failed".mysqli_error($conn));
            }else{
                while($row =mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['IdTémoignage']?></td>
                        <td><?php echo $row['comment']?></td>
                        <td><?php echo $row['idUser']?></td>
        
                      
                        


                    </tr>
                    <?php

                }
            }
            
       
 

 
            
            ?>
           
        </tbody>
    

 
    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>

    <script src="../javascript/dashInbox.js"></script>

</body>

</html>