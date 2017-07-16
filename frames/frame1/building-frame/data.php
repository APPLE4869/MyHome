<?php

/* ここから本ページで使用する配列一覧 */

$room_block = [];
$facility_images_block = [];
$facility_texts_block = [];
$traffic1 = [];
$traffic2 = [];
$traffic3 = [];
$facilityNums = [];

/* ここまで本ページで使用する配列一覧 */



/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {
	$old = $row['old']; //築年月[表示]
	$roomId = $row['room_id'];
	$parkingSituation = $row['parking_situation'];
	$parkingNum = $row['parking_num'];
	$facility = $row['facility']; //物件設備[表示]
	$appearance1 = $row['appearance1']; //外観1[表示]
	$appearance2 = $row['appearance2']; //外観2[表示]
	$facility_images = $row['facility_images'];
	$facility_texts = $row['facility_texts'];
	$facility_explain = $row['facility_explain'];
	$buildingSpeaces = $row['building_speaces'];
	$buildingConstruct = $row['building_construct'];
	$buildingStory = $row['building_story'];
	$pref = $row['pref'];
	$addr1 = $row['addr1'];
	$addr2 = $row['addr2'];
	$traffic1B = $row['traffic1'];
	$traffic2B = $row['traffic2'];
	$traffic3B = $row['traffic3'];
}
	list($oldYear, $oldMonth) = explode('&', $old);
	$oldBuilding = date('Y') - $oldYear;
	$oldBuilding = (date('m') < $oldMonth) ? $oldBuilding - 1: $oldBuilding;
	$oldDisplay = $oldYear . '年' . $oldMonth . '月築(築' . $oldBuilding . '年)';//築年月[表示]
	if($parkingSituation == '空きあり') {
		$parking = $parkingNum . '台(' . $parkingSituation . ')'; //駐車場[表示]
	} else {
		$parking = $parkingSituation; //駐車場[表示]
	}
	$facility_images_block = explode(' ', $facility_images); //物件設備画像[表示]
	$facility_texts_block = explode('&&', $facility_texts); //物件設備説明[表示]
	$facility_explain_block = explode('&&', $facility_explain); //物件設備説明[表示]
	$construction = $buildingSpeaces . '/' . $buildingConstruct . $buildingStory . '階建'; //構造[表示]
	for($i = 0;$i < 12; $i++) {
		if(empty($facility_images_block[$i])) {
			unset($facility_images_block[$i]);
			unset($facility_texts_block[$i]);
			unset($facility_explain_block[$i]);
		} else {
			array_push($facilityNums, $i);
		}
	}

	$address = $pref . $addr1 . $addr2; //住所[表示]
	$traffic1 = explode('&', $traffic1B); //交通1[表示]
	$traffic2 = explode('&', $traffic2B); //交通2[表示]
	$traffic3 = explode('&', $traffic3B); //交通3[表示]

	$room_block = explode(' ', $roomId);
	$unitsNum = count($room_block) . '戸'; //総戸数[表示]
	$roomDetail = [];
	$roomDetailNum = [];
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
	$unitsDetail = [];
	for($i = 0; $i < count($roomDetail); $i++) {
		list($floor1, $floor2) = explode('&&', $roomDetail[$i]);
		$block = $floor1 . $floor2 . ':' . $roomDetailNum[$i] . '戸 ';
		array_push($unitsDetail, $block); 
	}

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */