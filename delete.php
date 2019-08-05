<?php
    include "config.php";
    $sql="delete from users where id=".$_POST["id"];
    $con->query($sql);
?>
