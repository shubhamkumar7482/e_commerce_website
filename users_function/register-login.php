<?php
session_start();
include('../DB/connection.php');
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $check_users = "SELECT * FROM users WHERE EXISTS (SELECT email,phone FROM users WHERE users.phone = '$phone' AND users.user_status = 1)";
    $check_users_stmt = $conn->prepare($check_users);
    $check_users_stmt->execute();
    $count = $check_users_stmt->rowCount();
    if ($count == 0) {
        $sql = "INSERT INTO users (fullname,phone,email,password) VALUES ('$fullname', '$phone', '$email','$password')";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute();
        if ($res) {
            echo "<script>
            alert('Register Successfully! Please Login.');
            window.location.href='../login';
        </script>";
        } else {
            echo "<script>
            alert('Something Went Wrong !');
            window.location.href='../register';
        </script>";
        }
    } else {
        echo "<script>
            alert('Already Register! Please Login.');
            window.location.href='../login';
        </script>";
    }
    
}
//Login Function 
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    foreach ($row as $rows) {
        $id = $rows['users_id'];
        $name = $rows['fullname'];

    }
    if ($count>0) {
        $_SESSION['users_id'] = $id;
        $_SESSION['fullname'] = $name;
        header('Location:../');
    } else {
        echo "<script>
        alert('Invalid Users!');
        window.location.href='../login';
    </script>";
    }
}
//Login Function 
if (isset($_POST['forget'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $newpassword = md5($_POST['newpassword']);
    $confirmpassword = md5($_POST['confirmpassword']);
    if (($newpassword == $confirmpassword) && ($_SESSION['otp'] == $otp)) {
        $sql = "UPDATE users
        SET password = '$newpassword'
        WHERE email = '$email'";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            echo "<script>
                alert('Password Change Successfull!');
                window.location.href='../login';
            </script>";
            
        } else {
            echo "<script>
            alert('Invalid Email ID.!');
            window.location.href='../login';
            </script>";
        }
        
        
    } else {
        echo "<script>
            alert('Confirm Password Do Not Match!');
            window.location.href='../forget';
            </script>";
    }
    
}
//Cahnge Passsword 
if (isset($_POST['change-password'])) {
    $email = $_POST['email'];
    $newpassword = md5($_POST['new-password']);
    $confirmpassword = md5($_POST['confirm-password']);
    $currentpassword = md5($_POST['current-password']);
    if ($newpassword == $confirmpassword) {
        $sql = "UPDATE users
        SET password = '$newpassword'
        WHERE email = '$email' AND password = '$currentpassword'";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            echo "<script>
                alert('Password Change Successfull!');
                window.location.href='../my-account';
            </script>";
            
        } else {
            echo "<script>
            alert('Invalid Email ID.!');
            window.location.href='../my-account';
            </script>";
        }
        
    } else {
        echo "<script>
            alert('Confirm Password Do Not Match!');
            window.location.href='../my-account';
            </script>";
    }
    
}
?>

