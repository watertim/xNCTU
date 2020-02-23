<!DOCTYPE html>
<html lang="zh-TW">
	<head>
<?php
$TITLE = '常見問答';
$IMG = 'https://x.nctu.app/assets/img/logo.png';
include('includes/head.php');
?>
	</head>
	<body>
<?php include('includes/nav.php'); ?>
		<header class="ts fluid vertically padded heading slate">
			<div class="ts narrow container">
				<h1 class="ts header">常見問答</h1>
				<div class="description">靠北交大 2.0</div>
			</div>
		</header>
		<div class="ts container" name="main">
			<p>下面列出了幾個關於此服務的問題，如有疏漏可聯絡開發團隊，將儘快答覆您。</p>

			<h2 class="ts header" id="modify-name">Q：如何更改暱稱</h2>
			<p>目前此功能僅實作於 Telegram bot 中，請至首頁下方連結 Telegram 帳號。</p>
			<p>於 Telegram 使用 /name 指令即可更改您的暱稱，所有過往的投稿、投票也會一起修正。</p>

			<h2 class="ts header" id="facebook-sucks">Q：打不開 Facebook 貼文</h2>
			<p>由於 Facebook 政策，發佈 App 之前必須先 <a target="_blank" href="/posts?id=4">審查身分證件</a>，已於 2/19 送件，等到審查通過後就能看得到了。</p>

		</div>
<?php include('includes/footer.php'); ?>
	</body>
</html>
