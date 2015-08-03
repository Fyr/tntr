<?php
App::uses('AppHelper', 'View/Helper');
class ArticleVarsHelper extends AppHelper {
	public $helpers = array('Media', 'SiteRouter');

	public function init($article, &$url, &$title, &$teaser = '', &$src = '', $size = 'noresize', &$featured = false, &$id = '') {
		$objectType = $this->getObjectType($article);
		$id = $article[$objectType]['id'];
		
		$url = $this->SiteRouter->url($article);
		
		$title = $article[$objectType]['title'];
		$teaser = nl2br($article[$objectType]['teaser']);
		$src = (isset($article['Media']) && $article['Media'] && isset($article['Media']['id']) && $article['Media']['id']) 
			? $this->Media->imageUrl($article, $size) : '';
		$featured = $article[$objectType]['featured'];
	}

	public function body($article) {
		return $article[$this->getObjectType($article)]['body'];
	}
	
	public function price($price) {
		if (is_array($price)) {
			$price = intval(Hash::get($price, 'Product.price'));
		}
		return Configure::read('Settings.price_prefix')
			.number_format($price, 0, '.', Configure::read('Settings.int_div'))
			.Configure::read('Settings.price_postfix');
	}
}
