<?php
session_start();
require_once('utils.php');
require_once('database.php');
require_once('send-review.php');
$db = new MyDB();

$ip_addr = $_SERVER['REMOTE_ADDR'];
$ip_masked = ip_mask($ip_addr);

if (isset($_SESSION['nctu_id']))
	$USER = $db->getUserByNctu($_SESSION['nctu_id']);

if (!isset($_SESSION['csrf_token']))
	$_SESSION['csrf_token'] = rand58(8);

$captcha = "請輸入「交大ㄓㄨˊㄏㄨˊ」（四個字）";
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
<?php
$TITLE = '文章投稿';
$IMG = 'https://x.nctu.app/assets/img/logo.png';
include('includes/head.php');
?>
		<script src="/assets/js/submit.js"></script>
	</head>
	<body>
<?php include('includes/nav.php'); ?>
		<header class="ts fluid vertically padded heading slate">
			<div class="ts narrow container">
				<h1 class="ts header">文章投稿</h1>
				<div class="description">靠北交大 2.0</div>
			</div>
		</header>
		<div class="ts container" name="main">
			<div id="rule">
				<h2>投稿規則</h2>
				<ol>
					<li>攻擊性投稿內容不能含有姓名、暱稱等可能洩漏對方身分的資料，請把關鍵字自行碼掉。
						<ol><li>登入後具名投稿者，不受此條文之限制。</li></ol></li>
					<li>含有歧視、人身攻擊、色情內容、不實訊息等文章，將由審核團隊衡量發文尺度。</li>
					<li>如果對文章感到不舒服，請來信審核團隊，如有合理理由將協助刪文。</li>
				</ol>
			</div>

			<div id="submit-section">
				<h2>立即投稿</h2>
<?php if (isset($USER)) { ?>
				<div class="ts warning message">
					<div class="header">注意：您目前為登入狀態</div>
					<p>所有人都能看到您（<?= $USER['name'] ?>）具名投稿，如想匿名投稿請先點擊右上角登出後再發文。</p>
				</div>
<?php } else { ?>
				<div class="ts info message">
					<div class="header">請注意</div>
					<p>一但送出投稿後，所有人都能看到您的網路服務商（<?= ip_from($ip_addr) ?>），已登入的交大人能看見您的部分 IP 位址 (<?= $ip_masked ?>) 。</p>
				</div>
<?php } ?>
				<form id ="submit-post" class="ts form" action="/submit" method="POST" enctype="multipart/form-data">
					<div id="body-field" class="required resizable field">
						<label>貼文內容</label>
						<textarea id="body-area" name="body" rows="6" placeholder="請在這輸入您的投稿內容。"></textarea>
						<span>目前字數：<span id="body-wc">0</span></span>
					</div>
					<div class="inline field">
						<label>附加圖片</label>
						<div class="four wide"><input type="file" id="img" name="img" accept="image/png, image/jpeg, image/gif" style="display: inline-block;" /></p></div>
					</div>
					<div id="captcha-field" class="required inline field">
						<label>驗證問答</label>
						<div class="two wide"><input id="captcha-input" name="captcha" data-len="4" /></div>
						<span>&nbsp; <?= $captcha ?></span>
					</div>
					<input name="csrf_token" id="csrf_token" type="hidden" value="<?= $_SESSION['csrf_token'] ?>" />
					<input id="submit" type="submit" class="ts disabled button" value="提交貼文" />
				</form>
			</div>

			<div class="ts card" id="preview-section" style="margin-bottom: 42px; display: none;">
				<div class="image">
					<img id="preview-img" class="post-image" />
				</div>
				<div class="content">
					<div class="header">投稿預覽</div>
					<p id="preview-body"></p>
				</div>
				<div class="extra content">
					<div class="right floated author">
						<img id="author-photo" class="ts circular avatar image" onerror="this.src='/assets/img/avatar.jpg';"> <span id="author-name"></span>
					</div>
					<p>發文者 IP 位址：<span id="author-ip">140.113.***.*87</span></p>
				</div>
				<div class="ts fluid bottom attached large buttons">
					<button id="confirm-button" class="ts positive disabled button" onclick="confirmSubmission();">確認投稿 (<span id="countdown">03</span>)</button>
					<button id="delete-button" class="ts negative button" onclick="deleteSubmission();">刪除投稿</button>
				</div>
			</div>
		</div>
<?php include('includes/footer.php'); ?>
	</body>
</html>
