
	<!-- ここからOther -->

	<div id="other" class="other">
		<div class="field-title">
			<h3>他物件リンク</h3>
		</div>
		<div class="other-inner">
			<?php $i = 0; ?>
			<?php foreach($buildingId as $id): ?>

	<!-- ここから物件コラム -->

			<div class="other-column">
				<a href="/MyHome/Landlord/<?= h($buildingUser[$i]) ?>/<?= h($buildingFile_Name[$i]); ?>/top/">
					<div class="other-column-inner">
						<div class="other-image">
							<div class="other-variable-image variable-image">
								<span class="variable-backImage" style="background-image: url('../../../<?= h($buildingUser[$i]) ?>/images/<?= h($buildingImages[$i]); ?>')"></span>
							</div>
						</div>
						<div class="other-detail">
							<table>
								<thead>
									<tr class="phone-none">
										<th>物件名</th>
										<td><?= h($buildingNames[$i]); ?></td>
										<th>構造</th>
										<td><?= h($buildingConstructs[$i]); ?></td>
									</tr>
								</thead>
								<tbody>
									<tr class="phone-only-table">
										<th>物件名</th>
										<td colspan="3"><?= h($buildingNames[$i]); ?></td>
									</tr>
									<tr class="phone-only-table">
										<th>構造</th>
										<td colspan="3"><?= h($buildingConstructs[$i]); ?></td>
									</tr>
									<tr>
										<th>総戸数</th>
										<td colspan="3">
										<?= h($buildingUnits[$i]); ?>(
										<?php foreach($buildingUnitsDetail[$i] as $unit): ?>
											<?= h($unit); ?>
										<?php endforeach; ?>
										)
									</td>
									</tr>
									<tr>
										<th>住所</th>
										<td colspan="3"><?= h($buildingAddress[$i]); ?></td>
									</tr>
									<tr>
										<th>交通</th>
										<td colspan="3"><?= h($buildingTraffic[$i]); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</a>
			</div>
	
	<!-- ここまで物件コラム -->

			<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- ここまでOther -->