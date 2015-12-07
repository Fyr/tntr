<?
	// $title = $this->ObjectType->getTitle('view', $objectType);
	/*
	echo $this->element('bread_crumbs', array('aBreadCrumbs' => array(
		__('Home') => '/',
		$this->ObjectType->getTitle('index', $objectType) => array('controller' => 'Articles', 'action' => 'index'),
		$this->ObjectType->getTitle('view', $objectType) => ''
	)));
	*/
	$this->Html->css(array('jquery-ui-1.10.3.custom', '/Icons/css/icons'), array('inline' => false));
	$this->Html->script(array('vendor/jquery/jquery.cookie', 'vendor/jquery/jquery-ui-1.10.3.custom.min', 'cart'), array('inline' => false));
?>
<style type="text/css">
.cart td { vertical-align: middle; }
.ui-datepicker-trigger { margin: 0 5px; position: relative; top: 3px; cursor: pointer; }
.input-mini{width:60px !important;}
.input-small{width:90px !important;}
.input-medium{width:150px !important;}
.input-large{width:210px !important;}
.input-xlarge{width:270px !important;}
.input-xxlarge{width:530px !important;}
.required { font-weight: bold; color: #f00;}
input.error { border: 1px solid #f00; }
</style>
<div class="block">
	<?=$this->element('title', array('pageTitle' => 'Оформление заказа'))?>
	<p>
		Пожалуйста, укажите дату оказания услуг, а также заполните доп.данные.<br />
		Кликните по иконке доп.данных, чтобы свернуть\развернуть форму заполнения.<br />
		Поля, помеченные <span class="required">*</span>, обязательны к заполнению.
	</p>
<?
	echo $this->Form->create('Order');
?>		
	<div class="news">
		<table class="cart" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th></th>
					<th>Наименивание услуги</th>
					<th>Дата</th>
					<th>Доп.данные</th>
					<th>Цена</th>
				</tr>
			</thead>
			<tbody>
<?
	$total = 0;
	foreach($aCart as $i => $id) {
		$product = $aProducts[$id];
		$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize', $featured, $id);
		$total+= $product['Product']['price'];
		$_fields = $fields[Hash::get($product, 'Product.cat_id')];
		foreach($_fields as $_id => &$_field) {
			$_field['PMFormField']['_options']['id'] = 'PMFormFieldFk'.$_id.'_'.$i;
			$_field['PMFormField']['_options']['name'] = 'data[PMFormField]['.$i.'][fk_'.$_id.']';
			// $_field['PMFormField']['_options']['autocomplete'] = 'off';
		}
?>
			<tr>
				<td align="center">
					<a class="icon-color icon-delete" href="javascript:void(0)" onclick="delCart(<?=$i?>)" title="Удалить"></a>
				</td>
				<td>
					<b style="font-size: 0.7em"><?=$product['CategoryProduct']['title']?></b><br/>
					<a href="<?=$url?>"><?=$title?></a>
				</td>
				<td align="center">
					<input type="text" class="datepicker" name="data[PMFormField][<?=$i?>][_date]" required="required" style="width: 70px;" />
				</td>
				<td id="check_xd<?=$i?>" align="center">
					<a class="xd_fail" href="javascript:void(0)" onclick="$('#xd<?=$i?>').toggle()" title="Нужно ввести доп.данные"><img src="/img/test-fail-icon.png" alt="" /></a>
					<a class="xd_ok" href="javascript:void(0)" onclick="$('#xd<?=$i?>').toggle()" title="Показать доп.данные" style="display: none;"><img src="/img/test-pass-icon.png" alt="" /></a>
				</td>
				<td align="right">
					<?=$this->ArticleVars->price($product)?>
				</td>
			</tr>
			<tr>
				<td id="xd<?=$i?>" class="extraData" colspan="5" style="padding-bottom: 20px;">
					<?=$this->PHFormData->render($_fields, array())?>
				</td>
			</tr>
<?
	}
?>
			<tr style="height: 50px">
				<td colspan="4">
					<b>Итого</b>
				</td>
				<td align="right">
					<b><?=$this->ArticleVars->price($total)?></b>
				</td>
			</tr>
			</tbody>
		</table>
		<!--div class="newsItem">
			<b>
				Итого: <span style="float:right"><?=$this->ArticleVars->price($total)?></span>
			</b>
		</div-->

		<div class="newsItem">
			Введите ваши контактные данные
<?
	// echo $this->element('title', array('pageTitle' => 'Контакты'));
	echo $this->Form->input('fio', array('required' => true, 'label' => array('text' => '<span class="required">*</span> Ваше имя (ФИО)')));
	echo $this->Form->input('email', array('required' => true, 'label' => array('text' => '<span class="required">*</span> E-mail для уведомлений')));
	echo $this->Form->input('phone', array('required' => true, 'label' => array('text' => '<span class="required">*</span> Тел. для связи')));
?>
		</div>
<?
/*
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
*/
?>
	</div>
	<input type="checkbox" id="agree">	Я согласен с <a href="<?=$this->SiteRouter->url($terms)?>">правилами и условиями</a> оказания услуг сайта <?=Configure::read('domain.title')?>
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
	$(this).removeClass('error');
	$('[required]').each(function(){
		if (!$(this).val()) {
			$(this).addClass('error');
		}
	});
	if (!$('#agree:checked').length) {
		alert('Вы должны принять правила и условия оказания услуг!');
	} else if (!$('#OrderFio').val()) {
		alert('Вы должны ввести Ваше имя (ФИО)!');
	} else if (!$('#OrderEmail').val()) {
		alert('Вы должны ввести E-mail для уведомлений!');
	} else if (!$('#OrderPhone').val()) {
		alert('Вы должны ввести Тел. для связи!');
	} else if ($('.xd_fail:visible').length || $('.error[required]').length) {
		alert('Вы должны заполнить доп.данные!');
	} else {
		$('#OrderCartForm').submit();
	}
}

function checkExtraData(id) {
	var lRequired = true;
	$('#' + id + ' [required]').each(function(){
		if (!$(this).val()) {
			lRequired = false;
		}
	});
	$('#check_' + id + ' a').hide();
	if (lRequired) {
		$('#check_' + id + ' a.xd_ok').show();
	} else {
		$('#check_' + id + ' a.xd_fail').show();
	}
}

$(function(){
	$('.datepicker').datepicker({
		dateFormat: "dd.mm.yy",
		buttonImage: "/Icons/img/calendar.png",
		buttonImageOnly: true,
		buttonText: "Выберите дату",
		showOn: "both",
		changeYear: true,
		changeMonth: true,
		constrainInput: true
	});

	$('[required]').focus(function(){
		$(this).removeClass('error');
	});
	$('.extraData').each(function(){
		checkExtraData($(this).prop('id'));
	});

	$('.extraData input, .extraData textarea').keyup(function(){
		checkExtraData($(this).closest('.extraData').prop('id'));
	});
	$('.extraData input, .extraData textarea').change(function(){
		checkExtraData($(this).closest('.extraData').prop('id'));
	});
});
</script>