<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $name = 'Pages';
	public $uses = array('Page', 'Product', 'News');
	// public $helpers = array('ArticleVars');

	public function home() {
		$this->currMenu = 'Home';
		
		// Welcome block
		$article = $this->Page->findBySlug('home');
		$this->set('home_article', $article);
		$this->pageTitle = $article['Page']['title'];
		
		// Новости
		$conditions = array('News.published' => 1);
		$order = 'News.created DESC';
		$limit = 3;
		$news = $this->News->find('all', compact('conditions', 'order', 'limit'));
		$this->set('news', $news);
		
		// Новинки
		/*
		$products = $this->Product->find('all', array('conditions' => array('Product.published' => 1), 'order' => 'Product.created DESC', 'limit' => 2));
		$this->set('products', $products);
		*/
	}
	
	public function view($slug) {
		$article = $this->Page->findBySlug($slug);
		$this->pageTitle = $article['Page']['title'];
		$this->set('article', $article);
	}
}
