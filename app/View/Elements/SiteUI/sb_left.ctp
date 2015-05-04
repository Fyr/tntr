<?
	echo $this->element('SiteUI/sb_block', array(
		'title' => 'Наши услуги', 
		'content' => $this->element('SiteUI/sb_categories')
	));
	if ($sbArticle) {
		echo $this->element('SiteUI/sb_block', array(
			'title' => 'Полезно знать', 
			'content' => $this->element('SiteUI/sb_article')
		));
	}
	if ($sbNews) {
		echo $this->element('SiteUI/sb_block', array(
			'title' => $this->ObjectType->getTitle('index', 'News'), 
			'content' => $this->element('SiteUI/sb_news')
		));
	}
?>
