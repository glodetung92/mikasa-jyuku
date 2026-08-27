<?php
	include 'controller/db_connection.php';

	$conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="KEYWORDS" content="三笠塾,ベトナム,留学生,日本語勉強コミュニティ,Việt Nam,Vietnam">
        <meta name="description" content="ベトナム人留学生・実習生を対象とした日本語並びに日本文化を学ぶための日本語勉強コミュニティ、三笠塾。ブログ三笠塾便りもご覧ください。" />
		<title>三笠塾オフィシャルウェブサイト</title>
		<meta name="author" content="KKond">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<!-- ファビコン -->
		<link rel="icon" href="./images/favicon_mikasa.ico">
		<!-- スマホ用アイコン -->
		<link rel="apple-touch-icon" sizes="180x180" href="./images/webclipicon_256px.png">
		<!-- スタイルシート -->
		<link rel="stylesheet" type="text/css" href="styles/home.css" />
		<link rel="stylesheet" type="text/css" href="styles/page_top.css" />
		<link rel="stylesheet" type="text/css" href="styles/flexslider.css" />
		<link rel="stylesheet" type="text/css" href="styles/navbar.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css"> <!-- アイコンフォント「Font Awesome」 -->
		<!-- スクリプト -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> <!-- .../jquery/2.2.x/jquery.min.js のみ有効 -->
		<script src="./js/page_top.js"></script>
		<script src="./js/jquery.flexslider-min.js"></script>
		<script src="./js/javascript.js"></script>
		<script src="./js/navbar.js"></script>
		<script src="./js/open_windows.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div id="wrapper">
			<header>
				<div class="block_element rogo_block">
					<a href="#"><img src="./images/logo_mikasa.jpg" width="120" alt="ロゴ"></a>
					<h1>三笠塾</h1>
				</div>
							<h2>
							<span><a href="https://mikasajyuku.jp/" class="thispage">HOME</a></span>
							<span><a href="./mikasa_hp/" target="_blank">三笠塾</a></span>
							<span><a href="https://mikasajyuku.jp/blog/" target="_blank">三笠塾便り</a></span>
							</h2>
					
				<!-- ベトナム語自動翻訳 -->
				<div align="right">
					<a href="https://translate.google.com/translate?hl=&sl=ja&tl=vi&u=https://mikasajyuku.jp/index.html"><img src="./images/trans_vietnamese.png" width="37px" style="margin-right:25px;" title="Vietnamese" alt="ベトナム語"/></a>
				</div>
			</header>

            <div class="margin40">
                <p class="catchy centered" style="margin-bottom:-20px">
                	<a class="catchy" href="https://mikasajyuku.jp/mikasa_hp/%e4%b8%89%e7%ac%a0%e5%a1%be%e3%81%ae%e5%8b%89%e5%bc%b7%e4%bc%9a/%e3%82%aa%e3%83%b3%e3%83%a9%e3%82%a4%e3%83%b3%e6%8e%88%e6%a5%ad/" target="_blank">
                    <span class="blinking">オンライン授業のご案内<br></span>
                	</a>

                </p>
                <hr class="ridgeline">
            </div>

			<div class="grid container">
				<div id="first" class="row">  <!-- Bootstrap -->
					<div class="col-md-6">
                        <!-- Slide 開始-->
						<div class="row">
							<div class="col-md-12">
								<section class="flexslider">

									
									<ul class="slides">
										<li class="chdisplay">
											<a href="./bosyuu.html"><img src="./images/carousel001.jpg" />
											<div class="mask"><div class="caption">三笠塾/オンライン三笠塾<br>生徒募集中！</div></div>
										</a></li>
										<li class="chdisplay">
										    <a href="https://mikasajyuku.jp/mikasa_hp/%e5%a1%be%e9%95%b7%e3%81%94%e3%81%82%e3%81%84%e3%81%95%e3%81%a4/">
										    <img src="./images/carousel002.jpg" />
											<div class="mask"><div class="caption">塾長ごあいさつ</div></div>
										</a></li>
										<li class="chdisplay">
										    <a href="https://mikasajyuku.jp/mikasa_hp/%e4%b8%89%e7%ac%a0%e5%a1%be%e3%81%ae%e7%9b%ae%e7%9a%84/">
										    <img src="./images/carousel003.jpg" />
											<div class="mask"><div class="caption">三笠塾について</div></div>
										</a></li>
										<li class="chdisplay">
											<a href="https://mikasajyuku.jp/jlpt.html">
											<img src="./images/carousel004.jpg" />
											<div class="mask"><div class="caption">JLPT試験結果</div></div>
										</a></li>
										<li class="chdisplay"><a href="./preparation.html"><img src="./images/carousel005.jpg" />
											<div class="mask"><div class="caption">スタッフ紹介</div></div>
										</a></li>
										<li class="chdisplay"><a href="./preparation.html"><img src="./images/carousel006.jpg" />
											<div class="mask"><div class="caption">塾生インタビュー</div></div>
										</a></li>
										<li class="chdisplay">
										    <a href="https://mikasajyuku.jp/ssmikasa_hp/%e4%b8%89%e7%ac%a0%e5%a1%be%e3%81%ae%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/">
										    <img src="./images/carousel007.jpg" />
											<div class="mask"><div class="caption">三笠塾のイベント</div></div>
										</a></li>
										<li class="chdisplay"><a href="./preparation.html"><img src="./images/carousel008.jpg" />
											<div class="mask"><div class="caption">特定技能登録支援機関について</div></div>
										</a></li>
										<li class="chdisplay">
										    <a href="https://mikasajyuku.jp/mikasa_hp/%e3%83%99%e3%83%88%e3%83%8a%e3%83%a0%e4%ba%ba%e5%ad%a6%e7%94%9f%e3%81%ae%e3%81%8a%e9%83%a8%e5%b1%8b%e6%8e%a2%e3%81%97/">
										    <img src="./images/carousel009.jpg" />
											<div class="mask"><div class="caption">ベトナム人のお部屋探し</div></div>
										</a></li>
										<li class="chdisplay">
										    <a href="https://mikasajyuku.jp/mikasa_hp/%e4%b8%89%e7%ac%a0%e5%a1%be%e3%81%ae%e3%82%a2%e3%82%af%e3%82%bb%e3%82%b9/">
										    <img src="./images/carousel010.jpg" />
											<div class="mask"><div class="caption">三笠塾へのアクセス</div></div>
										</a></li>
									</ul>
								</section>
							</div>
						</div>
                        <!-- Slide 終了 -->

                        <!-- オンライン三笠塾　開始 -->
						<div class="row">
							<div class="col-md-12" style="margin-top:30px;">
								<section class="link_site">
									<a href="./mikasa_hp/category/general/" target="_blank"><img src="./images/link-1-fixed.png" title="Mikasa-Juku chính thức &#34;Bản tin Mikasa-Juku&#34;" alt="三笠塾"></a>
								</section>	
							</div>
						</div>
                        <!-- オンライン三笠塾 終了 -->

                        <!-- 三笠塾便り 開始 --> 
						<div class="row">
							<div class="col-md-12">
								<section class="link_site">
									<a href="https://mikasajyuku.jp/blog/" target="_blank"><img src="./images/link-2-fixed.png" title="Mikasa-Juku Blog chính thức &#34;Bản tin Mikasa-Juku&#34;" alt="三笠塾便り"></a>
								</section>	
							</div>
						</div>
                        <!-- 三笠塾便り　終了 -->

                        <!-- Les Mikasa 開始　-->
						<div class="row">
							<div class="col-md-12">
								<section class="link_site">
									<a href="./les_mikasa.html" onclick="openwin1(this.href); return false;" target="_blank"><img src="./images/link-3-fixed.png" title="Tạp chí Mikasa-Juku &#34;Les Mikasa&#34;" alt="Les Mikasa"></a>
									<!-- <a href="./files/bul_20200126.html" target="_blank"><img src="./images/link-3.png" title="Lớp học trực tuyến Mikasa-Juku &#34;Trường Mikasa-Juku trực tuyến&#34;" alt="オンライン三笠塾"></a> -->
								</section>	
							</div>
						</div>
                        <!-- Les Mikasa 終了 -->

						<!-- Torinoheya 開始 -->
						<div class="row">
							<div class="col-md-12">
								<section class="link_site block_end">
									<a href="./mikasa_hp/category/bird-room/" target="_blank"><img src="./images/link-4-fixed.png" title="Thông-tin-liên-quan-đến-tori-no-heya" alt="鳥の部屋"></a>
								</section>	
							</div>
						</div>
						<!-- Torinoheya 終了-->

                        <!-- カレンダー開始 -->
						<div class="row">
							<div class="col-md-12">
								<h5 class="side_title">＜三笠塾・今月の予定＞</h5>
								<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTokyo&amp;src=bWlrYXNhLm5ha2Fub0BnbWFpbC5jb20&amp;
								src=amEuamFwYW5lc2UjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23795548&amp;color=%23009688&amp;showTitle=0&amp;showTz=0" style="border:solid 2px #E0F2F7" width="100%" height="400" frameborder="0" scrolling="yes"></iframe>
							</div>
						</div>
                        <!-- カレンダー終了 -->

					</div>
					<div class="col-md-6">
						<section class="keijiban">
							<span class="box-title">掲示板</span>
							<dl class="k_box">
								<?php
									if (isset($conn)) {
										$tb = "mikasahp_wpposts";
										$pst_type = "post";
										$pst_status = "publish";
										$sql = "SELECT * FROM " . $tb  . " WHERE post_type='" . $pst_type . "' AND post_status='" . $pst_status . "' ORDER BY post_date DESC LIMIT 20;";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$date = explode(" ", $row['post_date']);
												$date = $date[0];												
											?>
												<dt><?= $date ?></dt>
												<dd>
													<?= "『" . $row['post_title'] . "』" ?> "詳細は下記をご覧ください。"
													<br>
													<b>詳細⇒<a href=<?= $row['guid'] ?> target="_blank">クリック</a></b>
												</dd>
											<?php
											}
										} else {
											echo "0 results";
										}
										$conn->close();
									}
								?>
							</dl>
						</section>
						<!-- GoogleMap表示 -->
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1620.164034650741!2d139.67844812628968!3d35.693543605994044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x848d6e127fe4c481!2z5LiJ56yg5aG-!5e0!3m2!1sja!2sjp!4v1577232053821!5m2!1sja!2sjp" width="100%" height="360" frameborder="0" style="border:0; " allowfullscreen=""></iframe>
					</div>
				</div> <!-- "first row" end -->
				<!-- <hr class="ridgeline"> -->
				

				<div id="third" class="row"> <!-- Bootstrap -->
					<div class="col-md-8 expansion">
						<div class="chdisplay-2"><span>
                            <!--<a href="./les_mikasa.html" onclick="openwin3(this.href); return false;" target="_blank"><img src="./images/recruitment.jpg" title="Tuyển sinh viên!　Vui lòng liên hệ với chúng tôi từ đây" width="100%" alt="生徒募集中！"></a>-->
                            <a href="./bosyuu.html"><img src="./images/recruitment_fixed-min.png" title="Tuyển sinh viên!　Vui lòng liên hệ với chúng tôi từ đây" width="100%" alt="生徒募集中！"></a>
						</span></div>
					</div>

					<div class="col-md-4 expansion">
					</div>
						
				</div> <!-- "third row" end -->
				<!--<p class="safari"><img src="../npc/npc.cgi?DI=2&L=index-01.html"></p>-->
				<p class="safari"><img src="../npc/npc.cgi?C=ffffff,ffffff&DI=2&P=OFF&L=index-01.html"></p>
			</div> <!-- "grid" end -->

			<!--<hr class="ridgeline">-->
			<!-- SNSアイコン -->
			<div class="container">
				<form style="margin-top:50px;" action="hoge">
					<!-- <button type="button" class="btn btn-default"><a href="https://www.facebook.com/Mikasaonline/" rel="nofollow" target="_blank"><i class="fab fa-facebook-f" style="color:#0068b7; font-size:2rem"></i></a></button> -->
                    <button type="button" class="btn btn-default"><a href="https://www.facebook.com/watch/Mikasaonline/" rel="nofollow" target="_blank" alt="まい先生のオンライン授業"><i class="fab fa-facebook-f" style="color:#0068b7; font-size:2rem"></i></a></button>
					<button type="button" class="btn btn-default"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" rel="nofollow" target="_blank"><i class="fab fa-twitter" style="color:#00a1e9; font-size:2rem"></i></a></button>
					<button type="button" class="btn btn-default"><a href="mailto:info@mikasajyuku.org?subject=三笠塾オフィシャルウェブサイト&amp;body=https://mikasajyuku.jp/" rel="nofollow" target="_blank"><i class="fas fa-envelope" style="color:#778899; font-size:2rem"></i></a></button>
					<!-- <button type="button" class="btn btn-default"><a href="#" rel="nofollow" target="_blank"><i class="fab fa-instagram" style="color:#777; font-size:2rem"></i></a></button> -->
					<!-- <button type="button" class="btn btn-default"><a href="#" rel="nofollow" target="_blank"><i class="fab fa-youtube" style="color:#777; font-size:2rem"></i></a></button> -->
					<button type="button" class="btn btn-default"><a href="https://social-plugins.line.me/lineit/share?url=https%3A%2F%2Fmikasajyuku.jp/index-01.html" rel="nofollow" target="_blank"><i class="fab fa-line" style="color:#32cd32; font-size:2rem"></i></a></button>
				</form>
			</div>

			<footer>
				<ul class="footer-nav">
					<li><a href="https://mikasajyuku.jp/" class="thispage">HOME</a></li>
                    <li><a href="https://mikasa_hp/">三笠塾</a></li>
                    <li><a href="https://mikasajyuku.jp/blog/" target="_blank">ブログ「三笠塾便り」</a></li>
					<li><a href="https://mikasajyuku.jp/mikasa_hp/%e4%b8%89%e7%ac%a0%e5%a1%be%e3%81%ae%e3%82%a2%e3%82%af%e3%82%bb%e3%82%b9/">三笠塾へのアクセス</a></li>
					<li><a href="https://mikasajyuku.jp/mikasa_hp/%e3%81%8a%e5%95%8f%e3%81%84%e5%90%88%e3%82%8f%e3%81%9b/">お問い合わせ</a></li>
					<br>
				</ul>
				<table class="fixtable centered blue_text" style="font-size: 100%; line-height:100%;">
					<tr><td><br>© Copyright 2020 三笠塾 <br></td></tr>
				</table>
			</footer>

		</div> <!-- "wrapper" end -->
		<div id="page_top"><a href="#"></a></div>

	</body>
</html>
