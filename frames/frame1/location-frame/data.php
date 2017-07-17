<?php

/* ここから本ページで使用する配列一覧 */

$locations_container = [];
$images_block = [];
$titles_block = [];
$time_block = [];
$address_block = [];
$explain_block = [];
$lat_block = [];
$lng_block = [];
$locationJS = [];

/* ここまで本ページで使用する配列一覧 */

/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {

	$locationExplain = $row['location_explain']; //周辺情報説明[表示]
	$addressLat = $row['address_lat'];
	$addressLng = $row['address_lng'];

  //周辺施設に関する全情報取得（2次元配列形式)
	for($i = 1; $i <= 15; $i++) {

		array_push($locations_container, $row['location' . $i]);

		$j = $i - 1;

		if (isset($locations_container[$j])) {
			list($location_block[$j]['image'], $location_block[$j]['title'], $location_block[$j]['time'], $location_block[$j]['address'], $location_block[$j]['explain'], $location_block[$j]['lat'], $location_block[$j]['lng'], $location_block[$j]['icon']) = explode('{&}', $locations_container[$j]); //周辺施設情報[表示]
		}
		if(empty($location_block[$j]['image'])) {
			unset($location_block[$j]);
		}

	}

}
$location_block = array_merge($location_block);

$mysql = 'select * from buildings where id = ' . $this_id;
foreach ($dbh->query($mysql) as $row) {
	$topImages_block = $row['top_images'];
	$topImages = explode(' ', $topImages_block);
	$topImage = $topImages[0];
}
  //周辺施設に関するLat,Lng情報の配列をJSONに変更(Google Maps用)
$locationJS = json_encode($location_block, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$topImageJS = json_encode($topImage, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */