<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
	<ol class="carousel-indicators">
<?
	$class = 'active';
	foreach($aSlider as $i => $media) {
?>
		<li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" class="<?=$class?>"></li>
<?
		$class = '';
	}
?>
	</ol>
	
	<div class="carousel-inner" role="listbox">
<?
	$class = 'active';
	foreach($aSlider as $media) {
?>
		<div class="item <?=$class?>">
			<img src="<?=$this->Media->imageUrl($media, 'thumb1000x483')?>" alt="">
		</div>
<?
		$class = '';
	}
?>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="icon leftArrow" aria-hidden="true"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="icon rightArrow" aria-hidden="true"></span>
	</a>
</div>