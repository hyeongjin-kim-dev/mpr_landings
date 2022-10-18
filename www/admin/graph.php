<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    $time = $_POST['time'];
    $date = $_POST['date'];
    if($time)
    {
      $sql_column="select a.*,ifnull(b.cnt,0)as cnt from
      (select @curDate := date_sub(@curDate, interval 1 day) as dates from mpr_event_db inner join (select @curDate := $time) A where @curDate > date_add($time, interval -1 week)) a 
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
    if($date)
    {
      $sql="select br_code, DATE_FORMAT(regdate,'%Y-%m-%d')as dates,count(br_code)as cnt FROM `mpr_event_db` where  DATE_FORMAT(regdate,'%Y-%m-%d')=$date group by br_code order by cnt desc";
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