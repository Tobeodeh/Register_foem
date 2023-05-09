<?php 
function OpenCon(){
    $server = "localhost";
    $user = 'root';
    $password = '';
    $db_name = 'Form_db';
    $conn = new mysqli($server, $user, $password, $db_name) or die("Connection Failed: %s/n".$conn -> error);
    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}
    


    // echo phpinfo();


?>