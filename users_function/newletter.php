<?php
session_start();
require('../DB/connection.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "INSERT INTO subcribers (email) VALUES ('$email')";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute();
    if ($res) {
        echo "<script>
            alert('Thank You for Your Interest!.');
            window.location.href='../';
        </script>";
    } else {
        echo "<script>
            alert('Something Went Wrong!.');
            window.location.href='../';
        </script>";
    }

}
 
?>