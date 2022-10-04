<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    $id = $_POST["id"];
    $pw = base64_encode($_POST["chgpwd"]);
    $nick = $_POST["nick"];
    $email = $_POST["email"];
    $phone = $_POST["phonenum"];
    $etcNum = $_POST["etcnum"];
    $level = $_POST['level'];
    $apprve= $_POST['apprve'];
    $sql="update mpr_member set user_password=password('{$pw}'), user_nick='{$nick}', user_email='{$email}', user_mobile='{$phone}', user_phone='{$etcNum}', user_lv='{$level}', apprve='{$apprve}' where user_id= '{$id}'";
    $result = $DB->query($sql);
?>