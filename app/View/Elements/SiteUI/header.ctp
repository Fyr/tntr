<div class="header clearfix">
	<a href="/" class="logo"></a>
	<div class="right">
		<div class="slogan"></div>
		<div class="clearfix topContent">
			<div class="socials">
				<a href="https://twitter.com/TenturRu" class="icon twitter" target="_blank"></a>
				<a href="https://www.facebook.com/profile.php?id=100009691983056" class="icon facebook" target="_blank"></a>
				<a href="https://vk.com/tentur_ru" class="icon vk" target="_blank"></a>
				<a href="https://plus.google.com/u/0/108953123960392799809/about" class="icon google" target="_blank"></a>
			</div>
			<div class="contacts">
				<div>
					<a href="mailto:<?=Configure::read('Settings.admin_email')?>"><span class="icon letter"></span><?=Configure::read('Settings.admin_email')?></a>
				</div>
				<div>
					<a href="callto:<?=Configure::read('Settings.skype')?>"><span class="icon skype"></span><?=Configure::read('Settings.skype')?></a>
				</div>
			</div>
			<div class="phone">
				<span class="icon phoneHeader"></span>
				<div class="numbers">
					<div><span class="code"><?=Configure::read('Settings.phone1')?></div>
					<div><span class="code"><?=Configure::read('Settings.phone2')?></div>
				</div>
			</div>
		</div>
	</div>
</div>