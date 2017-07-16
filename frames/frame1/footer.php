
	<!-- ここからFooter -->
	
	<div id="footer" class="footer image-background-color cf">
		<div id="slide-top" class="fadeOut">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
			<h3 class="slide-top">TOP</h3>
		</div>
		<div id="social">
			<div class="social-icon" onClick="alert('準備中');">
				<a class="icon facebook-icon"></a>
			</div>
			<div class="social-icon" onClick="alert('準備中');">
				<a class="icon twitter-icon"></a>
			</div>
		</div>
		<ul class="cf">
			<li><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/building/">建物情報</a></li>
			<li><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/campaign/">キャンペーン</a></li>
			<li><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/location/">周辺情報</a></li>
			<li><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/contact/">お問い合わせ</a></li>
			<li><a href="/MyHome/Landlord/<?= h($this_user); ?>/<?= h($this_file_name); ?>/other/">他物件リンク</a></li>
			<li><a id="pp-open">プライバシーポリシー</a></li>
		</ul>
		<p>Copyright©Wonder Homes.2017 All Rights Reserved.</p>
	</div>

	<!-- ここまでFooter -->