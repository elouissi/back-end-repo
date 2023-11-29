<?php
   include("connexion.php");
              function count_users() {
    global $conn;
    $countQuery = "SELECT COUNT(*) AS UsersCount FROM user";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $Users = $rowCountFreelances['UsersCount'];
        return $Users;
    } else {
        echo "Error: " . $Users . "<br>" . mysqli_error($conn);
    }
}
              function count_freelancers() {
    global $conn;
    $countQuery = "SELECT COUNT(*) AS freelancesCount FROM freelances";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $freelancers = $rowCountFreelances['freelancesCount'];
        return $freelancers;
    } else {
        echo "Error: " . $freelancers . "<br>" . mysqli_error($conn);
    }
}
              function count_projects() {
    global $conn;
    $countQuery = "SELECT COUNT(*) AS projectsCount FROM project";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $projects = $rowCountFreelances['projectsCount'];
        return $projects;
    } else {
        echo "Error: " . $projects . "<br>" . mysqli_error($conn);
    }
}
              function count_categories() {
    global $conn;
    $countQuery = "SELECT COUNT(*) AS categoriesCount FROM categores";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $categories = $rowCountFreelances['categoriesCount'];
        return $categories;
    } else {
        echo "Error: " . $categories . "<br>" . mysqli_error($conn);
    }
}
?> 
 