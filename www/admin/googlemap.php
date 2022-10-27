<!-- 구글 맵 사용방법 -->
1. 



















<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
?>

<div id="map" style="width:100%; height: 100vh;"></div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbwCkqqEzEY0xEzIu-ihiJLBlegyHM0I&callback=initMap&region=kr"></script>
  <script>
    function initMap() {
      var seoul = { lat: 37.5642135 ,lng: 127.0016985 };
      var map = new google.maps.Map(
        document.getElementById('map'), {
          zoom: 12,
          center: seoul
        });
      
    }
  </script>
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>
