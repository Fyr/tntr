<?=$print_header?>
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<?
	$total = 0;
	foreach($aProducts as $cat_id => $products) {
		$title = $products[0]['CategoryProduct']['title'];
?>
	<tr>
		<td colspan="2"><b><?=$title?></b></td>
	</tr>
<?
		foreach($products as $_article) {
			$this->ArticleVars->init($_article, $url, $title, $teaser, $src, 'noresize', $featured, $id);
			$total+= $_article['Product']['price'];
?>
	<tr>
		<td><?=$title?></td>
		<td align="right"><?=$this->ArticleVars->price($_article)?></td>
	</tr>		
<?
		}
	}
?>
	<tr>
		<td><b>Итого:</b></td>
		<td align="right"><b><?=$this->ArticleVars->price($total)?></b></td>
	</tr>
</tbody>
</table>
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