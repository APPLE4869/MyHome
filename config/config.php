
<?php

function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

/*--- ここからStyle-Color ---*/

$id = $this_id;

$design = $this_design;
$imageColor = $this_image_color;
$style = "style";

$jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js';
$js_file = 'script.js';
$js_file2 = 'mapscript.js';
$map_url = 'https://maps.googleapis.com/maps/api/js?';
/*$map_url = 'http://maps.google.com/maps/api/js&sensor=false';*/

/*--- ここまでStyle-Color callback=initMap---*/