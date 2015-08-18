<?
	// $title = $this->ObjectType->getTitle('view', $objectType);
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$this->ObjectType->getTitle('index', $objectType) => array('controller' => 'Articles', 'action' => 'index'),
		$this->ObjectType->getTitle('view', $objectType) => ''
	)));
	*/
	$this->Html->css('/Icons/css/icons', array('inline' => false));
	$this->Html->script(array('vendor/jquery/jquery.cookie', 'cart'), array('inline' => false));
?>
<div class="block">
	<?=$this->element('title', array('pageTitle' => 'Оформление заказа'))?>
<?
	echo $this->Form->create('Order');
?>		
	<div class="news">
		<div class="newsItem">
<?
	$total = 0;
	foreach($aProducts as $cat_id => $products) {
		$title = $products[0]['CategoryProduct']['title'];
?>
		<br/>
		<b><?=$title?></b>
<?
		foreach($products as $_article) {
			$this->ArticleVars->init($_article, $url, $title, $teaser, $src, 'noresize', $featured, $id);
			$total+= $_article['Product']['price'];
?>
		
			<div class="description">
				<a class="icon-color icon-delete" href="javascript:void(0)" onclick="delCart(<?=$id?>)" title="Удалить"></a>
				<a href="<?=$url?>"><?=$title?></a>
				<span style="float:right"><?=$this->ArticleVars->price($_article)?></span>
			</div>
<?
		}
	}
?>
		</div>
		<div class="newsItem">
			<b>
			Итого: <span style="float:right"><?=$this->ArticleVars->price($total)?></span>
			</b>
		</div>

		<div class="newsItem">
<?
	echo $this->element('title', array('pageTitle' => 'Контакты'));
	echo $this->Form->input('fio', array('label' => array('text' => 'Ваше имя (ФИО)')));
	echo $this->Form->input('email', array('label' => array('text' => 'E-mail для уведомлений')));
	echo $this->Form->input('phone', array('label' => array('text' => 'Тел. для связи')));
?>
		</div>
<?
	foreach($fields as $cat_id => $_fields) {
?>
		<div class="newsItem">
<?
	echo $this->element('title', array('pageTitle' => $aCategories[$cat_id]));
	echo $this->PHFormData->render($_fields, array()); // $this->request->data('PMFormData')
?>
		</div>
<?
	}
?>
	</div>
	<input type="checkbox">	Я согласен с <a href="<?=$this->SiteRouter->url($terms)?>">правилами и условиями</a> оказания услуг сайта <?=Configure::read('domain.title')?>
	<div class="more">
		<a href="javascript:void(0)" onclick="onSubmit()">Готово</a>
	</div>
<?
	echo $this->Form->end();
?>
</div>
<div class="block">
	<?=$this->element('title', array('pageTitle' => 'Вам также могут понравиться'))?>
	<div class="newsItem">
<?
	foreach($aRelated as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'thumb100x100');
?>
		
<?
		if ($src) {
?>
			<a href="<?=$url?>"><img class="thumb" src="<?=$src?>" alt="<?=h($title)?>" /></a>
<?
		}
?>
<?
	}
?>
	</div>
</div>
<script type="text/javascript">
function onSubmit() {
	if ($('#OrderCartForm input[type=checkbox]:checked').length) { 
		$('#OrderCartForm').submit(); 
	} else {
		alert('Вы должны принять правила и условия оказания услуг!');
	}
}
</script>