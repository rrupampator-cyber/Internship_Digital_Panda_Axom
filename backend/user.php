<?php
    header("content- Type: application/json");

    include "db.php";
    $sql = "SELECT * FROM users";
    $result = mysqli-query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
    
?>