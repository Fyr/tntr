<div class="bottomRubricator">
	<div class="title">Категории</div>
	<ul class="clearfix">
<?
	$options = array('escape' => false);
	foreach($aCategories as $id => $title) {
		$url = array('controller' => 'Products', 'action' => 'index', 'Product.cat_id' => $id);
?>
		<li><?=$this->Html->link('<span class="icon point"></span>&nbsp;&nbsp;'.$title, $url, $options)?></li>
<?
	}
?>
	</ul>
</div>
<div class="footer clearfix">
	<div class="left">
		<a href="/"><img src="/img/logo.png" alt="" /></a>
	</div>
	<div class="menu">
<?
	foreach($aNavBar as $id => $item) {
		$options = (strtolower($id) == strtolower($currMenu)) ? array('class' => 'active') : array();
		echo $this->Html->link($item['label'], $item['href'], $options);
	}
?>
	</div>
	<div class="socials">
		<a class="icon twitter_grey" href="https://twitter.com/TenturRu" target="_blank"></a>
		<a class="icon facebook_grey" href="https://www.facebook.com/profile.php?id=100009691983056" target="_blank"></a>
		<a class="icon vk_grey" href="https://vk.com/tentur_ru" target="_blank"></a>
		<a class="icon google_grey" href="https://plus.google.com/u/0/108953123960392799809/about" target="_blank"></a>
	</div>
	<div class="bottom">
		<span class="copyright">Все права защищены © 2015</span>
		<span class="phones">
			<span class="icon phoneFooter"></span>
			<?=Configure::read('Settings.phone1')?>, <?=Configure::read('Settings.phone2')?>
		</span>
		<a href="callto:<?=Configure::read('Settings.skype')?>" class="skypeName"><span class="icon skype"></span><?=Configure::read('Settings.skype')?></a>
		<a href="mailto:<?=Configure::read('Settings.admin_email')?>"><span class="icon letter"></span><?=Configure::read('Settings.admin_email')?></a>
<?
	if (!TEST_ENV) {
?>
<!-- Yandex.Metrika informer --><a href="https://metrika.yandex.ru/stat/?id=31886931&amp;from=informer" target="_blank" class="yandexMetrika" rel="nofollow"><img src="https://informer.yandex.ru/informer/31886931/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:31886931,lang:'ru'});return false}catch(e){}" /></a><!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter31886931 = new Ya.Metrika({ id:31886931, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/31886931" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<?
	}
?>
	</div>
</div>