<?php require "./sql_conn.php";
OpenCon();
$sql = "SELECT * FROM data_table ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0){
    //output data
    while($row = mysqli_fetch_assoc($result)){
        echo "First Name: ". $row["First Name"]. "<br>";
        echo "Last Name: ". $row["Last Name"]. "<br>";
        echo "Email: ". $row["Email"]. "<br>";
        echo "Password: ". $row["password"]. "<br>";
        echo "Phone Number: ". $row["Phone"]. "<br>";
        echo "Gender: ". $row["Gender"]. "<br>";
        echo "Language: ". $row["Language"]. "<br>";
        echo "Zip Code: ". $row["ZipCode"]. "<br>";
        echo "About: ". $row["About"]. "<br>";
    }
}else{
    echo "0 results";
}

 CloseCon($conn);
?>