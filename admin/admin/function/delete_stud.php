<?php

require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['studid']))
{
    $id = $_POST['studid'];

    $query = "DELETE FROM student_application WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo  "StudentDeleted";
        // header("Location:create_office.php");
    }
    else
    {
        echo  "NoData";
    }
}else{
    echo  "action fail";
}

?>
