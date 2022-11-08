<?php
include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";

$return = array();

$clientKey = $DB->hexAesDecrypt(trim($_POST['ckey']));
$eventKey = $DB->hexAesDecrypt(trim($_POST['ekey']));

$sql = "select * from mpr_event where br_code = '{$clientKey}' and ev_key = '{$eventKey}' ";
$result = $DB->row($sql);

$return['result'] = $result;

echo json_encode($return);

?>