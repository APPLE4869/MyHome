	
	<!-- ここからContent -->

	<div class="content">
		<div class="content-main">
			<div  class="top-info">
				<div class="top-info-inner">

	<!-- ここからスライド画像 -->

					<div class="top-info-image">
						<div id="images-slider" class="images-slider">
							<?php $i = 0; ?>
							<?php foreach($topImages as $topImage): ?>
								<div class="images-slider-frame">
									<img src="../../images/<?= $topImage; ?>">
								</div>
							<?php $i++; ?>
							<?php endforeach; ?>
						</div>
						<h2><?= h($text); ?></h2>
					</div>
					
	<!-- ここまでスライド画像 -->

					<div class="top-info-title">

	<!-- ここから建物情報 -->

						<table border="1">
							<tr>
								<th>構造</th>
								<td><?= h($construction); ?></td>
							</tr>
							<tr>
								<th>住所</th>
								<td><?= h($address); ?></td>
							</tr>
							<tr>
								<th>交通</th>
								<td><?= h($traffic1[1]); ?></td>
							</tr>
						</table>

	<!-- ここまで建物情報 -->

	<!-- ここから地図 -->
	
						<div id="pc-only" class="content-map">
							<div id="google_map" class="google_map"></div>
						</div>

	<!-- ここまで地図 -->

					</div>
				</div>
			</div>

	<!-- ここから空室情報 -->

			<div class="content-main-border">
				<div class="section-title">
					<h3>空室情報</h3>
				</div>
				<?php $roomsScroll = ($publicNum > 2) ? 'room-scroll': ''; ?>
				<div class="<?= h($roomsScroll); ?>">
				<?php foreach($publicRoom as $id): ?>
				<?php $mysql = 'select * from rooms where id = ' . $id; ?>
				<?php foreach($dbh->query($mysql) as $row): ?>
				<div class="room-column">
					<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/room/?id=<?= h($row['id']); ?>"></a>
					<div class="content-emptyInfo-image">
						<div class="floor-image variable-image">
							<span class="variable-backImage" style="background-image: url('../../images/<?= h($row['floor_image']); ?>')"></span>
						</div>
						<div class="floor-image variable-image">
							<span class="variable-backImage" style="background-image: url('../../images/<?= h($row['preview_image']); ?>')"></span>
						</div>
					</div>
					<div class="content-emptyInfo-feature">
						<div class="info-feature-top">
							<div class="room-number">
								<h4><?= h($row['number']); ?></h4>
							</div>
							<div class="room-feature">
								<ul>
									<?php $feature_block = explode('/', $row['privilege']); ?>
									<?php foreach($feature_block as $feature): ?>
									<li><?= h($feature); ?></li>
									<?php endforeach; ?>
								</ul>
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
							</table>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endforeach; ?>
				<?php if($publicNum == 0): ?>
					<div class="no-public">
						<h2>現在すべての部屋が入居中です。</h2>
					</div>
				<?php endif; ?>
				</div>
			</div>

	<!-- ここまで空室情報 -->

	<!-- ここからお知らせ -->

			<div class="content-main-border">
				<div class="section-title">
					<h3>お知らせ</h3>
				</div>
				<div class="notice-inner">
				<?php $num = count($creates) >= $noticeNum ? $noticeNum : count($creates); ?>
				<?php for($i = 0; $i < $num; $i++): ?>
					<div class="notice-culumn">
						<div class="notice-date">
							<h5><?= h($creates[$i]); ?></h5>
						</div>
						<div class="notice-text">
							<div class="notice-title">
								<h3><?= h($titles[$i]); ?></h3>
							</div>
							<div class="notice-text-content">
								<p><?= h($texts[$i]); ?></p>
							</div>
						</div>
					</div>
				<?php endfor; ?>
				</div>
			</div>
	
	<!-- ここまでお知らせ -->

		</div>


		<div class="content-sub">

	<!-- ここから大家さん自己紹介 -->

			<div class="content-myinfo-column">
				<div class="sub-section-title">
					<h3>私が大家です</h3>
				</div>
				<?php if(!empty($myinfoImage)): ?>
				<div class="content-myinfo-image">
					<img src="../../images/<?= h($myinfoImage); ?>">
				</div>
				<?php endif; ?>
				<div class="content-myInfo-text">
					<p><?= h($myInfo); ?></p>
				</div>
				<?php if(!empty($blogUrl)): ?>
				<div class="myInfor-btn-area">
					<div class="info-btn blue">
						<a href="<?= h($blogUrl); ?>">大家さんのブログ</a>
					</div>
				</div>
				<?php endif; ?>
			</div>

	<!-- ここまで大家さん自己紹介 -->

	<!-- ここからYoutube動画 -->

			<?php if(!empty($youtube)): ?>
			<div class="youtube_movie">
				<iframe width="auto" height="auto" src="<?= h($youtube); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<?php endif; ?>

	<!-- ここまでYoutube動画 -->

	<!-- ここからその他おススメ物件 -->
<!--
			<div class="content-sub-bottom">
				<div class="content-elseHouse">
					<div class="sub-section-title">
						<h3>その他のおすすめ物件</h3>
					</div>
					<?php for($i = 0;$i < 2; $i++): ?>
					<div class="content-elseHouse-column">
						<div class="elseHouse-image">
							<img src="http://www.civillink.net/esozai/img/pics1749.gif">
						</div>
						<div class="elseHouse-detail">
							<a href="/MyHome/Landlord/hagi/simizu/other/">ベルハイツ相模が丘</a>
							<ul>
								<li>神奈川県座間市</li>
								<li>鉄骨鉄筋コンクリート造</li>
								<li>1K,事務所,店舗,倉庫</li>
							</ul>
						</div>
					</div>
					<?php endfor; ?>
				</div>
-->
	<!-- ここまでその他おススメ物件 -->

	<!-- ここから地図 -->
	
				<div id="pc-none" class="content-map map2-frame">
					<div id="google_map2" class="google_map"></div>
				</div>

	<!-- ここまで地図 -->

	<!-- ここからお問い合わせ誘導 -->

				<div class="content-contact">
					<div class="sub-section-title">
						<h3>お問い合わせ</h3>
					</div>
					<div class="content-contact-text">
						<p>この物件へのお問い合わせはこちら。</p>
						<div class="info-btn orange">
							<a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/contact/">お問い合わせ</a>
						</div>
					</div>
				</div>

	<!-- ここまでお問い合わせ誘導 -->

			</div>


		</div>
	</div>

	<!-- ここまでContent -->