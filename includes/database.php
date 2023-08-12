<?php
// add lesson code
try{
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Rakith200505619', 'Rakith200505619', '6ytcd1fPFf');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e-getMessage();
}
?>
