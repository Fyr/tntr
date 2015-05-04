<?
	if ($this->Paginator->numbers()) {
?>
<div class="pagination newsItem">
	Страница: 
	<?//$this->Paginator->prev()?>
	<?=$this->Paginator->numbers(array('separator' => ' '))?>
	<?//$this->Paginator->next()?>
</div>
<?
	}
?>
<!-- div class="pagination newsItem">
	<span class="prev">Предыдущая</span>
	<span><a href="#">1</a></span>
	<span><a href="#">2</a></span>
	<span class="current">3</span>
	<span><a href="#">4</a></span>
	<span><a href="#">5</a></span>
	<span><a href="#" class="next">Следующая</a></span>
</div-->