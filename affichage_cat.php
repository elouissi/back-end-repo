<?php
function get_top_categories(){
    global $conn;
    $sql = "SELECT categores.*, COUNT(project.id_project) AS project_count
            FROM categores
            LEFT JOIN project ON categores.id_project = project.id_cat
            GROUP BY categores.id_project
            ORDER BY project_count DESC
            LIMIT 5
            ;";
    $res = mysqli_query($conn, $sql);
    return $res;
}?>