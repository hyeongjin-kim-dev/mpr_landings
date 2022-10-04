<?php
    session_start();
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    
    $pw = base64_encode($_POST["pw"]);
    $sql="select user_password from mpr_member where user_id = '{$_SESSION['userId']}'";
    $result = $DB->row($sql);
    echo base64_decode($result['user_password']);

?>