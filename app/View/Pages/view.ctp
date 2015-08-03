<?
	$title = $article['Page']['title'];
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$title => ''
	)));
	*/
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $title))?>
	<?=$this->ArticleVars->body($article)?>
</div>
