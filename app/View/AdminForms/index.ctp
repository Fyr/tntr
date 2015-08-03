<?
	$title = $this->ObjectType->getTitle('index', $objectType);
	$title = Hash::get($category, 'CategoryProduct.title').': '.$title;
    $createURL = $this->Html->url(array('action' => 'edit', 0, $objectID));
    $createTitle = $this->ObjectType->getTitle('create', $objectType);
    $actions = $this->PHTableGrid->getDefaultActions($objectType);
    $actions['table']['add']['href'] = $createURL;
    $actions['table']['add']['label'] = $createTitle;
    
    $backURL = $this->Html->url(array('action' => 'index', $objectID));
    $deleteURL = $this->Html->url(array('action' => 'delete')).'/{$id}?model=Form.PMFormField&backURL='.urlencode($backURL);
    $editURL = $this->Html->url(array('controller' => 'AdminForms', 'action' => 'edit')).'/{$id}/'.$objectID;
    $actions['row']['edit'] = $this->Html->link('', $editURL, array('class' => 'icon-color icon-edit'));
    $actions['row']['delete'] = $this->Html->link('', $deleteURL, array('class' => 'icon-color icon-delete', 'title' => __('Delete record')), __('Are you sure to delete this record?'))
?>
<?=$this->element('admin_title', compact('title'))?>
<div class="text-center">
    <a class="btn btn-primary" href="<?=$createURL?>">
        <i class="icon-white icon-plus"></i> <?=$createTitle?>
    </a>
    <!--a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminForms', 'action' => 'recalcFormula'))?>">
        <i class="icon-white icon-refresh"></i> Пересчитать формулы
    </a-->
</div>
<br/>
<?
    echo $this->PHTableGrid->render('PMFormField', array('actions' => $actions));
?>