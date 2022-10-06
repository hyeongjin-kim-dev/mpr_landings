<?php
    if($_SESSION['userId'])
    {
        echo "<script>location.replace('/admin/');</script>";
        exit;
        echo "<script>console.log('123".$_SESSION['userId']."');</script>";
    }
    else
    {
        echo "<script>location.replace('/admin/login/');</script>";
        exit;
        echo "<script>console.log('457".$_SESSION['userId']."');</script>";
    }
?>