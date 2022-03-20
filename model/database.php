<?php
$dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=u9w19g3yjxz55x1z';
$username = 'bzrzfxgclgs3szbq';
$p = 'poiq15av52j46npe';

try {
    $db =new PDO($dsn, $username, $p);


} catch (PDOException $e) {
    $error_message = 'Database Error: ';
    $error_message .= $e->getMessage();
    echo $error_message;
    exit();
} ?>