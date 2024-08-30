<?php
$host = 'localhost';

$user_name = 'root';
$user_password = '';

$data_base = 'college_web';

$database = new mysqli($host, $user_name, $user_password, $data_base);
if(!$database){
    die("connection is undefined" . mysqli_connect_errno());
}
// else{
//     echo "database connection Successfully";
// }


?>