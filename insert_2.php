

<?php
  $servername = "localhost";
  $username = "username"; // replace with your MySQL username
  $password = "password"; // replace with your MySQL password
  $dbname = "database_name"; // replace with your database name

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Escape user inputs for security
  $iname = mysqli_real_escape_string($conn, $_POST['iname']);
  $iqty = mysqli_real_escape_string($conn, $_POST['iqty']);
  $istatus = mysqli_real_escape_string($conn, $_POST['istatus']);
  $idate = mysqli_real_escape_string($conn, $_POST['idate']);

  // Attempt insert query execution
  $sql = "INSERT INTO grocerydb (item_name, item_quantity, item_status, date) VALUES ('$iname', '$iqty', '$istatus', '$idate')";
  if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
?>
