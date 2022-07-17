read carefully!!!

database configuration(FileName: config.php)

//copy this configuration command 
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u692894633_alumni');//base it to your domain DB username
define('DB_PASSWORD', 'cgvjMTs81*aK');//base it to your domain DB password
define('DB_NAME', 'u692894633_alumni');//import u692894633_alumni.sql to the domain database


/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($link === false){  
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
// end of configuration command

initial admin access account

USERNAME: 22000008
PASSWORD: admin123

this domain accessible until 2022-11-05

to upload this web appliaction to your domain copy this file to your public_html file 

create sub domain named logbook 
