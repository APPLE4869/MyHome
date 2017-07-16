
var map;
var marker = [];
var infoWindow = [];

var goldStar = {
    path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
    fillOpacity: 0.8,
    scale: 0.2,
    fillColor: 'yellow',
    strokeColor: 'gold',
    strokeOpacity: 1,
    strokeWeight: 4
  };

function initMap(idName) {

    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
    map = new google.maps.Map(document.getElementById(idName), { // #sampleに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 17 // 地図のズームを指定
    });

    for (var i = 0; i < length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
            position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
        });

        marker[i].setOptions({
            icon: markerData[i]['icon'],
        });
        infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
            content: '<div class="icon-pop"><div class="icon-image-frame"><img src="../../images/' + markerData[i]['image'] + '"></div><p>' + markerData[i]['name'] + '</p></div>' // 吹き出しに表示する内容
        });
        markerEvent(i);
    }

}

 // マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
        infoWindow[i].open(map, marker[i]); // 吹き出しの表示
    });
}