<?
	// $title = $this->ObjectType->getTitle('view', $objectType);
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$this->ObjectType->getTitle('index', $objectType) => array('controller' => 'Articles', 'action' => 'index'),
		$this->ObjectType->getTitle('view', $objectType) => ''
	)));
	*/
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $article[$objectType]['title']))?>
	<?=$this->ArticleVars->body($article)?>
</div>