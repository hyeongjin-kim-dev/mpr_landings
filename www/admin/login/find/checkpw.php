<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = $_POST["id"];
    $sql = "select user_password from mpr_member where user_email = '{$email}' and user_nm = '{$name}' and user_id='{$id}'";
    $result = $DB->row($sql);
  
    if(!$result['user_password']){
        echo "이름 혹은 ID 혹은 이메일을 확인하세요.";
        }
    else {
        $sql_update="update mpr_member set user_password=left(uuid(),8) where user_email = '{$email}' and user_nm = '{$name}' and user_id='{$id}'";
        $password=$DB->query($sql_update);
        $passresult=$DB->row($sql);
        echo "임시 비밀번호는".$passresult['user_password']."입니다.";
    }
?>