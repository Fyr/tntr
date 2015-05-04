<?
	$this->ArticleVars->init($sbNews, $url, $title, $teaser);
?>
<a href="<?=$url?>" class="artcileTitle"><?=$title?></a>
<p><?=$teaser?></p>
<?=$this->element('more', array('url' => $url))?>