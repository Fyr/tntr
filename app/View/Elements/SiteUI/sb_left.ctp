<?
	if ($aCart) {
		echo '<span class="sb-cart">'.$this->element('SiteUI/sb_block', array(
			'title' => '<img src="/img/cart.png" alt="" />Заказанные услуги', 
			'content' => $this->element('SiteUI/sb_cart')
		)).'</span>';
	}
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
	echo $this->element('SiteUI/sb_block', array(
		'title' => 'Живая трансляция с Тенерифе', 
		'content' => $this->element('SiteUI/sb_liveweb')
	));
?>
