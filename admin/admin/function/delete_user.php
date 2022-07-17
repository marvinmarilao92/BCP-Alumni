<?php
include "../session.php";
require_once("../include/conn.php");
$db = mysqli_select_db($conn, 'sis_db');

if(isset($_POST['userid']) && isset($_POST['userno'])&& isset($_POST['userfname']))
{
    date_default_timezone_set("asia/manila");
    $date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
    $id = $_POST['userid'];
    $no = $_POST['userno'];
    $fname = $_POST['userfname'];

    $query = "DELETE FROM user_information WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $query1 = "DELETE FROM users WHERE id_number='$no'";
        if($query_run1 = mysqli_query($conn, $query1)){
          if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                $ip = $_SERVER["HTTP_CLIENT_IP"];
              }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
              }else{
                $ip = $_SERVER["REMOTE_ADDR"];
                $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $remarks="user account has been deleted";  
                mysqli_query($conn,"INSERT INTO audit_trail(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$verified_session_id','$verified_session_username','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($conn));
                
              }
        echo  "UserDeleted";
        }else{
          echo  "Error 45";
        }

        // header("Location:create_office.php");
    }else{
        echo  "NoData";
    }
    }else{
        echo  "action fail";
    }

?>
