<?php

require_once("connexion.php");

session_start();


if (isset($_POST['submit'])) {
    signup();

}
if (isset($_POST["login"])) {
    login();
}


// setcokie(name, value, expire, path, domain, secure, httponty)
function signup()
{
    global $conn;

    $image = $_FILES["image"]["name"];
    $name = $_POST["f_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST['user_type'];
    $confirmPassword = $_POST["repeat_password"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    if ($_POST['password'] == $confirmPassword) {
        if (isset($_POST['user_type'])) {
            $userType = $_POST['user_type'];
    
            // Assign user based on selected user type
            if ($userType === 'user') {
                // Assign user as a client
                $role = 'user';
            } elseif ($userType === 'freelancer') {
                // Assign user as a freelancer
                $role = 'freelancer';
            } else {
                // Handle other cases if needed
                echo 'Invalid user type selected.';
                exit;
            }
        }
        if(file_exists("uploads/".$_FILES['image']['name'])){
            echo "already exist";

        }else{
            
        $sql = "INSERT INTO user ( name, email, password, role, image) VALUES (?,?,?,?,?)";

        // préparez une requête stmt (mysqli_prepare)
        $stmt = mysqli_prepare($conn, $sql);

        // liez le paramètre (mysqli_stmt_bind_param)


        mysqli_stmt_bind_param($stmt, 'sssss', $name, $email, $password, $role, $image);

        // exécutez la requête préparée (mysqli_stmt_execute )

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES["image"]["name"]);
            header("Location: log_in.php");
        } else {
            echo "Error";
        }

        // Assurez-vous de quitter le script après une redirection


        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        }

        //performance securite

    } else {
        echo "pasword dosen't match";
    }


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// function login()
// {

//     global $conn;

//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $email = test_input($_POST["email"]);
//         $password = test_input($_POST["PASSWORD"]);

//         // Prepare a query with a single parameter for email
//         $sql = "SELECT * FROM user WHERE email = ?";

//         // Prepare the query
//         $stmt = mysqli_prepare($conn, $sql);

//         // Bind the parameter (only for email)
//         mysqli_stmt_bind_param($stmt, 's', $email);

//         // Execute the prepared query
//         mysqli_stmt_execute($stmt);

//         // Get the result (mysqli_stmt_get_result)
//         $result = mysqli_stmt_get_result($stmt);

//         // Check if a row is fetched
//         if ($row = mysqli_fetch_assoc($result)) {
//             // Verify the password
//             $role = $row['role'];
//             $_SESSION['role'] = $row['role'];
//             $_SESSION['id'] = $row['id'];
//             $_SESSION['name'] = $row['name']; 

//             echo $role;

//             if (password_verify($password, $row['PASSWORD'])) {
//                 // Set common session variables
            

//                 if ($role == "user") {
//                     // $_SESSION['role'] = 'user';
//                     header("location:index.php");

//                 } 
                
//                 if ($role == 'admin') {
//                     // Set admin-specific session variables
//                     // $_SESSION["role"] = "admin";

//                     header("location: dashboard.php");

//                     // Check if email is set and set cookies
//                     // if (isset($_POST['email'])) {
//                     //     setcookie('email', $email, time() + 2 * 60, '/');
//                     //     setcookie('PASSWORD', $password, time() + 2 * 60, '/');
//                     //     header('location: index.php');
//                     // }

//                 } 
//             } else {
//                 echo "Invalid password";
//             }
//         } 
//         // else {
//         //     echo "Invalid email";
//         // }
//     }
// }


function login()
{
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);

        // Prepare a query with a single parameter for email
        $sql = "SELECT * FROM user WHERE email = ?";

        // Prepare the query
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameter (only for email)
        mysqli_stmt_bind_param($stmt, 's', $email);

        // Execute the prepared query
        mysqli_stmt_execute($stmt);

        // Get the result (mysqli_stmt_get_result)
        $result = mysqli_stmt_get_result($stmt);

        // Check if a row is fetched
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the password
    


            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                $role = $_SESSION['role'];
                // Set common session variables
                
                if ($role == "user") {
                
                    header("location:index.php");

                } else {
 
                    header("location:dashboard.php");
                }  
            } else {
                echo "Invalid password";
            }
        } 
        // else {
        //     echo "Invalid email";
        // }
    }
}



?>