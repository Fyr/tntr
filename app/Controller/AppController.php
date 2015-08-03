<?php
App::uses('Controller', 'Controller');

App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
App::uses('Media', 'Media.Model');
App::uses('CategoryProduct', 'Model');
App::uses('Settings', 'Model');
App::uses('SiteArticle', 'Model');
App::uses('Page', 'Model');

class AppController extends Controller {
	public $uses = array('Article.Article', 'Media.Media', 'CategoryProduct', 'Settings', 'SiteArticle', 'Page');
	
	public $paginate;
	public $aNavBar = array(), $aBottomLinks = array(), $currMenu = '', $currLink = '', 
		$currCat, $pageTitle = '', $aBreadCrumbs = array(), $seo, $cart = array();
	
	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}
	
	protected function _beforeInit() {
	    $this->helpers = array_merge(array('Html', 'Form', 'Paginator', 'Media', 'ArticleVars'), $this->helpers);
	}

	protected function _afterInit() {
	    // after construct actions here
	}
	
	public function isAuthorized($user) {
    	$this->set('currUser', $user);
		return Hash::get($user, 'active');
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->beforeFilterLayout();
	}
	
	protected function beforeFilterLayout() {
		$this->loadModel('Settings');
		$this->Settings->initData();
		
		$this->aNavBar = array(
			'Home' => array('label' => __('Home'), 'href' => array('controller' => 'Pages', 'action' => 'home')),
			'News' => array('label' => __('News'), 'href' => array('controller' => 'News', 'action' => 'index')),
			'Products' => array('label' => __('Products'), 'href' => array('controller' => 'Products', 'action' => 'index')),
			'Articles' => array('label' => __('Articles'), 'href' => array('controller' => 'Articles', 'action' => 'index')),
			'klientam' => array('label' => '', 'href' => array('controller' => 'Pages', 'action' => 'view', 'klientam.html')),
			'tenerife' => array('label' => '', 'href' => array('controller' => 'Pages', 'action' => 'view', 'tenerife.html')),
			'Contacts' => array('label' => __('Contacts'), 'href' => array('controller' => 'Contacts', 'action' => 'index'))
		);
		$this->aBottomLinks = $this->aNavBar;
		
		$this->currMenu = $this->_getCurrMenu();
	    $this->currLink = $this->currMenu;
	    
	    $this->cart = (isset($_COOKIE['cart'])) ? str_replace('\"', '"', $_COOKIE['cart']) : '{}';
		$this->cart = (array) json_decode($this->cart);
		$this->cart = ($this->cart) ? array_combine(array_keys($this->cart), array_values($this->cart)) : array();
		$this->set('aCart', $this->cart);
	}
	
	protected function _getCurrMenu() {
		$curr_menu = strtolower(str_ireplace('Site', '', $this->request->controller)); // By default curr.menu is the same as controller name
		/*
		foreach($this->aNavBar as $currMenu => $item) {
			if (isset($item['submenu'])) {
				foreach($item['submenu'] as $_currMenu => $_item) {
					if (strtolower($_currMenu) === $curr_menu) {
						return $currMenu;
					}
				}
			}
		}
		*/
		return $curr_menu;
	}
	
	public function beforeRender() {
		$this->set('aNavBar', $this->aNavBar);
		$this->set('currMenu', $this->currMenu);
		$this->set('aBottomLinks', $this->aBottomLinks);
		$this->set('currLink', $this->currLink);
		$this->set('pageTitle', $this->pageTitle);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
		
		$this->beforeRenderLayout();
	}
	
	protected function beforeRenderLayout() {
		$this->loadModel('CategoryProduct');
		// ??? на странице если явно не указать objectType - загружаются все статьи - BUG!!!
		$fields = array('id', 'title');
		$conditions = array('CategoryProduct.object_type' => 'CategoryProduct');
		$order = 'CategoryProduct.sorting ASC';
		$aCategories = $this->CategoryProduct->find('list', compact('fields', 'conditions', 'order')); 
		$this->set('aCategories', $aCategories);
		
		$this->loadModel('SiteArticle');
		$sbArticle = Hash::get($this->SiteArticle->getRandomRows(1, array('SiteArticle.published' => 1, 'SiteArticle.featured' => 1)), 0);
		
		$this->loadModel('News');
		$sbNews = Hash::get($this->News->getRandomRows(1, array('News.published' => 1, 'News.featured' => 1)), 0);
		
		$this->set(compact('sbArticle', 'sbNews'));
		$this->set('currCat', $this->currCat);
		
		$this->loadModel('Page');
		$page = $this->Page->findBySlug('klientam');
		$this->aNavBar['klientam']['label'] = $page['Page']['title'];
		$page = $this->Page->findBySlug('tenerife');
		$this->aNavBar['tenerife']['label'] = $page['Page']['title'];
		$this->set('aNavBar', $this->aNavBar);
		
		$this->set('liveweb_article', $this->Page->findBySlug('tenerife-live-webcam'));
		
		$this->set('seo', $this->seo);
	}
	
	protected function getObjectType() {
		$objectType = $this->request->param('objectType');
		return ($objectType && in_array($objectType, array('SiteArticle', 'News'))) ? $objectType : 'SiteArticle';
	}
	
		/**
	 * Sets flashing message
	 *
	 * @param str $msg
	 * @param str $type - must be 'success', 'error' or empty
	 */
	protected function setFlash($msg, $type = 'info') {
		$this->Session->setFlash($msg, 'default', array(), $type);
	}

}
