<?php

/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {
	$roomId = $row['room_id'];
}

$id_block = explode(' ', $roomId);

/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */