<div class="header clearfix">
	<a href="/" class="logo"></a>
	<div class="right">
		<div class="slogan"></div>
		<div class="clearfix topContent">
			<div class="socials">
				<a href="#" class="icon twitter"></a>
				<a href="#" class="icon facebook"></a>
				<a href="#" class="icon vk"></a>
				<a href="#" class="icon google"></a>
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