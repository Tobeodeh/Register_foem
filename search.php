<h1>Accounts</h1>
<form method="get">
  <label for="search">Search:</label>
  <input type="text" name="search" id="search" placeholder="search" value="<?php 
 if (isset($_GET['search'])) {
    $data = trim($_GET['search']);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("+", "", $data);

    echo $data;
    } ?>
    ">
</form>
<br>
<?php
  require './sql_conn.php';

    OpenCon();
    // Check if the search form was submitted
    if (isset($_GET['search'])) {
        // Get the search term from the form input
        $search_term = mysqli_real_escape_string($conn, $_GET['search']);
        echo "live";

        // Build the SQL query
        $query = "SELECT * FROM create_table WHERE First Name LIKE '%{$search_term}%' OR Last Name LIKE '%{$search_term}%' OR Email LIKE '%{$search_term}%' ";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
        // Display the results in an HTML table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "First Name: ". $row["First Name"]. "<br>";
            echo "Last Name: ". $row["Last Name"]. "<br>";
            echo "Email: ". $row["Email"]. "<br>";
            echo "Gender: ". $row["Gender"]. "<br>";
            echo "Language: ". $row["Language"]. "<br>";
            echo "About: ". $row["About"]. "<br>";
            echo "<hr>";
        }
        } else {
        // Display a message if no results were found
        echo '<p>No results found.</p>';
        }

        // Close the database connection
        CloseCon($conn);
    }
?>
</body>
</html>