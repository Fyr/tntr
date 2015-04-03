<?
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
App::uses('Media', 'Media.Model');
App::uses('CategoryProduct', 'Model');
App::uses('Seo', 'Seo.Model');
class Product extends Article {
	var $belongsTo = array(
		'CategoryProduct' => array(
			'className' => 'Article.Article',
			'foreignKey' => 'cat_id',
			'conditions' => array('CategoryProduct.object_type' => 'CategoryProduct'),
			'dependent' => true
		)
	);
	
	public $hasOne = array(
		'Media' => array(
			'className' => 'Media.Media',
			'foreignKey' => 'object_id',
			'conditions' => array('Media.object_type' => 'Product', 'Media.main' => 1),
			'dependent' => true
		),
		'Seo' => array(
			'className' => 'Seo.Seo',
			'foreignKey' => 'object_id',
			'conditions' => array('Seo.object_type' => 'Product'),
			'dependent' => true
		)
	);
	
	public $objectType = 'Product';
	
}
