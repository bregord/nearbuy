<?php
    $servername = "104.236.45.60";
    $username = "admin";
    $password = "password";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    header('Location: success.html');
?>