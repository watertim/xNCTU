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
			<p>目前此功能僅實作於 Telegram bot 中，請點擊首頁下方按鈕連結 Telegram 帳號。</p>
			<p>於 Telegram 使用 /name 指令即可更改您的暱稱，所有過往的投稿、投票也會一起修正。</p>

			<h2 class="ts header" id="modify-dep">Q：如何更改科系</h2>
			<p>目前系級判斷是從學號來的，如果您曾經轉系、希望顯示新的科系，麻煩透過 mail 與開發團隊聯絡。</p>

			<h2 class="ts header" id="length-limit">Q：字數上限是多少</h2>
			<p>純文字投稿的字數上限為 3,600 字、附圖投稿為 870 字。</p>
			<p>遊走字數上限發文時請注意，最好在發出前自行備份，避免因伺服器判斷誤差造成投稿失敗。</p>

			<h2 class="ts header" id="post-schedule">Q：投稿什麼時候會發出</h2>
			<p>通過審核之文章將會進入發文佇列，由系統<b>每 5 - 10 分鐘</b> po 出一篇至各大社群平台，如欲搶先看也可申請加入審核團隊。</p>
			<p>發文時段會依照投稿數量不定時調整，以下為目前設定：</p>
			<ul>
				<li>白天 08:00 - 16:50 每 10 分鐘發出一篇</li>
				<li>晚上 17:00 - 22:55 每 5 分鐘發出一篇</li>
				<li>半夜 23:00 - 01:00 每 10 分鐘發出一篇</li>
			</ul>

			<h2 class="ts header" id="deleted-submissions">Q：被駁回的機制是什麼</h2>
			<p>當投稿被多數人 <button class="ts vote negative button">駁回</button> 或是放了很久卻達不到通過標準，就會被系統自動清理。</p>
			<p>詳細判斷標準如下：</p>
			<ul>
				<li>12 小時以內：<button class="ts vote negative button">駁回</button>&nbsp;比&nbsp;<button class="ts vote positive button">通過</button>&nbsp;多 20 個</li>
				<li>12 小時至 24 小時：<button class="ts vote negative button">駁回</button>&nbsp;比&nbsp;<button class="ts vote positive button">通過</button>&nbsp;多 10 個</li>
				<li>24 小時至 48 小時：<button class="ts vote negative button">駁回</button>&nbsp;不少於&nbsp;<button class="ts vote positive button">通過</button></li>
				<li>48 小時以後：不論條件，全數回收</li>
			</ul>

			<h2 class="ts header" id="deleted-submissions">Q：可以去哪找到被黑箱的投稿</h2>
			<p>如果達到上述駁回條件，或是管理團隊覺得投稿不適合發出，就會放到 <a href="/deleted">已刪投稿</a> 頁面。</p>
			<p>不過有些投稿包含個人資訊，所以限制僅供已登入交大帳號的使用者才能檢閱。</p>

			<h2 class="ts header" id="apply-account">Q：怎麼註冊帳號</h2>
			<p>如果您是交大的學生、老師、校友，請直接點擊右上角 Login 使用 NCTU OAuth 登入，不需另外註冊即可使用。</p>
			<p>對於準交大生，靠北交大團隊特別提供帳號申請服務，不管您是百川、資工、電機特殊選才，還是碩班、博班正取生，只要憑相關證明私訊版主，即可幫您配發一個臨時帳號，正常使用此服務。</p>
			<p>但若您是友校學生、高三考生、其他親友，在這邊就只能跟您說聲抱歉了，目前不開放非交大使用者註冊，但您仍然可以正常投稿、瀏覽文章。</p>

			<h2 class="ts header" id="ip-mask">Q：隱藏 IP 位址的機制是什麼</h2>
			<p>所有已登入的交大人都看得到匿名發文者的部分 IP 位址，一方面知道幾篇文是同一個人發的可能性，另一方面又保留匿名性。</p>
			<p>對於大部分的位址，會使用 140.113.***.*87 (IPv4) 或 2001:288:4001:***:1234 (IPv6) 的格式，在無法追溯個人的前提下，盡可能提供最多資訊。</p>
			<p>其中 140.113.136.209 - 140.113.136.221 這段是<b>校內無線網路</b>的 IP 位址，一個人可以拿到多個 IP 位址、也會有非常多人拿到同一個位址。公開出來無法識別出個人，讓審核者們知道投稿者<b>不一定是交大師生</b>。</p>
		</div>
<?php include('includes/footer.php'); ?>
	</body>
</html>
