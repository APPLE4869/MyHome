
	<!-- ここからContact -->

	<div id="contact" class="contact">
		<div class="field-title">
			<h3>お問い合わせ</h3>
		</div>

	<!-- ここから送信後メッセージ -->

		<div class="contact-inner">
			<?php if($submitConfirm == '○'): ?>
				<div class="confirm-message">
					<h4>無事送信されました！</h4>
				</div>
			<?php elseif($submitConfirm == '×'): ?>
				<div class="confirm-message">
					<h4>エラーが発生いたしました。</h4>
				</div>
			<?php endif; ?>

	<!-- ここまで送信後メッセージ -->

	<!-- ここからお問い合わせ情報 -->

			<div class="conact-phone-block">
				<div class="sub-section-title">
					<h3>電話でのお問い合わせ</h3>
				</div>
				<div class="contact-phone">
					<h2><?= h($contactName); ?>まで </h2>
					<h3><span class="big-text"><?= h($phoneNumber); ?></span>(年中無休)</h3>
					<p><?= nl2br($contactMessage1); ?></p>
				</div>
			</div>

	<!-- ここまでお問い合わせ情報 -->

			<div class="contact-form-block">
				<div class="sub-section-title">
					<h3>フォームでのお問い合わせ</h3>
				</div>
				<div class="contact-form-border">
					<div class="contact-form-text">
						<p><b>以下のフォームに情報をご入力ください(24時間受付)</b></p>
						<p><?= nl2br($contactMessage2); ?></p>
					</div>

	<!-- ここからお問い合わせフォーム（PC, TABLET） -->

					<form action="" method="post" class="phone-none">
						<table>
							<tr class="single-space">
								<th rowspan="2">氏名</th>
								<th>漢字<span class="red">※</span></th>
								<td>
									<div class="validator">
										<?php if (isset($error['nameEmpty'])) : ?>
											<p><?= $error['nameEmpty']; ?></p>
										<?php endif; ?>
									</div>
									姓
									<input type="text" name="last_name" id="last-name" class="input-area" maxlength="100">
									名
									<input type="text" name="first_name" id="first-name" class="input-area" maxlength="100">
									[全角]
								</td>
							</tr>
							<tr class="single-space">
								<th>フリガナ<span class="red">※</span></th>
								<td>
									<div class="validator">
										<?php if (isset($error['name2Empty'])) : ?>
											<p><?= $error['name2Empty']; ?></p>
										<?php endif; ?>
									</div>
									セイ
									<input type="text" name="last_name2" id="last_name_kana" class="input-area" maxlength="100">
									メイ
									<input type="text" name="first_name2" id="first_name_kana" class="input-area" maxlength="100">
									[全角カタカナ]
								</td>
							</tr>
							<tr class="single-space">
								<th colspan="2">電話番号<span class="red">※</span></th>
								<td>
									<div class="validator">
										<?php if (isset($error['phoneEmpty'])) : ?>
											<p><?= $error['phoneEmpty']; ?></p>
										<?php endif; ?>
									</div>
									<input type="text" name="phone_number" id="phone_number" maxlength="50" size="50">
									[半角数字]
								</td>
							</tr>
							<tr>
								<th colspan="2" rowspan="2">メールアドレス<span class="red">※</span></th>
								<td class="mail-space">
									<div class="validator">
										<?php if (isset($error['email1Empty'])) : ?>
											<p><?= $error['email1Empty']; ?></p>
										<?php endif; ?>
										<?php if (isset($error['emailMatch'])) : ?>
											<p><?= $error['emailMatch']; ?></p>
										<?php endif; ?>
										<?php if (isset($error['emailFormat'])) : ?>
											<p><?= $error['emailFormat']; ?></p>
										<?php endif; ?>
									</div>
									誤ったメールアドレスを記入されますと返信ができなくなります。</br>間違いのないようにご記入ください。</br>
									<input type="text" name="mail_address1" id="mail_address1" maxlength="100" size="50">
									[半角英数字]
								</td>
							</tr>
							<tr>
								<td class="mail-confirm-space">
									<div class="validator">
										<?php if (isset($error['email2Empty'])) : ?>
											<p><?= $error['email2Empty']; ?></p>
										<?php endif; ?>
									</div>
									確認のため、もう一度ご記入ください。</br>
									<input type="text" name="mail_address2" id="mail_address2" maxlength="100" size="50">
									[半角英数字]
								</td>
							</tr>
							<tr>
								<th colspan="2">お問い合わせ内容<span class="red">※</span></th>
								<td class="single-space">
									<div class="validator">
										<?php if (isset($error['contact_typeEmpty'])) : ?>
											<p><?= $error['contact_typeEmpty']; ?></p>
										<?php endif; ?>
									</div>
									<input type="checkbox" name="contact_type1" id="contact_type1" value="内見を予約したい"><label for="contact_type1">内見を予約したい</label>
									<input type="checkbox" name="contact_type2" id="contact_type2" value="詳しい情報を知りたい"><label for="contact_type2">詳しい情報を知りたい</label>
									<input type="checkbox" name="contact_type3" id="contact_type3" value="電話でお話がしたい"><label for="contact_type3">電話でお話がしたい</label>
									<input type="checkbox" name="contact_type4" id="contact_type4" value="その他"><label for="contact_type4">その他</label>
								</td>
							</tr>
							<tr>
								<th colspan="2">お問い合わせ詳細</th>
								<td class="text-space">
									<div class="validator">
										<?php if (isset($error['descriptionEmpty'])) : ?>
											<p><?= $error['descriptionEmpty']; ?></p>
										<?php endif; ?>
									</div>
									<textarea name="description" id="description" row="10" col="80"></textarea>
								</td>
							</tr>
						</table>
						<div class="buttonBlock">
							入力内容をご確認の上、「確認する」ボタンをクリックしてください。
						</div>
						<button type="button" id="submit_btn" class="submit_btn">確認する</button>
						<div id="confirm-layer" class="confirm-layer"></div>
						<div id="confirm-modal" class="confirm-modal">
							<h3>確認画面</h3>
							<h4>氏名(漢字)</h4>
							<p></p>
							<h4>氏名(フリガナ)</h4>
							<p></p>
							<h4>電話番号</h4>
							<p></p>
							<h4>メールアドレス</h4>
							<p></p>
							<h4>お問い合わせ内容</h4>
							<p></p>
							<h4>お問い合わせ詳細</h4>
							<div class="confirm-modal-content">
								<p></p>
							</div>
							<button type="submit" class="submit_btn-original">送信する</button>
						</div>
						<input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
					</form>

	<!-- ここまでお問い合わせフォーム（PC, TABLET） -->

	<!-- ここからお問い合わせフォーム（PHONE） -->

					<form action="" method="post" class="phone-only">
						<div class="post-column">
							<div class="post-title">
								<h2>氏名</h2>
							</div>
							<div class="post-bottom-area">
								<h3>漢字<span class="red">※</span></h3>
								<div class="phone-name-space">
									<div class="validator">
										<?php if (isset($error['nameEmpty'])) : ?>
											<p><?= $error['nameEmpty']; ?></p>
										<?php endif; ?>
									</div>
									姓
									<input type="text" name="last_name" id="last-name" class="input-area" maxlength="100">
									名
									<input type="text" name="first_name" id="first-name" class="input-area" maxlength="100">
									</br>[全角]
								</div>
							</div>
							<div class="post-bottom-area">
								<h3>フリガナ<span class="red">※</span></h3>
								<div class="phone-name-space">
									<div class="validator">
										<?php if (isset($error['name2Empty'])) : ?>
											<p><?= $error['name2Empty']; ?></p>
										<?php endif; ?>
									</div>
									セイ
									<input type="text" name="last_name2" id="last_name" class="input-area" maxlength="100">
									メイ
									<input type="text" name="first_name2" id="first_name" class="input-area" maxlength="100">
									</br>[全角カタカナ]
								</div>
							</div>
						</div>
						<div class="post-column">
							<div class="post-title">
								<h2>電話番号<span class="red">※</span></h2>
							</div>
							<div class="post-bottom-area">
								<div class="phone-all-area">
									<div class="validator">
										<?php if (isset($error['phoneEmpty'])) : ?>
											<p><?= $error['phoneEmpty']; ?></p>
										<?php endif; ?>
									</div>
									<input type="text" name="phone_number" id="phone_number" maxlength="50" size="50"></br>
									[半角数字]
								</div>
							</div>
						</div>
						<div class="post-column">
							<div class="post-title">
								<h2>メールアドレス<span class="red">※</span></h2>
							</div>
							<div class="post-bottom-area">
								<div class="phone-all-area">
									<div class="validator">
										<?php if (isset($error['email1Empty'])) : ?>
											<p><?= $error['email1Empty']; ?></p>
										<?php endif; ?>
										<?php if (isset($error['emailMatch'])) : ?>
											<p><?= $error['emailMatch']; ?></p>
										<?php endif; ?>
										<?php if (isset($error['emailFormat'])) : ?>
											<p><?= $error['emailFormat']; ?></p>
										<?php endif; ?>
									</div>
									誤ったメールアドレスを記入されますと返信ができなくなります。間違いのないようにご記入ください。</br>
									<input type="text" name="mail_address1" id="mail_address1" maxlength="100" size="50"></br>
									<div class="validator">
										<?php if (isset($error['email2Empty'])) : ?>
											<p><?= $error['email2Empty']; ?></p>
										<?php endif; ?>
									</div>
									[半角英数字]</br>
									<span class="red">
									※携帯メールを登録される際は、</br>必ず携帯電話のドメインしていで「・・・・・」を受信許可としてください。</br>接待方法は<span class="link">こちら</span></span>
									確認のため、もう一度ご記入ください。</br>
									<input type="text" name="mail_address2" id="mail_address2" maxlength="100" size="50"></br>
									[半角英数字]
								</div>
							</div>
						</div>
						<div class="post-column">
							<div class="post-title">
								<h2>お問い合わせ内容<span class="red">※</span></h2>
							</div>
							<div class="post-bottom-area">
								<div class="validator">
									<p><?= $error['contact_typeEmpty']; ?></p>
								</div>
								<input type="checkbox" name="contact_type1" id="contact_type1" value="内見を予約したい"><label for="contact_type1">内見を予約したい</label>
								<input type="checkbox" name="contact_type2" id="contact_type2" value="詳しい情報を知りたい"><label for="contact_type2">詳しい情報を知りたい</label></br>
								<input type="checkbox" name="contact_type3" id="contact_type3" value="電話でお話がしたい"><label for="contact_type3">電話でお話がしたい</label>
								<input type="checkbox" name="contact_type4" id="contact_type4" value="その他"><label for="contact_type4">その他</label>
							</div>
						</div>
						<div class="post-column">
							<div class="post-title">
								<h2>お問い合わせ詳細</h2>
							</div>
							<div class="post-bottom-area">
								<div class="validator">
									<p><?= $error['descriptionEmpty']; ?></p>
								</div>
								<textarea name="description" id="description" row="10" col="80"></textarea>
							</div>
						</div>
						<div class="buttonBlock">
							入力内容をご確認の上、</br>「確認する」ボタンをクリックしてください。
						</div>
						<button type="submit" class="submit_btn">送信する</button>
						<input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
					</form>

	<!-- ここまでお問い合わせフォーム（PHONE） -->

				</div>
			</div>
		</div>
	</div>

	<!-- ここからContact -->