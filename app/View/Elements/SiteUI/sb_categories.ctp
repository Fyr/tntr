<div class="categoires">
<?
	foreach($aCategories as $id => $title) {
		$url = array('controller' => 'Products', 'action' => 'index', 'Product.cat_id' => $id);
		$options = array('escape' => false);
		if (isset($currCat) && $currCat == $id) {
			$options['class'] = 'active';
		}
		echo $this->Html->link('<span class="icon point"></span>'.$title, $url, $options);
	}
?>
</div>