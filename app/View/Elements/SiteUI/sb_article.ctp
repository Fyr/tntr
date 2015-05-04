<?
	$this->ArticleVars->init($sbArticle, $url, $title, $teaser, $src);
?>
<a href="<?=$url?>" class="artcileTitle"><?=$title?></a>
<p><?=$teaser?></p>
<?=$this->element('more', array('url' => $url))?>