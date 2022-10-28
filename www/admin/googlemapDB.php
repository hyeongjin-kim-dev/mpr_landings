<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    $name=$_POST['name'];
    $sql="SELECT br_addr FROM mpr_branch where br_name='$name';";
    $result= $DB->query($sql);

    echo json_encode($result);

    $arr = ["a","b","c","d"];
    print_r($arr) ;
    if(in_array("a",$arr))
    {
        echo "성공";
    }
?>