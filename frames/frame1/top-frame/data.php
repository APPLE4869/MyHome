<?php

/* ここから本ページで使用する配列一覧 */

$topImages = [];
$notice_block = [];
$traffic1 = [];
$creates = [];
$titles = [];
$texts = [];
$publicRoom = [];
$locations_container = [];
$location_block = [];

/* ここまで本ページで使用する配列一覧 */



/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;

foreach($dbh->query($mysql) as $row) {

	$myInfo = $row['myInfo']; //大家さんのページ紹介[表示]
	$fileImages = $row['top_images']; //スライド画像[表示]
	$youtube = $row['youtube']; //動画[表示]
	$noticesId = $row['notices'];
	$noticeNum = $row['noticeNum'];
	$blogUrl = $row['blog_url']; //誘導ブログのURL[表示]
	$myinfoImage = $row['myinfo_image']; //大家さんのページ紹介の画像[表示]
	$buildingSpeaces = $row['building_speaces'];
	$buildingConstruct = $row['building_construct'];
	$buildingStory = $row['building_story'];
	$pref = $row['pref'];
	$addr1 = $row['addr1'];
	$addr2 = $row['addr2'];
	$traffic = $row['traffic1'];
	$addressLat = $row['address_lat'];
	$addressLng = $row['address_lng'];
	$roomId = $row['room_id'];

  //周辺施設に関する全情報取得（2次元配列形式)
	for($i = 1; $i <= 15; $i++) {

		array_push($locations_container, $row['location' . $i]);

		$j = $i - 1;
		if (isset($locations_container[$j])) {
			list($location_block[$j]['image'], $location_block[$j]['title'], $location_block[$j]['time'], $location_block[$j]['address'], $location_block[$j]['explain'], $location_block[$j]['lat'], $location_block[$j]['lng'], $location_block[$j]['icon']) = explode('{&}', $locations_container[$j]);
		}

	}
}

  //表示する形に変更
$topImages = explode(' ', $fileImages);
for($i = 0; $i < count($topImages); $i++) {
	if(empty($topImages[$i])) {
		unset($topImages[$i]);
	}
}

$notice_block = explode(' ', $noticesId);
$notice_block = array_reverse($notice_block);
$construction = $buildingSpeaces . '/' . $buildingConstruct . $buildingStory . '階建'; //構造[表示]
$address = $pref . $addr1 . $addr2; //住所[表示]
$traffic1 = explode('&', $traffic); //交通[表示]

  //周辺施設に関する情報15種のうち、画像のないものを削除
for($i = 0; $i < count($location_block); $i++) {
	if(empty($location_block[$i]['image'])) {
		unset($location_block[$i]);
	}
}

  //周辺施設に関するLat,Lng情報の配列をJSONに変更(Google Maps用)
$locationJS = json_encode($location_block, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$topImageJS = json_encode($topImages[0], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */


/* ここから空室情報を取得 */

foreach($notice_block as $id) {
	$mysql = 'select * from notices where id = ' . $id;
	foreach($dbh->query($mysql) as $row) {
		array_push($creates, $row['created']);
		array_push($titles, $row['title']);
		array_push($texts, $row['text']);
	}
}

$roomId_block = explode(' ', $roomId);

foreach($roomId_block as $id) {
	$mysql = 'select * from rooms where id = ' . $id;
	foreach($dbh->query($mysql) as $row) {
		if($row['public'] == 1) {
			array_push($publicRoom, $row['id']);
		}
	}
}

$publicNum = count($publicRoom);

/* ここまで空室情報を取得 */