<?=$print_header?>
<?
	foreach($fields as $cat_id => $_fields) {
?>
<br />
<b><?=$aCategories[$cat_id]?></b><br />
<?
		foreach($_fields as $_key => $info) {
?>
<?=$info['PMFormField']['label']?>: <?=$this->request->data('PMFormData.fk_'.$_key)?><br />
<?
		}
	}
?>
<br />
<?=$print_footer?>