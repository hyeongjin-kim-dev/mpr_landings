<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
    $sql="select br_name,br_code from mpr_branch where del_yn='N'";
    $result=$DB->query($sql);
  //   $result_arr=array();
  //   for($i=0;$i<count($result);$i++)
  //   {
  //     array_push($result_arr,[$result[$i]['br_name'],$result[$i]['br_code']]);
  //   }
  //   $result_tmp = array_unique($result_arr);
  //   $result=array_values($result_tmp);
  //   // echo "<script>console.log('길이는".count($result_tmp)."');</script>";
  //   // for($j=0;$j<count($result_tmp);$j++)
  //   // {
      // echo "<script>console.log('".$result[$j]."');</script>";
  //   // }
  //  print_r($result_r);
  echo "<script>console.log('123".$_SESSION['code']."');</script>";
?>
<?php if($_SESSION['lvl']==300) {?>
<div class="content-wrapper">
  <section class="content">
          <div class="container-fluid">
              <h2 class="text-center display-4">HOME</h2>
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <form>
                          <div class="input-group">
                              <input type="search" list="branch_name" class="form-control form-control-lg" id="searchinput" placeholder="업체를 입력해주세요">
                              <datalist id="branch_name">
                                <?php for($i=0; $i<count($result); $i++)
                                {?>
                                  <option id="branch" data-value=<?php echo $result[$i]['br_code']; ?> value=<?php echo $result[$i]['br_name']; ?>></option>
                          <?php } ?>
                                
                              </datalist>
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-lg btn-default" id="btn1" onclick="gogo()">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-12"  id="divtest"> -->
            <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title" id="text_w">
                  <i class="far fa-chart-bar"></i>
                  주간 누적 데이터
                </h3>
              </div>
              <div class="card-body">
                <div class="chart">
                    <div  data-id="chart" data-type="curve" id="curve_chart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></div>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6" id="divtest">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        일간 상위 3개 데이터("<span id="span_date">2022-10-18</span>" 기준)
                        <input type="date" id= "date">
                            <button class="btn btn-navbar date_search" type="button" onclick="chgdate()">
                              <i class="fas fa-search"></i>
                            </button>
                      </h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="columnchart" data-id="chart" data-type="column" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>

            <!-- Donut chart -->
          <div class="col-md-6" id="disap">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  이벤트 별 성별 비율 데이터 및 연령대 데이터("<span id='add_date'></span>")
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                    <td><div id="piechart_div" data-id="chart" data-type="pie" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                    <td><div id="barchart_div" data-id="chart" data-type="rev_bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>     
</div>
<?php } else if($_SESSION['lvl']==200) {?>
  <div class="content-wrapper">
  <section class="content">
          <div class="container-fluid">
              <h2 class="text-center display-4">HOME</h2>
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <form>
                          <div class="input-group">
                              <input type="search" list="branch_name" class="form-control form-control-lg" id="searchinput" placeholder="업체를 입력해주세요">
                              <datalist id="branch_name">
                                <?php for($i=0; $i<count($result); $i++)
                                {?>
                                  <option id="branch" data-value=<?php echo $result[$i]['br_code']; ?> value=<?php echo $result[$i]['br_name']; ?>></option>
                          <?php } ?>
                                
                              </datalist>
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-lg btn-default" id="btn1" onclick="gogo()">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-12"  id="divtest"> -->
            <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  주간 누적 이벤트 데이터123
                </h3>
              </div>
              <div class="card-body">
                <div class="chart">
                    <div data-id="chart" data-type="curve" id="curve_chart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></div>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6" id="divtest">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        일간 상위 3개 데이터("<span id="span_date">2022-10-18</span>" 기준)
                        <input type="date" id= "date">
                            <button class="btn btn-navbar date_search" type="button" onclick="chgdate()">
                              <i class="fas fa-search"></i>
                            </button>
                      </h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="columnchart" data-id="chart" data-type="column" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </div>

            <!-- Donut chart -->
          <div class="col-md-6" id="disap">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  이벤트 별 성별 비율 데이터 및 연령대 데이터("<span id='add_date'></span>")
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                    <td><div id="piechart_div" data-id="chart" data-type="pie" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                    <td><div id="barchart_div" data-id="chart" data-type="rev_bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>     
</div>
<?php }?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="/js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>

<script>
var code=$('#searchinput').val().trim();
code=$('#branch_name [value="'+code+'"]').data('value');
console.log("<?php echo $_SESSION['code'];?> ");

