<?php
App::uses('AppController', 'Controller');
class SitemapController extends AppController {
	public $name = 'Sitemap';
	public $uses = array('Article.Article');
	public $layout = 'ajax';
	// public $helpers = array('ArticleVars');

	public function xml() {
		header("Content-Type: text/xml");
		
		$conditions = array('object_type' => array('SiteArticle', 'News', 'Product'), 'published' => 1);
		$order = array('Article.object_type');
		$aArticles = $this->Article->find('all', compact('conditions', 'order'));
		foreach($aArticles as $i => $row) {
			$objectType = $row['Article']['object_type'];
			$aArticles[$i][$objectType] = $row['Article'];
			unset($aArticles[$i]['Article']);
		}
		$this->set('aArticles', $aArticles);
	}
	
}
