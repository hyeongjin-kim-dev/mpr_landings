<?php
    function getRandStr($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    session_start();

    $id=$_POST['id'];
    $pwd=$DB->hexAesEncrypt($_POST['password'],getRandStr());
    $tmp = 0;
    $sql="select user_id, user_password, user_lv,del_yn,apprve from mpr_member where user_id='{$id}';";
    $result=$DB->row($sql);
    if($result['del_yn']=="N")
    {
        if($result['user_id']==$id && $result['user_password']==$pwd )
        {
            if($result['apprve']=="Y")
            {
                $tmp=1;
                $_SESSION['userId']=$result['user_id'];
                $_SESSION['lvl']=$result['user_lv'];
                
            }
            else
            {
                $tmp=-1;
            }
            // if($result['user_password']==$pwd)
            // {
            //     if($result['apprve']=="N")
            //     {   
            //         $tmp=-1;
            //         // echo "승인되지 않은 아이디 입니다.";
            //     }
            //     else
            //     {
            //         $tmp=1;
            //         $_SESSION['userId']=$result['user_id'];
            //         $_SESSION['lvl']=$result['user_lv'];
            //         // echo "<script>location.href='/admin/'</script>";
            //     }
            // }
            // $tmp=0;
            
        }
        else
        {
            $tmp=0;
        }
    }
    else
    {
        $tmp=2;
    }
    echo $tmp;
    // if($tmp==0)
    // {
    //     echo $tmp;
    // }
    // else if($tmp==1){
    //     echo $tmp;
    // }
    // else
    // {
    //     echo $tmp;
    // }
    // $a= "C3BFE1869D2152B0B8DEAE45FBFC0865";
    // $test=$DB->hexAesDecrypt($a);
    // echo $test;
?>