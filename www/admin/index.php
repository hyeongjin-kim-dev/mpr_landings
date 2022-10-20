<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>홈 화면</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  일간 상위 데이터("2022-10-12" 기준)
                </h3>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  주간 누적 이벤트 데이터
                </h3>
              </div>
              <div class="card-body">
                <div class="chart">
                    <div id="curve_chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>

            <!-- Donut chart -->
          <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  이벤트 별 성별 비율 데이터 및 연령대 데이터
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
                    <td><div id="piechart_div" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                    <td><div id="barchart_div" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    주간 누적 상위(3개)이벤트 데이터
                  </h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    일간 상위 데이터("2022-10-18" 기준)
                  </h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="/js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>
<script>
window.onload = function(){
  var date = new Date();
  var year = date.getFullYear();
  var month = ("0" + (1 + date.getMonth())).slice(-2);
  var day = ("0" + date.getDate()).slice(-2);
  var now = year + month + day;
  var asd="2022-10-18";
  $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{time:now,
                  g_type: "curve_line",
                },
            dataType :'json',
              success: function(data){
                  // console.log(data);
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
              },
          });
          
          $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{date:asd,
                  g_type:"bar"},
            dataType :'json',
              success: function(data){
                console.log(data);
                  var tmp=[]
                  var tmp_data=[]
                  for(var i=0; i<data.length; i++)
                  {
                    tmp.push(data[i]['ev_subject']);
                    tmp_data.push([data[i]['cnt']]);
                  }
                  var Data = {
                  labels  : tmp,
                  datasets: [
                    {
                      label : "이벤트 종류",
                      backgroundColor     : 'rgba(60,141,188,0.9)',
                      borderColor         : 'rgba(60,141,188,0.8)',
                      pointRadius         :  false,
                      pointColor          : '#3b8bba',
                      pointStrokeColor    : 'rgba(60,141,188,1)',
                      pointHighlightFill  : '#fff',
                      pointHighlightStroke: 'rgba(60,141,188,1)',
                      data                : [11,23,34,21,56,23]
                    }
                  ]
                }
                Data.datasets[0]['data']=tmp_data;
                // console.log(Math.max(Data.datasets[0]['data']))\
                var max = Math.max.apply(null,Data.datasets[0]['data']);
                var min = Math.min.apply(null,Data.datasets[0]['data']);
                // console.log("최댓값" + max)
                // console.log("최솟값" + min)
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, Data)

                var barChartOptions = {
                  responsive              : true,
                  maintainAspectRatio     : false,
                  datasetFill             : false,
                  scales: {
                          yAxes: [{
                            ticks: {
                              max: max+5,
                              // min: min,
                              beginAtZero: true,
                              fontSize : 14,
                            }
                          }]
                        }
                  }

                new Chart(barChartCanvas, {
                  type: 'bar',
                  data: barChartData,
                  options: barChartOptions
                })
              },
          });

          $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{date:asd,
                  g_type:"pie"},
            dataType :'json',
              success: function(data){
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
              },
          });
          $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{date:asd,
                  g_type:"rev_bar"},
            dataType :'json',
              success: function(data){
                // console.log(data);
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
              },
          });
          $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{time:now,
                  g_type:"stackbar"},
            dataType :'json',
              success: function(data){
                // console.log(data);
                  var t_tmp=[] // 임시 깡통
                  var tmp=[] // 날짜 삽입
                  var a=[] // 이벤트 명
                  var b=[11,22,33,21,36,17,30] // 이벤트 갯수
                  for(var i=0; i<data.length; i++)
                  { 
                    if(!t_tmp.includes(data[i]['dates'])) t_tmp.push(data[i]['dates'])
                    if(!a.includes(data[i]['br_code'])&&data[i]['br_key'] !=null) a.push(data[i]['br_key'])
                  }
                  for(var j=0; j<t_tmp.length; j++)
                  {
                    tmp.push([t_tmp[j],1,2,1,4,1,6])
                  }

                  // console.log(tmp);
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string','event');
                    for(var i=0; i<a.length; i++)
                    {
                      data.addColumn('number',a[i]);
                    }
                    // data.addRows(tmp);

                    var options = {
                      width: 600,
                      height: 300,
                      legend: { position: 'top', maxLines: 3 },
                      bar: { groupWidth: '75%' },
                      isStacked: true
                    };

                    var linechart = new google.visualization.BarChart(document.getElementById('lineChart'));
                    linechart.draw(data, options);
                    }
              },
          });
}
</script>
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>