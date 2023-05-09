<?php require "./sql_conn.php";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $errors = array();
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"]=="POST") { // validate first name 
        if(empty($_POST['firstName'])) { $errors['firstName'] = "First name is required."; }
        else { $firstName = test_input($_POST['firstName']); 
            // check if name only contains letters and whitespace 
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) { $errors['firstName'] = "Only letters and white space allowed"; } } 
        // validate last name 
        if(empty($_POST['lastName'])) { $errors['lastName'] = "Last name is required."; } 
        else { $lastName = test_input($_POST['lastName']); 
            // check if name only contains letters and whitespace 
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) { $errors['lastName'] = "Only letters and white space allowed"; } } 
            // validate email 
        if(empty($_POST['email'])) { $errors['email'] = "Email is required."; } 
        else { $email = test_input($_POST['email']); 
                // check if email is valid i
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors['email'] = "Invalid email format"; } } 
                // validate password 
        if(empty($_POST['password'])) { $errors['password'] = "Password is required."; } 
        else { $passwords = test_input($_POST['password']); 
                    // check if password meets requirements 
            if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$passwords)) { $errors['password'] = "Password must contain at least 8 characters, one letter and one number"; } } 
                    
                    // validate phone number 
        if(empty($_POST['PhoneNumber'])) { $errors['PhoneNumber'] = "Phone number is required."; } 
        else { $PhoneNumber = test_input($_POST['PhoneNumber']); 
        // check if phone number is valid 
            if (!preg_match("/^\d{11}$/",$PhoneNumber)) { $errors['PhoneNumber'] = "Invalid phone number format"; } } 
        
        // validate gender 
        if(empty($_POST['Gender'])) { $errors['Gender'] = "Gender is required."; } 
        else { $Gender = test_input($_POST['Gender']); } 
        
        // validate language 
        if(empty($_POST['language'])) { $errors['language'] = "Language is required."; } 
        else { $language = test_input($_POST['language']); } 
        
        // validate zip code 
        if(empty($_POST['ZipCode'])) { $errors['ZipCode'] = "Zip code is required."; } 
        else { $ZipCode = test_input($_POST['ZipCode']); 
            // check if zip code is valid 
            if (!preg_match("/^\d{5}$/",$ZipCode)) { $errors['ZipCode'] = "Invalid zip code format"; } }
            
        // validate about 
        if(empty($_POST['about'])) { $errors['about'] = "About is required."; }
        else { $about = test_input($_POST["about"]);
            // Check if about is too long
                if (strlen($about) > 250) {
                $aboutErr = "About is too long";}
        } 
                            // Validate about

        $conn = OpenCon();
    // If there are no errors, proceed to save to database
        if (empty($errors)) {
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $passwords = mysqli_real_escape_string($conn, $_POST['password']);
            $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
            $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
            $language = mysqli_real_escape_string($conn, $_POST['language']);
            $ZipCode = mysqli_real_escape_string($conn, $_POST['ZipCode']);
            $about = mysqli_real_escape_string($conn, $_POST['about']);
            // Save data to database
            
            $sql = "INSERT INTO data_table (First Name , Last Name , Email , password, Phone, Gender, language, ZipCode,  	About ) VALUES ('$firstName', '$lastName', '$email', '$passwords','$PhoneNumber' , '$Gender', '$language', '$ZipCode', '$about')";
            if (mysqli_query($conn, $sql)){
                // echo '<script>
                //         let notification = document.createElement("div");
                //         notification.textContent = "Data saved successfully";
                //         notification.classList.add("notification");
                //         document.body.appendChild(notification);

                //         setTimeout(function() {
                //             notification.style.display = "none";
                //         }, 5000);</script>';
                header("location: success.php");
                
                

            }else {
                echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            }

            CloseCon($conn);
            exit();
        }else{
            include("index1.php");
        }
    }
?>