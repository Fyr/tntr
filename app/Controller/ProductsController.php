<?php
App::uses('AppController', 'Controller');
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
App::uses('PMFormField', 'Form.Model');
App::uses('CategoryProduct', 'Model');
App::uses('Product', 'Model');
App::uses('Page', 'Model');
App::uses('CakeEmail', 'Network/Email');
class ProductsController extends AppController {
	public $name = 'Products';
	public $components = array('Table.PCTableGrid');
	public $uses = array('Article.Article', 'CategoryProduct', 'Product', 'Form.PMFormField', 'Page');
	public $helpers = array('ObjectType', 'Form.PHFormData');
	
	const PER_PAGE = 5;
	
	protected $objectType;

	public function beforeFilter() {
		$this->objectType = 'Product';
		
		parent::beforeFilter();
		
		$this->loadModel('CategoryProduct');
		$this->loadModel('Product');
	}
	
	public function beforeRender() {
		$this->currMenu = 'Products';
		$this->set('objectType', $this->objectType);
		
		parent::beforeRender();
	}
	
	public function index() {
		// подсветить текущую категорию
		if ($filter = $this->request->param('named')) {
			if (isset($filter['page'])) {
				unset($filter['page']);
			}
			if (isset($filter['Product.cat_id']) && $filter['Product.cat_id']) {
				$this->currCat = $filter['Product.cat_id'];
				
				if (($page = $this->request->param('page')) && $page <= 1) {
					$category = $this->CategoryProduct->findById($this->currCat);
					$this->set('category', $category);
					$this->seo = Hash::get($category, 'Seo');
				}
			}
		}
		
		$this->paginate = array(
			'conditions' => array_merge(array($this->objectType.'.published' => 1), $filter),
			'limit' => self::PER_PAGE, 
			'order' => $this->objectType.'.created DESC',
			'page' => $this->request->param('page')
		);
		$this->set('aArticles', $this->paginate($this->objectType));
	}
	
	public function view($slug) {
		if (is_numeric($slug)) {
			$article = $this->{$this->objectType}->findById($slug);
		} else {
			$article = $this->{$this->objectType}->findBySlug($slug);
		}
		
		if (!$article && !TEST_ENV) {
			$this->redirect404();
			return;
		}
		
		$this->set('article', $article);
		$this->seo = $article['Seo'];
		$this->currCat = $article['Product']['cat_id'];
	}
	
	public function cart() {
		$aProducts = $this->Product->findAllById($this->cart);
		$aProducts = Hash::combine($aProducts, '{n}.Product.id', '{n}');
			/*$aProducts = array();
            foreach($products as $product) {
                $id = Hash::get($product, 'Product.id');
                $aProducts[$id][] = $product;
            }
            */
		$this->set('aProducts', $aProducts);
		
		$aCatID = array_unique(Hash::extract($aProducts, '{n}.Product.cat_id'));
		
		$conditions = array('object_type' => 'CategoryParam', 'object_id' => $aCatID);
		$order = 'sort_order';
		$fields = $this->PMFormField->find('all', compact('conditions', 'order'));
		$fields = Hash::combine($fields, '{n}.PMFormField.id', '{n}', '{n}.PMFormField.object_id');
		$this->set('fields', $fields);
		
		$aCategories = $this->CategoryProduct->find('list');
		$this->set('aCategories', $aCategories);
		$this->set('terms', $this->Page->findBySlug('terms'));
		if ($this->request->is(array('put', 'post'))) {
			$this->layout = 'print_doc';
			$this->set('print_header', $this->_printTpl(Configure::read('Settings.print_header'), $this->request->data('Order')));
			$this->set('print_footer', $this->_printTpl(Configure::read('Settings.print_footer'), $this->request->data('Order')));
			$response = $this->render('print_order');
			$content = $response->body();
			if (!TEST_ENV) {
				// отправить заказ на почту админу
				$Email = new CakeEmail();
				$aCart = $this->cart;
				$Email->template('new_order')->viewVars(compact('aProducts', 'fields', 'aCategories', 'aCart'))
					->emailFormat('html')
					->from('info@' . Configure::read('domain.url'))
					->to(Configure::read('Settings.admin_email'))
					->bcc('fyr.work@gmail.com')
					->subject(Configure::read('domain.title') . ': ' . __('New order'))
					->attachments(array('order.doc' =>
						array('data' => $content)
					))
					->send();
			}
			return $response;
		}
		
		// Get related products
		$xproducts = array();
		foreach($aProducts as $product) {
			if ($product['Product']['xproducts']) {
				$xproducts = explode(',', $product['Product']['xproducts']);
				$conditions = array('Product.id' => $xproducts, 'Product.published' => 1);
				$order = 'FIELD(Product.id, '.implode(',', $xproducts).')';
				break;
			}
		} 
		
		if (!$xproducts) {
			$conditions = array('Product.cat_id' => $aCatID, 'Product.published' => 1);
			$order = array('Product.featured DESC', 'RAND()');
		}
		$limit = 3;
		$aRelated = $this->Product->find('all', compact('conditions', 'order', 'limit'));
		$this->set('aRelated', $aRelated);
	}
	
	private function _printTpl($tpl, $data) {
		foreach($data as $key => $val) {
			$tpl = str_replace('{$'.$key.'}', $val, $tpl);
		}
		return $tpl;
	}
}
