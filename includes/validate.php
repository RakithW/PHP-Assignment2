<?php
//store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

//connect to db
require 'database.php';

//set up and run the query
$sql = "SELECT user_id FROM phpadmins WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

//store the number of results in a variable
$count = $result -> rowCount();

//check if any matches found
if($count == 1){
    echo '<p>Logged in successfully</p>';
    foreach ($result as $row){
        // access the existing session created automatically by the server
        session_start();
        // take the users id from the database and store it in a session variable
        $_SESSION['user_id'] = $row['user_id'];
        // redirect to the restricted pages
        Header('Location: ../display-person.php');
    }
}else{
    echo '<p>Login Failed</p>';
}
$conn = null;
?>
