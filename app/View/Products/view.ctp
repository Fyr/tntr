<?
	// $title = $this->ObjectType->getTitle('view', $objectType);
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$this->ObjectType->getTitle('index', $objectType) => array('controller' => 'Articles', 'action' => 'index'),
		$this->ObjectType->getTitle('view', $objectType) => ''
	)));
	*/
	$this->Html->script(array('vendor/jquery/jquery.cookie', 'cart'), array('inline' => false));
	$id = $article[$objectType]['id'];
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $article[$objectType]['title']))?>
	<?=$this->ArticleVars->body($article)?>
<?
	if (isset($aCart[$id])) {
?>
		<span class="sb-cart">
			<div class="more"><?=$this->Html->link('Оформить заказ', array('controller' => 'Products', 'action' => 'cart'))?></div>
		</span>
<?
	} else {
?>
	<div id="cart_<?=$id?>" class="more cart">
		<img src="/img/cart.png" alt="" />
		<input type="hidden" class="cart-qty" value="1" />
		<?=$this->ArticleVars->price($article)?>
		<a href="javascript:void(0)" onclick="addCart(<?=$id?>)">Заказать</a>
	</div>
<?
	}
?>
	
</div>