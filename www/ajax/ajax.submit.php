<?php
include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";

$return = array();

$clientKey = $DB->hexAesDecrypt(trim($_POST['br_code']));
$eventKey = $DB->hexAesDecrypt(trim($_POST['br_key']));

$name = trim($_POST['ev_name']);
$tel = trim($_POST['ev_tel']);
$sex = trim($_POST['ev_sex']);
$age = intval($_POST['ev_age']);
$birth = intval($_POST['ev_birthday']);
$recp = trim($_POST['ev_rec_person']);
$cstime = trim($_POST['ev_counsel_time']);
$comm = trim($_POST['ev_comment']);

$sql = " insert into mpr_event_db
        set
            br_code = '{$clientKey}',
            br_key = '{$eventKey}',
            ev_name = '{$name}',
            ev_tel = '{$tel}',
            ev_sex = '{$sex}',
            ev_age = {$age},
            ev_birthday = {$birth},
            ev_rec_person = '{$recp}',
            ev_counsel_time = '{$cstime}',
            ev_comment = '{$comm}';
        ";

        // print_r($sql);
        // exit;

$result = $DB->query($sql);

if($result){
    $return = 'OK';
}
else {
    $return = 'NO';
}


echo json_encode($return);

?>