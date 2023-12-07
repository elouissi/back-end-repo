<?php
include("connexion.php");
require 'script.php';
require("statistiques.php");


if(isset($_POST['input'])) {

    $input = $_POST['input'];

    if($input !== 'all') {

        $query = "SELECT id_project, titre,description, name_cat, name FROM project  JOIN categores on project.id_cat=categores.id_cat JOIN user on project.id = user.id    WHERE name LIKE '%{$input}%' OR titre LIKE  '%{$input}%' ";
        $result = mysqli_query($conn, $query);


        if(mysqli_num_rows($result) > 0) { ?>

            <ul class="h-full flex-wrap flex gap-3 text-gray-50 overflow-hidden " style="padding-left: 11px;">


                <?php
                if(!$result) {
                    die("query failed".mysqli_error($conn));
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li
                            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-72 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2">

                            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48">
                                <img src="../images/img1.png" alt="">

                            </div>

                            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between">
                                <div class="flex flex-row p-3 items-center gap-0.5">
                                    <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg">
                                        <?php echo $row['titre'] ?>
                                    </h3>
                                </div>
                                <?php

                                if(isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "freelancer")):


                                    ?>
                                    <div class="flex flex-col gap-y-3">

                                        <div class="specialities flex flex-row flex-wrap my-1 text dark:text-gray-200 px-3">


                                            <a href="#" class="px-3 py-1 m-0.5 text-sm bg-custom-green- rounded-md border">
                                                assigned to
                                            </a>

                                        </div>
                                        <?php
                                endif;
                                ?>


                                    <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                                        <div class="flex flex-row gap-x-2 items-center">
                                            <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/freelancers/yassin.jpg"
                                                alt="offers Freelancer photo">
                                            <div class="flex flex-col">
                                                <p>by <strong class="freelancer-name font-semibold">
                                                        <?php echo $row['name'] ?>
                                                    </strong></p>
                                                <div class="flex flex-row items-center -mt-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                                                        fill="none">
                                                        <path
                                                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                                                            fill="#FFB331" />
                                                    </svg>
                                                    <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                                                        class="reviews text-gray-400">
                                                        <?= count_users() ?>
                                                    </p>)
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="price text-gray-900 dark:text-slate-100 font-semibold">kjnjvc</p>
                                        </div>
                                    </div>

                                    <div class="border-t border-gray-200 px-3 py-1 box-content">
                                        <p class="dilevered-days text-xs text-gray-400">description of project :
                                            <?php echo $row['description'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
        } else {
            echo "result not found";
        }
    }else{
    //
 $query_all = "SELECT id_project, titre,description, name_cat, name FROM project  JOIN categores on project.id_cat=categores.id_cat JOIN user on project.id = user.id";
    $result = mysqli_query($conn, $query_all);
    if(mysqli_num_rows($result) > 0) { ?>
            <ul class="h-full flex-wrap flex gap-3 text-gray-50 overflow-hidden " style="padding-left: 11px;">


                <?php
                if(!$result) {
                    die("query failed".mysqli_error($conn));
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li
                            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-72 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2">

                            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48">
                                <img src="../images/img1.png" alt="">

                            </div>

                            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between">
                                <div class="flex flex-row p-3 items-center gap-0.5">
                                    <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg">
                                        <?php echo $row['titre'] ?>
                                    </h3>
                                </div>
                                <?php

                                if(isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "freelancer")):


                                    ?>
                                    <div class="flex flex-col gap-y-3">

                                        <div class="specialities flex flex-row flex-wrap my-1 text dark:text-gray-200 px-3">


                                            <a href="#" class="px-3 py-1 m-0.5 text-sm bg-custom-green- rounded-md border">
                                                assigned to
                                            </a>

                                        </div>
                                        <?php
                                endif;
                                ?>


                                    <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                                        <div class="flex flex-row gap-x-2 items-center">
                                            <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/freelancers/yassin.jpg"
                                                alt="offers Freelancer photo">
                                            <div class="flex flex-col">
                                                <p>by <strong class="freelancer-name font-semibold">
                                                        <?php echo $row['name'] ?>
                                                    </strong></p>
                                                <div class="flex flex-row items-center -mt-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                                                        fill="none">
                                                        <path
                                                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                                                            fill="#FFB331" />
                                                    </svg>
                                                    <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                                                        class="reviews text-gray-400">
                                                        <?= count_users() ?>
                                                    </p>)
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="price text-gray-900 dark:text-slate-100 font-semibold">kjnjvc</p>
                                        </div>
                                    </div>

                                    <div class="border-t border-gray-200 px-3 py-1 box-content">
                                        <p class="dilevered-days text-xs text-gray-400">description of project :
                                            <?php echo $row['description'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>


                        
                        <?php
                    }
                }
            }
    }
}


?>

    </ul>