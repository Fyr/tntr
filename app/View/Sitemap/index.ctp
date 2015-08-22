<div class="block">
	<?=$this->element('title', array('pageTitle' => 'Карта сайта'))?>
<?
	foreach($aNavBar as $id => $item) {
		if ($id == 'Sitemap') {
			continue;
		}
		$url = Router::url($item['href']);
		if (isset($item['href']['action']) && $item['href']['action'] == 'index') {
			$url.= '/';
		}
		echo $this->Html->link($item['label'], $url, array('style' => 'font-size: 1.2em')).'<br />';
		if ($id == 'Products') {
			foreach($aCategories as $id => $title) {
				$url = array('controller' => 'Products', 'action' => 'index', 'Product.cat_id' => $id);
				$options = array('escape' => false);
				echo $this->Html->link('<span class="icon point" style="margin: 0 5px 0 20px"></span>'.$title, $url, $options).'<br />';
			}
		}
	}
?>
</div>