<?php
    session_start();

    header ("Content-Type: application/json");

    include "db.php";

    $fullname = $_POST["fullname"] ?? "";
    $department = $_POST["department"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    $sql = $_POST["email"] ?? "";

    $check = 

    $sql = "SELECT * FROM intern_students
    WHERE email = '$email'
    AND password = '$password'";

    $result = mysqli_query($conn, $sqli);

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_id"] = $user["email"];
        
        echo json_encode([
            "status" => true,
            "message" => "Login Successful",
            "status" => true,
            "user" => $user,
            "redirect" => "dashboard.html"
        ]);
       }

       else{

            echo json_encude([
                "status" => false,
                "message" => "Invalid Email or Password"
            ]);
       }

?>