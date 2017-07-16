
	<?php include(dirname(__FILE__) . '/../../../../frames/frame1/privacy.php'); ?>
	
	<!-- ここからCampaign -->

	<div id="campaign" class="campaign">
		<div class="field-title">
			<h3>キャンペーン情報</h3>
		</div>
		<div class="campaign-inner cf">
			<?php if(!empty($image)): ?>
				<div class="campaign-info-image">
					<img src="../../images/<?= h($image); ?>">
				</div>
			<?php endif; ?>
			<div class="campaign-info-text">
				<p><?= nl2br($texts); ?></p>
			</div>
		</div>
	</div>

	<!-- ここまでCampaign -->