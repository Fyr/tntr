<?=$print_header?>
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<?
	$total = 0;
	foreach($aCart as $i => $id) {
		$product = $aProducts[$id];
		$this->ArticleVars->init($product, $url, $title, $teaser, $src, 'noresize', $featured, $id);
		$total+= $product['Product']['price'];
		$_fields = $fields[Hash::get($product, 'Product.cat_id')];
?>
		<tr>
			<td align="center">
				<?=$this->request->data('PMFormField.'.$i.'._date')?>
			</td>
			<td>
				<?=$title?>
			</td>
			<td align="right">
				<?=$this->ArticleVars->price($product)?>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding-bottom: 20px;">
<?
		foreach($_fields as $_key => $info) {
?>
				<?=$info['PMFormField']['label']?>: <?=$this->request->data('PMFormField.'.$i.'.fk_'.$_key)?><br />
<?
		}
?>
			</td>
		</tr>
<?
	}
?>
	<tr>
		<td colspan="2"><b>Итого:</b></td>
		<td align="right"><b><?=$this->ArticleVars->price($total)?></b></td>
	</tr>
</tbody>
</table>
<br />
<?=$print_footer?>