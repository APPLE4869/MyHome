
	<!-- ここからBuilding -->

	<div id="building" class="building">
		<div class="building-info">
			<div class="building-inner">
				<div class="field-title">
					<h3>建物情報</h3>
				</div>
				<div class="building-info-inner">

	<!-- ここから建物情報 -->

					<div class="building-info-detail">
						<table>
							<thead>
								<tr class="image-building-border">
									<th>物件名</th>
									<td><?= h($building_name); ?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>築年月</th>
									<td><?= h($oldDisplay); ?></td>
								</tr>
								<tr>
									<th>構造/種別	</th>
									<td><?= h($construction); ?></td>
								</tr>
								<tr>
									<th>総戸数</th>
									<td>
										<?= h($unitsNum); ?>(
										<?php foreach($unitsDetail as $unit): ?>
											<?= h($unit); ?>
										<?php endforeach; ?>
										)
									</td>
								</tr>
								<tr>
									<th>駐車場</th>
									<td><?= h($parking); ?></td>
								</tr>
								<tr>
									<th>住所</th>
									<td><?= h($address); ?></td>
								</tr>
								<tr>
									<th>交通</th>
									<td>
										<?= (!empty($traffic1[1]))?h($traffic1[1]):''; ?>
										<?= (!empty($traffic2[1]))?'</br>'.h($traffic1[1]):''; ?>
										<?= (!empty($traffic3[1]))?'</br>'.h($traffic2[1]):''; ?>
									</td>
								</tr>
								<tr>
									<th>建物設備</th>
									<td><?= h($facility); ?></td>
								</tr>
							</tbody>
						</table>
					</div>

	<!-- ここまで建物情報 -->

	<!-- ここから外観画像 -->

					<div class="building-appearance">
						<div class="building-appearance-column">
							<div class="sub-section-title">
								<h3>外観</h3>
							</div>
							<div class="appearance-image variable-image">
								<span class="appearance-backImage variable-backImage" style="background-image: url('../../images/<?= h($appearance1); ?>')"></span>
							</div>
						</div>
						<div class="building-appearance-column">
							<div class="sub-section-title">
								<h3>外観</h3>
							</div>
							<div class="appearance-image variable-image">
								<span class="appearance-backImage variable-backImage" style="background-image: url('../../images/<?= h($appearance2); ?>')"></span>
							</div>
						</div>
					</div>
				</div>

	<!-- ここまで外観画像 -->

	<!-- ここから物件設備画像 -->

				<div class="building-inner-middle">
					<div class="building-facility">
						<div class="sub-section-title">
							<h3>物件設備</h3>
						</div>
						<?php $i = 0; ?>
						<?php foreach($facilityNums as $n): ?>
							<?= var_dump($n); ?>
							<div id="<?= $i; ?>" class="building-facility-column modal-open">
								<div class="facility-image variable-image">
									<span class="facility-backImage variable-backImage" style="background-image: url('../../images/<?= h($facility_images_block[$n]); ?>')"></span>
								</div>
								<div class="facility-backImage facility-text">
									<p>（<?= $i + 1; ?>）<?= h($facility_texts_block[$n])?></p>
								</div>
							</div>
						<?php $i++; ?>
						<?php endforeach; ?>
					</div>
				</div>

	<!-- ここまで物件設備画像 -->

			</div>
		</div>
	</div>

	<!-- ここからModal -->

	<div id="overlay" class="overlay">
		<?php foreach($facilityNums as $n): ?>
		<div class="modal modal-building">
			<img src="../../images/<?= h($facility_images_block[$n]); ?>">
			<h3><?= h($facility_texts_block[$n]); ?></h3>
			<h3><?= h($facility_explain_block[$n]); ?></h3>
			<h5>【画面をクリックすると閉じます】</h5>
		</div>
		<?php endforeach; ?>
	</div>

	<!-- ここまでModal -->

	<!-- ここまでBuilding -->