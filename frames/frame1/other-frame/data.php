<?php

/* ここから本ページで使用する配列一覧 */

$buildingId = [];
$buildingFile_Name = [];
$buildingUser = [];
$buildingImages = [];
$buildingNames = [];
$buildingUnits = [];
$buildingUnitsDetail = [];
$buildingConstructs = [];
$buildingAddress = [];
$buildingTraffic = [];

/* ここまで本ページで使用する配列一覧 */


/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where page_public = 0 order by rand() limit 10';

foreach($dbh->query($mysql) as $row) {
	array_push($buildingId, $row['id']);
}

foreach($buildingId as $id) {

	$images = [];
	$traffics = [];
	$room_block = [];
	$unitsDetail = [];
	$roomDetail = [];
	$roomDetailNum = [];

	$mysql = 'select * from buildings where id = ' . $id;
	foreach($dbh->query($mysql) as $row) {
		array_push($buildingFile_Name, $row['file_name']); //URL用[配列表示]
		array_push($buildingUser, $row['user']); //URL用[配列表示]
		$image = $row['top_images'];
		$images = explode(' ', $image);
		array_push($buildingImages, $images[0]); //建物写真[配列表示]
		array_push($buildingNames, $row['building_name']); //建物名[配列表示]
		$roomId = $row['room_id'];
		$construction = $row['building_speaces'] . '/' . $row['building_construct'] . $row['building_story'] . '階建';
		array_push($buildingConstructs, $construction); //構造[配列表示]
		$address = $row['pref'] . $row['addr1'] . $row['addr2'];
		array_push($buildingAddress, $address); //住所[配列表示]
		$traffic = $row['traffic1'];
		$traffics = explode('&', $traffic);
		array_push($buildingTraffic, $traffics[1]); //交通[配列表示]
	}

	$room_block = explode(' ', $roomId);
	$units = count($room_block) . '戸';
	array_push($buildingUnits, $units); //総戸数[配列表示]
	foreach($room_block as $block) {
		$mysql = 'select * from rooms where id = ' . $block;
		foreach($dbh->query($mysql) as $row) {
			if(array_search($row['floor'], $roomDetail) == false) {
				array_push($roomDetail, $row['floor']);
				array_push($roomDetailNum, 1);
			} else {
				$key = array_search($row['floor'], $roomDetail);
				$roomDetailNum[$key] += 1;
			}
		}
	}

	for($i = 0; $i < count($roomDetail); $i++) {
		list($floor1, $floor2) = explode('&&', $roomDetail[$i]);
		$block = $floor1 . $floor2 . ':' . $roomDetailNum[$i] . '戸 ';
		array_push($unitsDetail, $block); 
	}

	array_push($buildingUnitsDetail, $unitsDetail);

}

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */