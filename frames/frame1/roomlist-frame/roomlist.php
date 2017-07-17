	<!-- ここからRoomlist -->

	<div id="roomlist" class="roomlist">
		<div class="roomlist-inner">

	<!-- ここから部屋一覧 -->

			<div class="roomlist-numbers">
				<div class="roomlist-section-title">
					<h3 class="image-background-color">部屋一覧</h3>
				</div>
				<div class="roomlist-explain">
					<h5>白い部屋が現在空室のものになります。詳細は下の「空室情報」よりご覧になれます。</h5>
				</div>
				<?php foreach($id_block as $id): ?>
				<?php $mysql = 'select * from rooms where id = ' . $id; ?>
				<?php foreach($dbh->query($mysql) as $row): ?>
				<?php $roomCondition = ($row['public'] == 0) ? 'local-room':'public-room'; ?>
					<div class="single-number <?= $roomCondition; ?>">
						<p class="icon"><?= h($row['number']); ?></p>
					</div>
				<?php endforeach; ?>
				<?php endforeach; ?>
			</div>

	<!-- ここまで部屋一覧 -->

	<!-- ここから空室情報 -->

			<div class="roomlist-content">
				<div class="section-title">
					<h3>空室情報</h3>
				</div>
				<?php $public = False; ?>
				<?php foreach($id_block as $id): ?>
				<?php $mysql = 'select * from rooms where id = ' . $id; ?>
				<?php foreach($dbh->query($mysql) as $row): ?>
				<?php if($row['public'] == 1): ?>
					<div class="roomlist-column">
						<div class="roomlist-images">
							<a class="floor-image variable-image" href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/room/?id=<?= h($row['id']); ?>">
								<span class="variable-backImage" style="background-image: url('../../images/<?= h($row['floor_image']); ?>')"></span>
							</a>
							<a class="floor-image variable-image" href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/room/?id=<?= h($row['id']); ?>">
								<span class="variable-backImage" style="background-image: url('../../images/<?= h($row['preview_image']); ?>')"></span>
							</a>
						</div>
						<div class="roomlist-emptyInfo-feature">
							<div class="roomlist-feature-top">
								<div class="roomlist-number">
									<h4><?= h($row['number']); ?></h4>
								</div>
								<div class="roomlist-detail-click">
									<h5 class="image-background-color"><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/room/?id=<?= $row['id']; ?>">この部屋の詳細を見る</a></h5>
								</div>
							</div>
							<div class="info-feature-bottom">
								<table>
									<tr>
										<th>賃料</th>
										<td><?= h($row['rent']); ?>円</td>
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
										<th>間取り</th>
										<?php 
										list($floor1, $floor2) = explode('&&', $row['floor']); 
										$roomDetails = $row['room_detail'];
										$roomDetail_block = explode('&&', $roomDetails);
										$floorDetailDisplay = '';
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
										<th>面積</th>
										<td><?= h($row['area']); ?>m²</td>
										<th>入居可能日</th>
										<td><?= h($row['moving_data']); ?></td>
									</tr>
									<tr>
										<th>所在階</th>
										<td><?= h($row['story']); ?>階</td>
										<th>主要採光面</th>
										<td><?= h($row['sun']); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<?php $public = True; ?>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php endforeach; ?>
					<?php if($public == False): ?>
					<div class="no-public">
						<h2>現在すべての部屋が入居中です。</h2>
					</div>
				<?php endif; ?>
				</div>
			</div>

	<!-- ここまで空室情報 -->

		</div>
	</div>

	<!-- ここまでRoomlist -->