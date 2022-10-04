<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    session_start();

    $id=$_POST['id'];
    $pwd=$_POST['password'];
    $tmp = 0;
    $sql="select user_id, user_password, user_lv,del_yn from mpr_member where user_id='{$id}';";
    $result=$DB->row($sql);
    if($result['del_yn']=="N")
    {
        if($result['user_id']==$id)
        {
            if(base64_decode($result['user_password'])==$pwd)
            {
                $tmp=1;
                $_SESSION['userId']=$result['user_id'];
                $_SESSION['lvl']=$result['user_lv'];
            }
        }
    }
    else
    {
        $tmp=-1;
    }
    if($tmp==0)
    {
        echo $tmp;
    }
    else if($tmp==1){
        echo $tmp;
    }
    else
    {
        echo $tmp;
    }
?>