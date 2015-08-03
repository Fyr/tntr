<div class="block">
	<?=$this->element('title', array('pageTitle' => $article['Page']['title']))?>
	<?=$this->ArticleVars->body($article)?>
</div>

<div class="block">
<? echo $this->element('title', array('pageTitle' => __('Send message')));
	echo $this->Form->create('Contact');
	echo $this->Form->input('Contact.username', array('label' => array('text' => 'Ваше имя')));
	echo $this->Form->input('Contact.email', array('label' => array('text' => 'Ваш e-mail для обратной связи')));
	echo $this->Form->input('Contact.body', array('type' => 'textarea', 'label' => array('text' => __('Your message'))));
	echo $this->Form->label(__('Spam protection'));
	echo $this->element('recaptcha');
	echo $this->Form->submit(__('Send'));
	echo $this->Form->end();
?>
</div>