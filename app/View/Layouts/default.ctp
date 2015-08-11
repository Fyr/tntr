<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?
	echo $this->Html->charset();
	echo $this->element('Seo.seo_info', array('data' => $seo));
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('style', 'fonts', 'carousel', 'extra'));
	
	$aScripts = array(
		'vendor/jquery/jquery-1.10.2.min',
		'vendor/carousel',
	);
	echo $this->Html->script($aScripts);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
        <!--[if gte IE 9]>
            <style type="text/css">
                .gradient { filter: none; }
            </style>
        <![endif]-->
<script type="text/javascript">
cartURL = '<?=$this->Html->url(array('controller' => 'Products', 'action' => 'cart'))?>';
</script>
	</head>
	<body>
		<div class="topBack">
			<div class="bottomBack">
				<div class="wrapper">
					<?=$this->element('SiteUI/header')?>
					<?=$this->element('SiteUI/main_menu')?>
<?
	if (isset($aSlider)) {
		echo $this->element('slider');
	}
?>
					<div class="clearfix">
						<div class="leftSidebar">
							<?=$this->element('SiteUI/sb_left')?>
						</div>
						<div class="mainContent">
							<?=$this->fetch('content')?>
						</div>
					</div>
					<?=$this->element('SiteUI/footer')?>
				</div>
			</div>
		</div>
		<?//(TEST_ENV) ? $this->element('sql_dump') : ''?>
	</body>
</html>
