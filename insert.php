<?php
    include "config.php";

    $name=$_POST["name"];
    $age=$_POST["age"];
    $city=$_POST["city"];

    $sql="INSERT INTO users (NAME, AGE, CITY) VALUES ('$name',$age,'$city')";
    $con ->query($sql);
    $id=$con->insert_id;
        echo "<td>{$name}</td>";
        echo "<td>{$age}</td>";
        echo "<td>{$city}</td>";
        echo "<td><button class='btn btn-sm btn-info edit' data-id='{$id}'>edit</button></td>";
        echo "<td><button class='btn btn-sm btn-info del' data-id='{$id}'>delete</button></td>";
   
?>