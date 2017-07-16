
<script>

	var icon = [];
	var homeIcon = './../../../../designs/<?= $design; ?>/baseimages/home01-016.gif';
	var icon = [
		'mapicons01-031.png','mapicons01-032.png','mapicons01-033.png','mapicons01-034.png','mapicons01-035.png','mapicons01-036.png','mapicons01-037.png','mapicons01-038.png','mapicons01-039.png','mapicons01-040.png','mapicons01-041.png','mapicons01-042.png','mapicons01-043.png','mapicons01-044.png','mapicons01-045.png','mapicons01-046.png','mapicons01-047.png','mapicons01-048.png','mapicons01-049.png','mapicons01-050.png','mapicons01-051.png','mapicons01-052.png','mapicons01-056.png','mapicons01-058.png','mapicons01-059.png','mapicons01-060.png','mapicons01-062.png','mapicons01-063.png','mapicons01-066.png','mapicons01-067.png','mapicons01-069.png'
		];
	var locationBlock = <?= $locationJS; ?>;
	var topImageJS = <?= $topImageJS; ?>;
	var design = <?= json_encode(h($design), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
	var markerData = {};
	var locationIcons = [];
	var num;

	for(var i = 0; i < locationBlock.length; i++) {
			num = Number(locationBlock[i]['icon']);
			locationIcons[i] = icon[num];
	}

	markerData[0] =
    {
        'lat': Number(<?= json_encode(h($addressLat), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>), // 緯度
        'lng': Number(<?= json_encode(h($addressLng), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>), // 経度
        'icon': goldStar,
        'image': topImageJS,
        'name': '本物件'
    };

	for(var i = 0; i < locationBlock.length; i++) {
		markerData[i + 1] =
    	{
        	'lat': Number(locationBlock[i]['lat']), // 緯度
        	'lng': Number(locationBlock[i]['lng']), // 経度
        	'icon': './../../../../designs/<?= $design; ?>/iconImages/' + locationIcons[i],
        	'image': locationBlock[i]['image'],
        	'name': locationBlock[i]['title']
    	};
	}

	length = Object.keys(markerData).length;

	initMap('google_map');

</script>