function chgdate()
{
  var day = document.getElementById('date').value;
  $("#span_date").text(day);
  $.ajax({
          url:"/admin/graph.php",
          type :"post",
          data:{g_type:'column',
                date: day},
          dataType :'json',
          success: function(data)
          {
            // if(data.length<5)
            // {
            //   $("#divtest").attr('class','col-6')
            // }
            // else
            // {
            //   $("#divtest").attr('class','col-12')
            // }
            var tmp=[]
            var tmp_data=[]
            // console.log(data);
            for(var i=0; i<data.length; i++)
            {
              tmp.push([data[i]['ev_subject'],data[i]['cnt']]);
            }
            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart(){
               var data_C = new google.visualization.DataTable();
               data_C.addColumn('string',"이벤트명");
               data_C.addColumn('number','이벤트 수');
               data_C.addRows(tmp);
               var options = {
               bar: {groupWidth: "50"},
               legend: { position: "none" },
               };
               var columnchart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
               columnchart.draw(data_C, options);
              //  var a = document.querySelectorAll("table div[data-id='chart']");
               var selectHandler=function(type){
                  $("#add_date").text(day);
                  var selectitem= columnchart.getSelection()[0];
                  var value=data_C.getValue(selectitem.row,0);
                  var key=""
                  var name=""
                  for(var i=0; i<data.length;i++)
                  {
                    if(data[i]['ev_subject']==value)
                    {
                      key=data[i]['br_key'];
                      name=data[i]['ev_subject']
                    }
                  }
                  // console.log(key);
                  $.ajax({
                      url:"/admin/graph.php",
                      type :"post",
                      data:{key:key,
                            date:day,
                            g_type:"rev_bar"
                      },
                      dataType :'json',
                      success: function(data)
                      {
                          var tmp=[]
                          for(var i=0; i<data.length; i++)
                          {
                            tmp.push([data[i]['age_range'],data[i]['cnt']]);
                          }
                          // console.log(tmp);
                          google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawChart);
                          function drawChart() {
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Age_range');
                            data.addColumn('number', '개수');
                            data.addRows(tmp);

                            var barchart_options = {title:'이벤트:'+name,
                              width:380,
                              height:270,
                              legend: 'none'};
                            var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
                            barchart.draw(data, barchart_options);
                            }
                        // console.log(data);
                      },
                  });
                  $.ajax({
                      url:"/admin/graph.php",
                      type :"post",
                      data:{key:key,
                            date:day,
                            g_type:"pie"
                      },
                      dataType :'json',
                      success: function(data)
                      {
                        var tmp=[]
                        // var tmp_data=[]
                        for(var i=0; i<data.length; i++)
                        {
                          tmp.push([data[i]['ev_sex'],data[i]['cnt']]);
                        }
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'ev_sex');
                          data.addColumn('number', '개수');
                          data.addRows(tmp);

                          var piechart_options = {title:'이벤트:'+name,
                            width:380,
                            height:270};
                          var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
                          piechart.draw(data, piechart_options);
                          }
                        // console.log(data);
                      },
                  });
               }
               google.visualization.events.addListener(columnchart, 'select', selectHandler);
                                 
            }
          }
  });
}



function gogo()
{
  var code=$('#searchinput').val().trim();
  code=$('#branch_name [value="'+code+'"]').data('value');
  $("#curve_chart").attr("id","time");
  $("#text_w").text("스케줄");
  $.ajax({
      url:"/admin/graph.php",
      type :"post",
      data:{code:code
      },
      dataType :'json',
      success: function(data)
        {
          // console.log(data);
           var tmp = [];
          for(var i=0; i<data.length;i++)
          {
            tmp.push([data[i]['br_name'],data[i]['ev_subject'],new Date(data[i]['ev_start']),new Date(data[i]['ev_end'])]);
          }
          // console.log(data);
          google.charts.load("current", {packages:["timeline"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var container = document.getElementById('time');
            var chart = new google.visualization.Timeline(container);
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'string', id: 'branch' });
            dataTable.addColumn({ type: 'string', id: 'event' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });
            dataTable.addRows(tmp);

            var options = {
              colors: ['#cbb69d', '#603913', '#c69c6e'],
            };
            chart.draw(dataTable, options);
            var selectHandler=function(type){
                  var selectitem= chart.getSelection()[0];
                  var value=dataTable.getValue(selectitem.row,1);
                  var key=""
                  var name=""
                  for(var i=0; i<data.length;i++)
                  {
                    if(data[i]['ev_subject']==value)
                    {
                      key=data[i]['br_key'];
                      name=data[i]['ev_subject']
                    }
                  }
                  console.log(key);
                  console.log(name);
            }

            google.visualization.events.addListener(chart, 'select', selectHandler);
          }
                
        },
  });
}

