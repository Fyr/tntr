<div class="bottomRubricator">
	<div class="title">Категории</div>
	<ul class="clearfix">
<?
	$options = array('escape' => false);
	foreach($aCategories as $id => $title) {
		$url = array('controller' => 'Products', 'action' => 'index', 'Product.cat_id' => $id);
?>
		<li><?=$this->Html->link('<span class="icon point"></span>&nbsp;&nbsp;'.$title, $url, $options)?></li>
<?
	}
?>
	</ul>
</div>
<div class="footer clearfix">
	<div class="left">
		<a href="/"><img src="/img/logo.png" alt="" /></a>
	</div>
	<div class="menu">
<?
	foreach($aNavBar as $id => $item) {
		$options = (strtolower($id) == strtolower($currMenu)) ? array('class' => 'active') : array();
		echo $this->Html->link($item['label'], $item['href'], $options);
	}
?>
	</div>
	<div class="socials">
		<a class="icon twitter_grey" href="#"></a>
		<a class="icon facebook_grey" href="#"></a>
		<a class="icon vk_grey" href="#"></a>
		<a class="icon google_grey" href="#"></a>
	</div>
	<div class="bottom">
		<span class="copyright">Все права защищены © 2015</span>
		<span class="phones">
			<span class="icon phoneFooter"></span>
			<?=Configure::read('Settings.phone1')?>, <?=Configure::read('Settings.phone2')?>
		</span>
		<a href="callto:<?=Configure::read('Settings.skype')?>" class="skypeName"><span class="icon skype"></span><?=Configure::read('Settings.skype')?></a>
		<a href="mailto:<?=Configure::read('Settings.admin_email')?>"><span class="icon letter"></span><?=Configure::read('Settings.admin_email')?></a>
	</div>
</div>