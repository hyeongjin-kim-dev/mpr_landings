<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>홈 화면</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

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
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
      </div>
      <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

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
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>
<script>
window.onload = function(){
  var date = new Date();
  var year = date.getFullYear();
  var month = ("0" + (1 + date.getMonth())).slice(-2);
  var day = ("0" + date.getDate()).slice(-2);
  var now = year + month + day;
  var asd="2022-10-12";
  $.ajax({
            url:"/admin/graph.php",
            type :"post",
            data:{time:now},
            dataType :'json',
              success: function(data){
                console.log("1"+data);
                  var tmp = []
                  var tmp_data = []
                  for(var i=0; i<data.length;i++)
                  {
                    tmp.push(data[i]['dates']);
                    tmp_data.push(data[i]['cnt']);
                  }
                  var Data = {
                  labels  : tmp,
                  datasets: [
                    {
                      label : "일자별 개수",
                      backgroundColor     : 'rgba(60,141,188,0.9)',
                      borderColor         : 'rgba(60,141,188,0.8)',
                      pointRadius         :  false,
                      pointColor          : '#3b8bba',
                      pointStrokeColor    : 'rgba(60,141,188,1)',
                      pointHighlightFill  : '#fff',
                      pointHighlightStroke: 'rgba(60,141,188,1)',
                      data                : [1,2,3,4,5,6]
                    }
                  ]
                }
                Data.datasets[0]['data']=tmp_data;
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, Data)
                var barChartOptions = {
                  responsive              : true,
                  maintainAspectRatio     : false,
                  datasetFill             : false,
                  scales: {
                    yAxes:[{
                      ticks:{
                        min:0,
                        max:10,
                        fontisize:14,
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
            data:{date:asd},
            dataType :'json',
              success: function(data){
                console.log("2"+data);
                  var tmp=[]
                  var tmp_data=[]
                  for(var i=0; i<data.length; i++)
                  {
                    tmp.push(data[i]['dates']);
                    tmp_data.push([data[i]['cnt']]);
                  }
                  var Data = {
                  labels  : tmp,
                  datasets: [
                    {
                      label : "일자별 개수",
                      backgroundColor     : 'rgba(60,141,188,0.9)',
                      borderColor         : 'rgba(60,141,188,0.8)',
                      pointRadius         :  false,
                      pointColor          : '#3b8bba',
                      pointStrokeColor    : 'rgba(60,141,188,1)',
                      pointHighlightFill  : '#fff',
                      pointHighlightStroke: 'rgba(60,141,188,1)',
                      data                : [1,2,3,4,5]
                    }
                  ]
                }
                var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                var lineChartData = $.extend(true, {}, Data)
                var lineChartOptions = {
                  responsive              : true,
                  maintainAspectRatio     : false,
                  datasetFill             : false,
                  scales: {
                    yAxes:[{
                      ticks:{
                        min:0,
                        max:10,
                        fontisize:14,
                      }
                    }]
                  }
                }
                var lineChart = new Chart(lineChartCanvas, {
                  type: 'line',
                  data: lineChartData,
                  options: lineChartOptions
                })
              },
          });              
}
</script>
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>