
	<!-- ここからLocation -->

	<div id="location" class="location">	
		<div class="field-title">
			<h3>周辺情報</h3>
		</div>
		<div class="location-inner">
			<div class="location-info-inner">

	<!-- ここから周辺情報説明 -->

				<div class="location-top-text location-small">
					<p><?= h($locationExplain); ?></p>
				</div>

	<!-- ここまで周辺情報説明 -->

	<!-- ここから地図 -->
	
				<div class="location-left-block">
					<div id="google_map" class="google_map"></div>
				</div>
	
	<!-- ここまで地図 -->

				<div class="location-right-block">

	<!-- ここから周辺情報説明 -->

					<div class="location-top-text location-big">
						<p><?= h($locationExplain); ?></p>
					</div>

	<!-- ここまで周辺情報説明 -->

	<!-- ここから周辺施設情報 -->

					<div class="location-info-bottom">
						<?php for($i = 0; $i < count($location_block); $i++): ?>
						<div id="<?= $i; ?>" class="location-bottom-column modal-open">
							<div class="location-image variable-image">
								<span class="variable-backImage" style="background-image: url('../../images/<?= h($location_block[$i]['image']); ?>')"></span>
							</div>
							<div class="location-column-click">
								<h3>（<?= $i + 1; ?>）<?= h($location_block[$i]['title']); ?></h3>
							</div>
							<p>(徒歩 <?= h($location_block[$i]['time']); ?> 分)</p>
						</div>
						<?php endfor; ?>
					</div>

	<!-- ここまで周辺施設情報 -->

				</div>
			</div>
		</div>
	</div>

	<!-- ここからModal -->

	<div id="overlay" class="overlay">
		<?php for($i = 0; $i < count($location_block); $i++): ?>
		<div id="modal" class="modal modal-location">
			<img src="../../images/<?= h($location_block[$i]['image']); ?>">
			<h4><b><?= h($location_block[$i]['title']); ?></b><span class="modal-forth-inner">（徒歩 <?= h($location_block[$i]['time']); ?> 分）</span></h4>
			<p><?= h($location_block[$i]['explain']); ?></p>
			<h5>【画面をクリックすると閉じます】</h5>
		</div>
		<?php endfor; ?>
	</div>

	<!-- ここまでModal -->
	
	<!-- ここまでLocation -->