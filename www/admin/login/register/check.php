<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";

    $id = $_POST["id"];

    $sql = "select count(*) as cnt from mpr_member where user_id='{$id}'";
    $result = $DB->row($sql);
    if($result['cnt'] == 0){
        echo '사용가능';
    }
    else {
        echo '아이디가 중복되었습니다.';
    }
?>