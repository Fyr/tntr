<style type="text/css">
label {
	display: block;
	margin-top: 5px;
}
</style>
<div class="block">
	<?=$this->element('title', array('pageTitle' => $article['Page']['title']))?>
	<?=$this->ArticleVars->body($article)?>
</div>

<div class="block">
<? echo $this->element('title', array('pageTitle' => __('Send message')));
	echo $this->Form->create('Contact');
	echo $this->Form->input('Contact.username');
	echo $this->Form->input('Contact.email');
	echo $this->Form->input('Contact.body', array('type' => 'textarea', 'label' => array('text' => __('Your message'))));
	echo $this->Form->label(__('Spam protection'));
	echo $this->element('recaptcha');
	echo $this->Form->submit(__('Send'));
	echo $this->Form->end();
?>
</div>