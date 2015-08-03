<?
	$title = ($currCat) ? $aArticles[0]['CategoryProduct']['title'] : 'Наши услуги';
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $title))?>
	<div class="news">
<?
	foreach($aArticles as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '200x');
?>
		<div class="newsItem">
<?
		if ($src) {
?>
			<a href="<?=$url?>"><img class="thumb" src="<?=$src?>" alt="<?=h($title)?>" /></a>
<?
		}
?>
			<div class="description">
				<a href="<?=$url?>" class="title"><?=$title?></a>
				<?=$teaser?>
				<?=$this->element('more', compact('url'))?>
			</div>
		</div>
<?
	}
?>
	</div>
<?
	echo $this->element('paginate');
	if (isset($category) && $category) {
		echo $this->ArticleVars->body($category);
	}
?>
</div>
