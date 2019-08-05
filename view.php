<?php
    include "config.php";

?>
<table class="table">
    <tr>
        <!-- <th>S.No</th> -->
        <th>Name</th>
        <th>Age </th>
        <th>City</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        $sql="SELECT * from users";
        $res= $con->query($sql);

        if($res -> num_rows>0){
            $i=0;
            while($row=$res->fetch_assoc()){
                $i++;
                echo "<tr>";
                // echo "<td>{$i}</td>";
                echo "<td>{$row["NAME"]}</td>";
                echo "<td>{$row["AGE"]}</td>";
                echo "<td>{$row["CITY"]}</td>";
                echo "<td><button class='btn btn-sm btn-info edit' data-id={$row["ID"]}>edit</button></td>";
                echo "<td><button class='btn btn-sm btn-info del' data-id={$row["ID"]}>delete</button></td>";
                echo "</tr>";
            }
        }
    ?>
</table>