<?php
session_start();

header("Content-Type: application/json");

include "db.php";

$name = $_POST["name"] ?? "";
$password = $_POST["password"] ?? "";
$role = $_POST["role"] ?? "";


$sql = "SELECT * FROM intern_students
        WHERE name = '$name'
        AND password = '$password'
        AND role = '$role'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "status" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_name"] = $user["name"];
    $_SESSION["user_role"] = $user["role"];


    echo json_encode([
        "status" => true,
        "message" => "Login Successful",
        "user" => $user,
        "redirect" => "dashboard.html"
    ]);

} else {

    echo json_encode([
        "status" => false,
        "message" => "Invalid Email or Password"
    ]);
}
?>