var test= document.querySelectorAll('div[data-id="chart"]');
for(var j=0; j<test.length;j++)
{
  window.onload=call(test[j].dataset.type);
}
function call(type){
      // $("#disap").hide();
      // $("#divtest").attr('class','col-12')
      var date = new Date();
      var year = date.getFullYear();
      var month = ("0" + (1 + date.getMonth())).slice(-2);
      var day = ("0" + date.getDate()).slice(-2);
      var now = year + month + day;
      document.getElementById('date').valueAsDate=new Date();
      $("#span_date").text(document.getElementById('date').value);
      $("#add_date").text(document.getElementById('date').value);
      var asd= document.getElementById('date').value;
      $.ajax({
              url:"/admin/graph.php",
              type :"post",
              async: false,
              data:{time:now,
                    g_type: type,
                    date:asd,
                  },
              dataType :'json',
                success: function(data){
                    if(type=="curve")
                    {
                      var tmp = []
                      var tmp_data = []
                      for(var i=0; i<data.length;i++)
                      {
                        tmp_data.push(data[i]['cnt']);
                      }
                      const result = tmp_data.reduce(function add(sum, currValue) {
                        return sum + currValue;
                      }, 0);
                      const avg=result/tmp_data.length;
                      for(var i=0; i<data.length;i++)
                      {
                        tmp.push([data[i]['dates'],data[i]['cnt'],avg]);
                      }
                      // console.log(tmp[0]);
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string','날짜');
                        data.addColumn('number','갯수');
                        data.addColumn('number','평균')
                        data.addRows(tmp);
                        var options = {
                          // curveType: 'function',
                          legend: { position: 'bottom' }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                      }
                    }
                    if(type=="pie")
                    {
                      var tmp=[]
                      // var tmp_data=[]
                      for(var i=0; i<data.length; i++)
                      {
                        tmp.push([data[i]['ev_sex'],data[i]['cnt']]);
                      }
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['sex','cnt'],tmp[0],tmp[1],tmp[2]
                        ]);

                        var piechart_options = {title:'이벤트: TwTwiN(임시 고정값)',
                          width:380,
                          height:270};
                        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
                        piechart.draw(data, piechart_options);
                        }
                    }
                    if(type=="rev_bar")
                    {
                      var tmp=[]
                      for(var i=0; i<data.length; i++)
                      {
                        tmp.push([data[i]['age_range'],data[i]['cnt']]);
                      }
                      // console.log(tmp);
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Age_range');
                        data.addColumn('number', '개수');
                        data.addRows(tmp);

                        var options = {
                          title: '이벤트 TwTwiN'
                        };

                        var barchart_options = {title:'이벤트: TwTwiN(임시 고정값)',
                          width:380,
                          height:270,
                          legend: 'none'};
                        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
                        barchart.draw(data, barchart_options);
                        }
                    }
                    if(type=="column")
                    {
                      // if(data.length<5)
                      // {
                      //   $("#divtest").attr('class','col-6')
                      // }
                      // else
                      // {
                      //   $("#divtest").attr('class','col-12')
                      // }
                      var tmp=[]
                      var tmp_data=[]
                      for(var i=0; i<data.length; i++)
                      {
                        tmp.push([data[i]['ev_subject'],data[i]['cnt']]);
                      }
                      google.charts.load("visualization", "1.1", {packages:['corechart']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart(){
                        var data_C = new google.visualization.DataTable();
                        data_C.addColumn('string',"이벤트명");
                        data_C.addColumn('number','이벤트 수');
                        data_C.addRows(tmp);

                        var options = {
                        bar: {groupWidth: "50"},
                        legend: { position: "none" },
                        };
                        var columnchart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
                        columnchart.draw(data_C, options);

                        // var selectHandler=function(){
                        //   // $("#divtest").attr('class','col-6');
                        //   // $("#disap").show();
                        // var selectitem= columnchart.getSelection()[0];
                        // var value=data_C.getValue(selectitem.row,0);
                        // var key=""
                        // for(var i=0; i<data.length;i++)
                        // {
                        //   if(data[i]['ev_subject']==value)
                        //   {
                        //     key=data[i]['br_key'];
                            
                        //   }
                        //   else
                        //   {
                        //     console.log("실패");
                        //   }
                        // }
                        // console.log(selectitem);
  
                        // }
                        // google.visualization.events.addListener(columnchart, 'select', selectHandler);           
                      }
                    }
                }
            });
      }
</script>
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>