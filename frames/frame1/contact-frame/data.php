<?php

/* ここから本ページで使用するMysqlの"buildings"テーブルの情報取得 */

$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {
	$buildingName = $row['building_name']; //物件名[表示]
	$contactName = $row['contact_name']; //大家さんの名前[表示]
	$contactMessage1 = $row['contact_message1'];
	$contactMessage2 = $row['contact_message2'];
}

$mysql = 'SELECT * FROM users WHERE url = :url';
$stmt = $dbh->prepare($mysql);
$stmt->bindValue(':url', $this_user, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch();

$userEmail = $result['email']; //メールアドレス[非表示]
$phoneNumber = $result['phone']; //電話番号[表示]

$contactMessage1 = str_replace('{@}', '
', h($contactMessage1)); //お問い合わせメッセージ1[表示]
$contactMessage2 = str_replace('{@}', '
', h($contactMessage2)); //お問い合わせメッセージ2[表示]

/* ここまで本ページで使用するMysqlの"buildings"テーブルの情報取得 */