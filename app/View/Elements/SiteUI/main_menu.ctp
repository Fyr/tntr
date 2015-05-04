<div class="mainMenu clearfix">
<?
	foreach($aNavBar as $id => $item) {
		$options = (strtolower($id) == strtolower($currMenu)) ? array('class' => 'active') : array();
		
		$url = Router::url($item['href']);
		if (isset($item['href']['action']) && $item['href']['action'] == 'index') {
			$url.= '/';
		}
		echo $this->Html->link($item['label'], $url, $options);
	}
?>
</div>