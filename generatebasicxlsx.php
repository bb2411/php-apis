<?php
    include "db.php";
    $sql="select * from users";
    $result=$con->query($sql);
    $html= "
    <table>
    <tr>
        <td>NAME</td>
        <td>EMAIL</td>
        <td>PASSWORD</td>
    </tr>
    ";
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $html.= "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['pass']."</td></tr>";
        }
        $html.= "</table>";
    }
    header("Content-Type:application/xlsx");
    header("Content-Disposition:attachment; filename=data.xlsx");
    echo $html;
?>