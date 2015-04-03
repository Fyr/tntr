<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?=$this->Html->charset()?>
	<title><?=$title_for_layout?></title>
<?
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('style', 'fonts', 'carousel'));
	
	$aScripts = array(
		'vendor/jquery/jquery-1.10.2.min',
		'vendor/carousel',
	);
	echo $this->Html->script($aScripts);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
        <!--[if gte IE 9]>
            <style type="text/css">
                .gradient { filter: none; }
            </style>
        <![endif]-->
	</head>
	<body>
		<div class="topBack">
			<div class="bottomBack">
				<div class="wrapper">
					<div class="header clearfix">
						<a href="#" class="logo"></a>
						<div class="right">
							<div class="slogan"></div>
							<div class="clearfix topContent">
								<div class="socials">
									<a href="#" class="icon twitter"></a>
									<a href="#" class="icon facebook"></a>
									<a href="#" class="icon vk"></a>
									<a href="#" class="icon google"></a>
								</div>
								<div class="contacts">
									<div>
										<a href="mailto:tentur.vip@yandex.ru"><span class="icon letter"></span>tentur.vip@yandex.ru</a>
									</div>
									<div>
										<a href="callto:tentur.vip"><span class="icon skype"></span>tentur.vip</a>
									</div>
								</div>
								<div class="phone">
									<span class="icon phoneHeader"></span>
									<div class="numbers">
										<div><span class="code">+7 (925)</span> 593 7861</div>
										<div><span class="code">+34 (677)</span> 94 80 96</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mainMenu clearfix">
						<a href="#" class="active">Главная</a>
						<a href="#">Новости</a>
						<a href="#">Каталог</a>
						<a href="#">Партнеры</a>
						<a href="#">О нас</a>
						<a href="#" class="contacts">Контакты</a>
					</div>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="/img/slide1.jpg" alt="">
							</div>
							<div class="item">
								<img src="/img/slide2.jpg" alt="">
							</div>
							<div class="item">
								<img src="/img/slide3.jpg" alt="">
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="icon leftArrow" aria-hidden="true"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="icon rightArrow" aria-hidden="true"></span>
						</a>
					</div>
					<div class="clearfix">
						<div class="leftSidebar">
							<div class="block">
								<h2>Категории услуг</h2>
								<div class="categoires">
									<a href="#" class="active"><span class="icon point"></span> Название</a>
									<a href="#"><span class="icon point"></span>Название очень длинное очень</a>
									<a href="#"><span class="icon point"></span>Название очень длинное очен</a>
									<a href="#"><span class="icon point"></span>Название</a>
									<a href="#"><span class="icon point"></span>Название</a>
									<a href="#"><span class="icon point"></span>Название</a>
								</div>
							</div>
							<div class="block">
								<h2>Статьи</h2>
								<a href="#" class="artcileTitle">Что нужно заграницей</a>
								<p>Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор.</p>
								<div class="more"><a href="#">подробнее</a></div>
							</div>
							<div class="block">
								<h2>Новости</h2>
								<a href="#" class="artcileTitle">Что нужно заграницей</a>
								<p>Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор.</p>
								<div class="more"><a href="#">подробнее</a></div>
							</div>
						</div>
						<div class="mainContent">
							<div class="block">
								<h2>О компании</h2>
								<p>Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный отдых за рубежом доступным любому клиенту. Первыми направлениями компании стали Турция и Египет, затем Таиланд. Из года в год эти страны становятся лидерами по посещаемости среди российских туристов. При этом около 15% от всего турпотока реализует компания ANEX Tour. С 2012 года туроператор вышел на рынок с Испанией и уже сегодня показатель компании составляет 12% от турпотока в страну.</p>
								<p>Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный отдых за рубежом доступным любому клиенту. Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный отдых за рубежом доступным любому клиенту. Первыми направлениями компании стали Турция и Египет, затем Таиланд. Из года в год эти страны становятся лидерами по посещаемости среди российских туристов. При этом около 15% от всего турпотока реализует компания ANEX Tour. С 2012 года туроператор вышел на рынок с Испанией и уже сегодня показатель компании составляет 12% от турпотока в страну.</p>
								<p>Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный 
