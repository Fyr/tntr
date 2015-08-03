<?php
App::uses('AdminController', 'Controller');
class AdminSettingsController extends AdminController {
    public $name = 'AdminSettings';
    public $uses = array('Settings', 'Section');
    
    public function beforeFilter() {
		if (!$this->isAdmin()) {
			$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
			return;
		}
		parent::beforeFilter();
	}
    
    public function index($tpl = '') {
        if ($this->request->is('post') || $this->request->is('put')) {
        	$this->request->data('Settings.id', 1);
        	$this->Settings->save($this->request->data);
        	$this->setFlash(__('Settings have been saved'), 'success');
        	return $this->redirect(array('action' => 'index', $tpl));
        }
        $this->request->data = $this->Settings->getData();
        $this->set('tpl', $tpl);
    }
    
    public function sections() {
    	$this->PCTableGrid->paginate('Section');
    }
}
