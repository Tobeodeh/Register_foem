
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <link rel = "stylesheet" href = "./style.css">
    </head>
    <body>
        <div class = "form-properties">
            <div class="img-container">
                    <div class ="form-header" ><img src="./passport.jpg" class = "img-style"></div>
                    <h1>REGISTRATION FORM</h1>
            </div>
            <form id = "form"  name= "myForm" action="./validate.php" method="POST">
                <div class='form-style'>
                    <label for ="name">First-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="firstName" id = "firstName">
                        <small class="errorMessage"></small>
                    </div>
                </div>
                <div class='form-style'>
                    <label for ="name">Last-Name</label>
                    <div>
                        <input class = "input-style input-wrapper" type = "text" name="lastName" id = "lastName">
                        <small class="errorMessage"></small>
                    </div>
                </div>       
                
                <div class='form-style'>
                    <label for ="email">Email</label>
                    <input class = "input-style input-wrapper" type = "email" name="email" id = "email">
                    <small > Error message</small>
                </div>
               
                <div class='form-style'>
                    <label for = "password">Password</label>
                    <input class = "input-style input-wrapper" type = "password" name="password" id = "password">
                    <small class="errorMessage"></small>
                </div>

                <div class='form-style'>
                    <label for = "PhoneNumber">Phone Number: </label>
                    <input class = "input-style input-wrapper" type = "tel" name="PhoneNumber" id = "PhoneNumber">
                    <small class="errorMessage"></small>
                </div> 

                <div class='form-style'>
                    <label class="name">Gender: </label>
                    <div class="radio_cont input-wrapper">
                    <label for = "male">Male</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "male" value="Male">
                    <label for = "female">Female</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "female" value="Female">
                    <label for = "other">Other</label>
                    <input class = "input-style" type = "radio" name="Gender" id = "other" value="Other">
                    </div>
                   
                    <small class="errorMessage"></small>
                
                </div> 
                
                <div class='form-style'>
                    <label for = "language">Language: </label>
                    <select class = "select-style input-wrapper" name="language" id = "language">
                        <option value=""selected disabled hidden> Select Language </option>
                        <?php require "./sql_conn.php";
                            $conn = OpenCon();
                            $sql = "SELECT * FROM languages";
                            $result = $conn ->query($sql);
                            //create options
                            while($row = $result->fetch_assoc()){
                                echo"<option value='".$row["name"]."'>".$row["name"]. "</option>";
                            }
                            CloseCon($conn);
                        ?>
                    </select>
                    <div>
                            <!-- connect to database -->
                        
                    </div>
                    <small class="errorMessage"></small>
                </div> 

                <div class='form-style'>
                    <label for ="ZipCode" >Zip Code: </label>
                    <input class = "input-style input-wrapper" type = "text" name="ZipCode" id = "zipCode">
                    <small > Error message</small>
                </div> 

                <div class='form-style'>
                    <label for = "about"  >About: </label>
                    <textarea class = "text-style" name="about" id = "about" rows="2" cols="10">Write about yourself...</textarea>
                    <small class="errorMessage"></small>
                </div> 

                <div class="button-style">

                    <input type = "submit" value="Register" class="submit-btn" id = "btn_submit" name = "btn_submit">
                    <!-- <button type="submit">Register</button> -->
                </div> 
                
            </form>
            <!-- <script type="text/javascript" src="./validate.js"> </script> -->
        </div>    
    </body>
</html>