отдых за рубежом доступным любому клиенту. </p>
								<div class="more"><a href="#">подробнее</a></div>
							</div>
							<div class="block">
								<h2>Новости нашей компании</h2>
								<div class="news">
									<div class="newsItem">
										<a href="#"><img class="thumb" src="http://img.tyt.by/620x620s/n/it/0c/8/nalog_na_internet_1.jpg" alt="" /></a>
										<div class="description">
											<a href="#" class="title">Подарок ко дню влюбленных, скидка на все туры 15 %</a>
											Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный отдых за рубежом доступным любому клиенту. Первыми направлениями компании стали Турция и Египет, затем Таиланд. Из года в год эти страны становятся лидерами по посещае-
	мости среди российских туристов. При этом около 15% от всего турпотока реализует компания ANEX Tour. С 2012 года туроператор вышел на рынок
											<div class="more"><a href="#">подробнее</a></div>
										</div>
									</div>
									<div class="newsItem">
										<a href="#"><img class="thumb" src="http://img.tyt.by/620x620s/n/it/0c/8/nalog_na_internet_1.jpg" alt="" /></a>
										<div class="description">
											<a href="#" class="title">Подарок ко дню влюбленных, скидка на все туры 15 %</a>
											Именно в этот период в нашей стране начинает формироваться культура массового туризма. 
											<div class="more"><a href="#">подробнее</a></div>
										</div>
									</div>
									<div class="newsItem">
										<a href="#"><img class="thumb" src="http://www.kokoko.ru/uploads/posts/2010-09/1285831936_1285420240_1282878149_tallest_girls_56.jpg" alt="" /></a>
										<div class="description">
											<a href="#" class="title">Подарок ко дню влюбленных, скидка на все туры 15 %</a>
											Именно в этот период в нашей стране начинает формироваться культура массового туризма. Оказавшись у истоков процесса, туроператор. определил свою миссию. как стремление сделать качественный отдых за рубежом доступным любому клиенту. Первыми направлениями компании стали Турция и Египет, затем Таиланд. Из года в год эти страны становятся лидерами по посещае-
	мости среди российских туристов. При этом около 15% от всего турпотока реализует компания ANEX Tour. С 2012 года туроператор вышел на рынок
											<div class="more"><a href="#">подробнее</a></div>
										</div>
									</div>
									<div class="pagination newsItem">
										<span class="prev">Предыдущая</span>
										<span><a href="#">1</a></span>
										<span><a href="#">2</a></span>
										<span class="current">3</span>
										<span><a href="#">4</a></span>
										<span><a href="#">5</a></span>
										<span><a href="#" class="next">Следующая</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bottomRubricator">
						<div class="title">Категории</div>
						<ul class="clearfix">
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
							<li><a href="#"><span class="icon shevron"></span>Название страницы категории</a></li>
						</ul>
					</div>
					<div class="footer clearfix">
						<div class="left">
							<a href="#"><img src="/img/logo.png" alt="" /></a>
						</div>
						<div class="menu">
							<a href="#" class="active">Главная</a>
							<a href="#">Новости</a>
							<a href="#">Каталог</a>
							<a href="#">Партнеры</a>
							<a href="#">О нас</a>
							<a href="#">Контакты</a>
						</div>
						<div class="socials">
							<a class="icon twitter_grey" href="#"></a>
							<a class="icon facebook_grey" href="#"></a>
							<a class="icon vk_grey" href="#"></a>
							<a class="icon google_grey" href="#"></a>
						</div>
						<div class="bottom">
							<span class="copyright">Все права защищены © 2015</span>
							<span class="phones">
								<span class="icon phoneFooter"></span>
								+7 (925) 593 7861, +34 (677) 94 80 96
							</span>
							<a href="callto:tentur.vip" class="skypeName"><span class="icon skype"></span>tentur.vip</a>
							<a href="mailto:tentur.vip@yandex.ru"><span class="icon letter"></span>tentur.vip@yandex.ru</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
