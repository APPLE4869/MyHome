
<?php

$dirs = [];
$dirs = explode('/', $dir);

$dirs = array_reverse($dirs);

$mysql = 'select * from buildings where file_name = \'' . $dirs[1] . '\' and user = \'' . $dirs[2] . '\'';
foreach($dbh->query($mysql) as $row) {
	$pagePublic = $row['page_public'];
	$this_id = $row['id'];
	$this_file_name = $row['file_name'];
	$this_design = $row['design'];
	$this_image_color = $row['image_color'];
	$header_image = $row['base_image1'];
	$top_image = $row['base_image2'];
	$this_user = $row['user'];
	$building_name = $row['building_name'];
	$text = $row['header_text'];
}

if($pagePublic == 1) {
	exit;
}

/*
$mysql = 'select * from buildings where id = ' . $this_id;
foreach($dbh->query($mysql) as $row) {
	$building_name = $row['building_name'];
	$text = $row['header_text'];
}
*/