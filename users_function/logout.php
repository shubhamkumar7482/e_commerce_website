<?php
session_start();
if(time() - $_SESSION['timestamp']>1440*60)
{
    session_destroy();
    unset($_SESSION['fullname']);
    header('location: ../');
    exit;
}
else
{
    $_SESSION['timestamp'] = time();
}
?>