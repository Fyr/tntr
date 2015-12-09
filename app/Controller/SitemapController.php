<?php
App::uses('AppController', 'Controller');
class SitemapController extends AppController {
	public $name = 'Sitemap';
	public $components = array('RequestHandler');
	public $uses = array('Article.Article');
	// public $helpers = array('ArticleVars');
	
	public function index() {
		$this->RequestHandler->setContent('xml');
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

/*
	public function xml() {
		header("Content-Type: text/xml");
		$this->layout = 'ajax';
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
	*/
}
