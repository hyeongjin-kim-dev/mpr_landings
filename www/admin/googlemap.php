<!-- 구글 맵 사용방법
1. https://console.cloud.google.com/ 에 접속 후 새로운 프로젝트 생성
2. 왼쪽 위의 탐색 메뉴에 API 및 서비스 > 라이브러리에 "maps javascript api" 검색 후 사용
3. API 및 서비스> 사용자 인증 정보에 접근한뒤 사용자 정보 만들기 > API키 선택후 KEY 생성 -->








<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/head.php";
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/include/inc.common.php";
?>

<style>
  body { position: relative; }
  #chgBtn { position: absolute; top: 50px; right: 0; }
</style>

<div id="map" style="width:50%; height: 50vh;"></div>
<input type="button" onclick="chg()" value="바꾸기" id="chgBtn">
  
<?php
    include_once trim($_SERVER['DOCUMENT_ROOT'])."/admin/tail.php";
?>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbwCkqqEzEY0xEzIu-ihiJLBlegyHM0I&callback=initMap&region=kr"></script>
<script>
var loc="엠피알";
function chg() // 업체 명 받을 시 해당하는 업체 위치 찍어주기!!!!
{
  $.ajax({
        url:"/admin/googlemapDB.php",
        type :"post",
        data:{name:loc},
        dataType :'json',
        success: function(data){
          console.log(data);
          var map = new google.maps.Map(
          document.getElementById('map'), {
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            panControl: FALSE,
            zoomControl: FALSE,
            mapTypeControl: FALSE,
            scaleControl: FALSE,
            streetViewControl: FALSE,
            overviewMapControl: FALSE
          });
          var address = data[0]['br_addr']; // DB에서 주소 가져와서 검색하거나 왼쪽과 같이 주소를 바로 코딩 
          var marker = null;
          var geocoder = new google.maps.Geocoder();
          geocoder.geocode( { 'address': address}, function(results, status) { // 주소값 입력 받은 후 경도 위도 변환해서 지도에 찍어주기!!!
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              marker = new google.maps.Marker({
                  map: map,
                  // icon: image, // 마커로 사용할 이미지(변수)                                
                  title: loc, // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀                                
                  position: results[0].geometry.location});
                  var content = "엠피알<br/><br/>Tel: 1644-9435"; // 말풍선 안에 들어갈 내용                             // 마커를 클릭했을 때의 이벤트. 말풍선 뿅~                
                  var infowindow = new google.maps.InfoWindow({ content: content});
                  google.maps.event.addListener(marker, "click", function() {infowindow.open(map,marker);});
                } else {
                  alert("Geocode was not successful for the following reason: " + status);
                }
              });
        }
});
}
function initMap(lat,lng) //초기 위치는 엠피알 위치 찍어주기!!!
    {
      var mpr = { lat: 37.6566 ,lng: 127.0612}; // 지역 위도 경도 찍어주기
      var map = new google.maps.Map(
        document.getElementById('map'), {
          zoom: 15,
          center: mpr //중심 좌표
        });
      marker = new google.maps.Marker({
              map: map,
              // icon: image, // 마커로 사용할 이미지(변수)                                
              title: '우리집', // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀                                
              position: mpr});

      
        // var address = '대전광역시 중구 한밭도서관길 222'; // DB에서 주소 가져와서 검색하거나 왼쪽과 같이 주소를 바로 코딩 
        // var marker = null;
        // var geocoder = new google.maps.Geocoder();
        // geocoder.geocode( { 'address': address}, function(results, status) {
        //   if (status == google.maps.GeocoderStatus.OK) {
        //     map.setCenter(results[0].geometry.location);
        //     marker = new google.maps.Marker({
        //         map: map,
        //         // icon: image, // 마커로 사용할 이미지(변수)                                
        //         title: '한밭도서관', // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀                                
        //         position: results[0].geometry.location});
        //         var content = "한밭도서관<br/><br/>Tel: 042-580-4114"; // 말풍선 안에 들어갈 내용                             // 마커를 클릭했을 때의 이벤트. 말풍선 뿅~                
        //         var infowindow = new google.maps.InfoWindow({ content: content});
        //         google.maps.event.addListener(marker, "click", function() {infowindow.open(map,marker);});
        //       } else {
        //         alert("Geocode was not successful for the following reason: " + status);
        //       }
        //     });
    }

</script>
