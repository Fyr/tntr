<?
	$title = $this->ObjectType->getTitle('index', $objectType);
	// $title = Hash::get($category, 'CategoryProduct.title').': '.$title;
    $createURL = $this->Html->url(array('action' => 'edit', 0, $objectType, $objectID));
    $createTitle = $this->ObjectType->getTitle('create', $objectType);
    
    $actions = $this->PHTableGrid->getDefaultActions($objectType);
    $actions['table']['add']['href'] = $createURL;
    $actions['table']['add']['label'] = $createTitle;
    $actions['row']['edit']['href'] = $this->Html->url(array('action' => 'edit', '~id', $objectType, $objectID));

    if ($objectType == 'CategoryProduct') {
    	/*
    	$actions['row'][] = array(
    		'label' => 'Поля', 
    		'href' => $this->Html->url(array('controller' => 'AdminForms', 'action' => 'index', 'CategoryParam', '~id'))
    	);
    	*/
    	$actions['row'][] = $this->Html->link('Параметры', array('controller' => 'AdminForms', 'action' => 'index', '~id'));
    }
    
	$columns = $this->PHTableGrid->getDefaultColumns($objectType);
?>
<?=$this->element('admin_title', compact('title'))?>
<div class="text-center">
    <a class="btn btn-primary" href="<?=$createURL?>">
        <i class="icon-white icon-plus"></i> <?=$createTitle?>
    </a>
</div>
<br/>
<?
    echo $this->PHTableGrid->render($objectType, array(
        'baseURL' => $this->ObjectType->getBaseURL($objectType, $objectID),
        'actions' => $actions,
        'columns' => $columns,
        'data' => $aRowset
    ));
?>