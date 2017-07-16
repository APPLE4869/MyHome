<?php

/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {
	$image = $row['campaign_image']; //キャンペーン画像[表示]
	$texts = $row['campaign_texts'];
}

$texts = str_replace('{NewLine}', '
', h($texts)); //キャンペーン説明[表示]

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */