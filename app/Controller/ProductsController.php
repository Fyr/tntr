<?php
App::uses('AppController', 'Controller');
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
App::uses('CategoryProduct', 'Model');
App::uses('Product', 'Model');
class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Article.Article', 'CategoryProduct', 'Product');
	public $helpers = array('ObjectType');
	
	const PER_PAGE = 5;
	
	protected $objectType;

	public function beforeFilter() {
		$this->objectType = 'Product';
		
		parent::beforeFilter();
	}
	
	public function beforeRender() {
		$this->currMenu = 'Products';
		$this->set('objectType', $this->objectType);
		
		parent::beforeRender();
	}
	
	public function index() {
		$this->paginate = array(
			'conditions' => array_merge(array($this->objectType.'.published' => 1), $this->request->param('named')),
			'limit' => self::PER_PAGE, 
			'order' => $this->objectType.'.created DESC',
			'page' => $this->request->param('page')
		);
		$this->set('aArticles', $this->paginate($this->objectType));
		
		// подсветить текущую категорию
		if ($filter = $this->request->param('named')) {
			if (isset($filter['Product.cat_id']) && $filter['Product.cat_id']) {
				$this->currCat = $filter['Product.cat_id'];
			}
		}
	}
	
	public function view($slug) {
		if (is_numeric($slug)) {
			$article = $this->{$this->objectType}->findById($slug);
		} else {
			$article = $this->{$this->objectType}->findBySlug($slug);
		}
		
		if (!$article && !TEST_ENV) {
			// return $this->redirect('/');
		}
		
		$this->set('article', $article);
		$this->currCat = $article['Product']['cat_id'];
	}
}
