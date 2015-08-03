<?
	echo $this->PHForm->hidden('xproducts');
	$xproducts = explode(',', $this->request->data('Article.xproducts'));
	if (count($xproducts) < 3) {
		$xproducts = array(0, 0, 0);
	}
	echo $this->PHForm->input('xproduct_1', array('value' => $xproducts[0], 'options' => $aProductOptions, 'label' => array('text' => 'Услуга 1', 'class' => 'control-label')));
	echo $this->PHForm->input('xproduct_2', array('value' => $xproducts[1], 'options' => $aProductOptions, 'label' => array('text' => 'Услуга 2', 'class' => 'control-label')));
	echo $this->PHForm->input('xproduct_3', array('value' => $xproducts[2], 'options' => $aProductOptions, 'label' => array('text' => 'Услуга 3', 'class' => 'control-label')));
?>
<script type="text/javascript">
function updateXProducts() {
	var a = [$('#ArticleXproduct1').val(), $('#ArticleXproduct2').val(), $('#ArticleXproduct3').val()];
	$('#ArticleXproducts').val(a.join());
}
$(function(){
	$('#ArticleXproduct1, #ArticleXproduct2, #ArticleXproduct3').change(function(){
		updateXProducts();
	});
});
</script>