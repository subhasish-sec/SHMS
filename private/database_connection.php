<?php
    include('config.php');

    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    // Check connection
    if (mysqli_connect_errno())
    {
        die("Failed to connect to MySQL: " . mysqli_connect_error() );
    }

?>