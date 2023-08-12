<?php
// connection
require './includes/database.php';
// variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
// validate our inputs
$ok = true;
require './includes/header.php';
if(empty($first_name)){
    echo '<p>First name is required</p>';
    $ok = false;
}
if(empty($last_name)){
    echo '<p>Last name is required</p>';
    $ok = false;
}
if(empty($username)){
    echo '<p>Username is required</p>';
    $ok = false;
}
if((empty($password)) || ($password != $confirm)){
    echo '<p>Invalid Password</p>';
    $ok = false;
}
// decide to save or not
if($ok){
    $password = hash('sha512', $password);
    // set up sql
    $sql = "INSERT INTO phpadmins (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password');";
    $conn->exec($sql);
    echo '<section class="success-row">';
    echo '<div>';
    echo '<h3>Admin Saved</h3>';
    echo '</div>';
    echo '</section>';
    $conn = null;
}
?>
<section class="row success-back-row">
    <div>
        <p>successfully created an account, click the button below to head to the sign in page!</p>
        <a href="signin.php" class="btn btn-primary">Sign In</a>
    </div>
</section>

