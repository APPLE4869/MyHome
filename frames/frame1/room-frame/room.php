
	<!-- ここからroom -->

	<div id="room" class="room">
		<div class="field-title">
			<h3>部屋詳細情報</h3>
		</div>
		<div class="room-inner">
			<?php $mysql = 'select * from rooms where id = ' . $room_id; ?>
			<?php foreach($dbh->query($mysql) as $row): ?>
			<?php if($row['public'] == 1): ?>
			<?php $privilege_block = explode('/', $row['privilege']); ?>
			<div class="room-title image-building-border">
				<h2><?= h($row['number']); ?></h2>
			</div>
			<div id="pc-none" class="room-detail-primaryImage">
				<div class="room-primaryImage-column">
					<h3 class="image-background-color">間取り</h3>
					<div class="roomDetailTop-image variable-image">
						<span class="variable-backImage" style="background-image: url('../../images/<?= $row['floor_image']; ?>')"></span>
					</div>
				</div>
				<div class="room-primaryImage-column">
					<h3 class="image-background-color">内観</h3>
					<div class="roomDetailTop-image variable-image">
						<span class="variable-backImage" style="background-image: url('../../images/<?= $row['preview_image']; ?>')"></span>
					</div>
				</div>
			</div>
			<div class="room-detail-top">
				<div class="room-detail">
					<table class="room-detail-header">
						<tr>
							<th>賃料</th>
							<td><b><?= h($row['rent']); ?>円</b></td>
							<?php

								$feeNames = [];
								$feeNames = explode('&', $row['month_fee']);
								$feeName = (count($feeNames) > 1) ? h($feeNames[0]) . '等': h($feeNames[0]);

							?>
							<th><?= $feeName; ?></th>
							<?php
								$fees = [];
								$fees = explode('&', $row['fee']);
								$feeValue = 0;
								foreach($fees as $fee) {
									$feeValue += h($fee);
								}

							?>
							<td><?= $feeValue; ?>円</td>
						</tr>
						<tr>
							<?php
							list($deposit1, $depositValue, $depositField) = explode('&', $row['deposit']);
							$deposit = ($depositValue !== '')? $depositValue.$depositField:'なし';
							list($keyMoneyValue, $keyMoneyField) = explode('&', $row['key_money']);
							$keyMoney = ($keyMoneyValue !== '')? $keyMoneyValue.$keyMoneyField:'なし';
							?>
							<th>敷金</th>
							<td><?= h($deposit); ?></td>
							<th>礼金</th>
							<td><?= h($keyMoney); ?></td>
						</tr>
						<tr>
							<th>所在階</th>
							<td><?= h($row['story']); ?>階</td>
							<th>主要採光面</th>
							<td><?= h($row['sun']); ?></td>
						</tr>
						<tr>
							<th>面積</th>
							<td><?= h($row['area']); ?>m²</td>
							<th>入居可能日</th>
							<td><?= h($row['moving_data']); ?></td>
						</tr>
					</table>
					<table class="room-detail-body">
						<tr>
							<th>間取り</th>
							<?php 
							list($floor1, $floor2) = explode('&&', $row['floor']); 
							$roomDetails = $row['room_detail'];
							$roomDetail_block = explode('&&', $roomDetails);
							for($i = 0; $i < count($roomDetail_block); $i++) {
								list($roomDetail1, $roomDetail2) = explode('&', $roomDetail_block[$i]);
								if($i > 0) {
									$floorDetailDisplay .= '、 ' . $roomDetail1 . $roomDetail2 . '畳';
								} else {
									$floorDetailDisplay .= $roomDetail1 . $roomDetail2 . '畳';
								}
							}
							?>
							<td colspan="3"><?= h($floor1) . h($floor2); ?>(<?= h($floorDetailDisplay); ?>)</td>
						</tr>
						<tr>
							<th>駐車場</th>
							<td><?= h($row['parking_condition']); ?></td>
						</tr>
						<?php if(isset($row['terms'])): ?>
						<tr>
							<th>入居条件</th>
							<td colspan="3"><?= h($row['terms']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['room_position'])): ?>
						<tr>
							<th>部屋位置</th>
							<td colspan="3"><?= h($row['room_position']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['feature'])): ?>
						<tr>
							<th>設置品</th>
							<td colspan="3"><?= h($row['feature']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['receipt'])): ?>
						<tr>
							<th>収納</th>
							<td colspan="3"><?= h($row['receipt']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['broadcast'])): ?>
						<tr>
							<th>放送・通信</th>
							<td colspan="3"><?= h($row['broadcast']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['security'])): ?>
						<tr>
							<th>セキュリティ</th>
							<td colspan="3"><?= h($row['security']); ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($row['security'])): ?>
						<tr>
							<th>特典</th>
							<td colspan="3"><?= h($row['privilege']); ?></td>
						</tr>
						<?php endif; ?>
					</table>
				</div>
				<div id="pc-only" class="room-detail-primaryImage">
					<div class="room-primaryImage-column">
						<h3 class="image-background-color">間取り</h3>
						<div class="roomDetailTop-image variable-image">
							<span class="variable-backImage" style="background-image: url('../../images/<?= $row['floor_image']; ?>')"></span>
						</div>
					</div>
					<div class="room-primaryImage-column">
						<h3 class="image-background-color">内観</h3>
						<div class="roomDetailTop-image variable-image">
							<span class="variable-backImage" style="background-image: url('../../images/<?= $row['preview_image']; ?>')"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="room-detail-bottom">
				<div class="sub-section-title">
					<h3>物件設備</h3>
				</div>
				<div class="room-previews">
				<?php $previews = explode(' ', $row['preview_images']); ?>
				<?php $preview_names = explode('&&', $row['previews_names']); ?>
				<?php $preview_texts = explode('&&', $row['previews_text']); ?>
				<?php $j = 0; ?>
				<?php foreach($previews as $preview): ?>
					<div id="<?= $j; ?>" class="room-preview-column modal-open">
						<div class="roomDetailBottom-image variable-image">
							<span class="variable-backImage" style="background-image: url('../../images/<?= h($preview); ?>')"></span>
						</div>
						<h4><?= h($preview_names[$j]); ?></h4>
					</div>
				<?php $j++; ?>
				<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
			<div class="room-detail-btns">
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/location/">周辺情報</a>
				<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/building/">建物情報</a>
			</div>
		</div>
	</div>

	<div id="overlay" class="overlay">
		<?php $j = 0; ?>
		<?php foreach($previews as $preview): ?>
		<div id="modal" class="modal modal-building">
			<img src="../../images/<?= h($preview); ?>">
			<h3><?= h($preview_names[$j]); ?></h3>
			<h4><?= h($preview_texts[$j]); ?></h4>
			<h5>【画面をクリックすると閉じます】</h5>
		</div>
		<?php $j++; ?>
		<?php endforeach; ?>
	</div>

	<!-- ここまでroom -->