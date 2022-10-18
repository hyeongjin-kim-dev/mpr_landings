<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    $time = $_POST['time'];
    $date = $_POST['date'];
    $type = $_POST['g_type'];
    if($type=="line")
    {
      $sql_column="select a.*,ifnull(b.cnt,0)as cnt from
      (select @curDate := date_sub(@curDate, interval 1 day) as dates from mpr_event_db inner join (select @curDate := $time) A where @curDate > date_add($time, interval -1 week)ORDER by dates asc) a 
          left join (select *, DATE_FORMAT(regdate,'%Y-%m-%d')as now,count(regdate)as cnt from mpr_event_db b GROUP by now)b
            on a.dates = b.now";
                          
      $column=$DB->query($sql_column);
      // print_r($column);
      // echo "<script>console.log('컬럼명:".$column[0]['year']."');</script>";
      // echo "<script>console.log('컬럼명:".$column[0]['br_code']."');</script>";
      // echo "<script>console.log('길이:".count($column)."');</script>";
      // $label_1 = array();
      // $label_2 = array();
      // $data_1 = array();
      echo json_encode($column);
    }
    if($type=="bar")
    {
      $sql="select br_code, DATE_FORMAT(regdate,'%Y-%m-%d')as dates,count(br_code)as cnt FROM `mpr_event_db` where  DATE_FORMAT(regdate,'%Y-%m-%d')='$date' group by br_code order by cnt desc";
      $result=$DB->query($sql);
      echo json_encode($result);
    }

    if($type=="pie")
    {
      $sql="select if(ev_sex='','기타',if(ev_sex='F','여자','남자'))as ev_sex, count(ev_sex) as cnt from mpr_event_db where br_code ='TwTwiN' group by ev_sex";
      $result=$DB->query($sql);
      echo json_encode($result);
    }

    if($type=="rev_bar")
    {
      $sql="select
      (
          CASE
              when ev_age BETWEEN 10 and 19 then '10대'
              when ev_age BETWEEN 20 and 29 then '20대'
              when ev_age BETWEEN 30 and 39 then '30대'
              when ev_age BETWEEN 40 and 49 then '40대'
              when ev_age BETWEEN 50 and 59 then '50대'
              when ev_age BETWEEN 60 and 69 then '60대'
              when ev_age BETWEEN 70 and 79 then '70대'
              when ev_age BETWEEN 80 and 89 then '80대'
              when ev_age BETWEEN 90 and 99 then '90대'
              else '범위밖'
          END) as age_range, count(ev_age) as cnt
      from mpr_event_db where br_code='TwTwiN' group by age_range";
      $result=$DB->query($sql);
      echo json_encode($result);
    }
    // 2022-10-13  lfsd2 1
    // 2022-10-14  lfsd2 2
    // 2022-10-15  2dc22 1
    // 2022-10-16  2dc22 2
    // 2022-10-17  2dc22 3
    // 2022-10-18  lfsd2 1
    // 2022-10-19  lfsd2 1 

    
    // 2022-10-13  lfsd2 1       
    // 2022-10-14  lfsd2 2
    // 2022-10-15  lfsd2 0 
    // 2022-10-16  lfsd2 0
    // 2022-10-17  lfsd2 0
    // 2022-10-18  lfsd2 1
    // 2022-10-19  lfsd2 1

    // 2022-10-13  2dc22 0
    // 2022-10-14  2dc22 0
    // 2022-10-15  2dc22 1
    // 2022-10-16  2dc22 2
    // 2022-10-17  2dc22 3
    // 2022-10-18  2dc22 0
    // 2022-10-19  2dc22 0
?>