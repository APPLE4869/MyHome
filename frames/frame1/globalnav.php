
	<!-- ここからGlobalMenu -->
	<?php

	$thisdir = basename(dirname($_SERVER['SCRIPT_NAME']));

	if($thisdir == "top") {
		$nowNav1 = "nowNav";
	} else {
		$nowNav1 = "";
	}

	if($thisdir == "building") {
		$nowNav2 = "nowNav";
	} else {
		$nowNav2 = "";
	}

	if($thisdir == "roomlist") {
		$nowNav3 = "nowNav";
	} else {
		$nowNav3 = "";
	}

	if($thisdir == "campaign") {
		$nowNav4 = "nowNav";
	} else {
		$nowNav4 = "";
	}

	if($thisdir == "location") {
		$nowNav5 = "nowNav";
	} else {
		$nowNav5 = "";
	}

	if($thisdir == "contact") {
		$nowNav6 = "nowNav";
	} else {
		$nowNav6 = "";
	}

	if($thisdir == "other") {
		$nowNav7 = "nowNav";
	} else {
		$nowNav7 = "";
	}


	?>

	<div id="globalMenu" class="globalMenu cf">
		<div class="phone-only">
			<div id="header-contact-url">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/contact/"></a>
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<p>お問い合わせ</p>
			</div>
		</div>
		<div id="logo" class="image-color phone-only">
			<h2><?= h($building_name); ?></h2>
		</div>
		<div id="open-icon" class="phone-only nav-icon">
			<i class="fa fa-bars" aria-hidden="true"></i>
			<p>メニュー</p>
		</div>
		<div id="close-icon" class="phone-only nav-icon">
			<i class="fa fa-times" aria-hidden="true"></i>
		</div>
		<ul id="slide-nav">
			<li id="<?= $nowNav1; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/top/">TOP</a>
			</li>
			<li id="<?= $nowNav2; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/building/">建物情報</a>
			</li>
			<li id="<?= $nowNav3; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/roomlist/">空室情報</a>
			</li>
			<?php if($campaignPublic == 0): ?>
			<li id="<?= $nowNav4; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/campaign/">キャンペーン</a>
			</li>
			<?php endif; ?>
			<?php if($locationPublic == 0): ?>
			<li id="<?= $nowNav5; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/location/">周辺情報</a>
			</li>
			<?php endif; ?>
			<li id="<?= $nowNav6; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/contact/">お問い合わせ</a>
			</li>
			<li id="<?= $nowNav7; ?>">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/other/">他物件リンク</a>
			</li>
		</ul>
	</div>
	<!-- ここまでGlobalMenu -->