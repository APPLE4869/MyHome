	<?php

	$mysql = 'select * from buildings where id = ' . $this_id;
	foreach($dbh->query($mysql) as $row) {
		$campaignImage = $row['campaign_image'];
		$campaignPublic = $row['campaign_public'];
		$locationPublic = $row['location_public'];
	}

	if ($campaignPublic == 0 && $locationPublic == 0) {
		$globalMenuWidth = 14.285;
	} elseif ($campaignPublic == 0 || $locationPublic == 0) {
		$globalMenuWidth = 16.666;
	} else {
		$globalMenuWidth = 20;
	}

	$campaignTextClass = ($campaignImage !== '') ? 'display: table-cell;':'display: block;margin: 0 auto;';

	?>

	<style>
	

		#header {
			background-image: url('../../../../designs/<?= h($this_design); ?>/baseimages/<?= $header_image; ?>');
			background-position: 15% 30%;
		}

		#globalMenu a { 
			width: <?= $globalMenuWidth; ?>%;
		}

		.campaign-info-text {
			width: 50%;
			 <?= $campaignTextClass; ?>
		}

		.floor-image::before {
			padding-top: 75%;
		}

		.appearance-image::before {
			padding-top: 75%;
		}

		.facility-image::before {
			padding-top: 75%;
		}

		.roomDetailTop-image::before {
			padding-top: 75%;
		}

		.roomDetailBottom-image::before {
			padding-top: 75%;
		}

		.location-image::before {
			padding-top: 75%;
		}

		.other-variable-image::before {
			padding-top: 75%;
		}

		@media (max-width: 1120px) {
			
			.campaign-info-text {
				width: 100%;
			}

		}

		@media (max-width: 760px) {

			.top-info-image {
				background-image: url('../../../../designs/<?= h($this_design); ?>/baseimages/<?= $top_image; ?>');
			}

			#globalMenu a { 
				width: 100%;
			}

			.campaign-info-text {
				width: 95%;
			}

		}
		
	</style>