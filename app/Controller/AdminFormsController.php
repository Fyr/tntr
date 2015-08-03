<?php
App::uses('AdminController', 'Controller');
App::uses('FieldTypes', 'Form.Vendor');
class AdminFormsController extends AdminController {
	public $name = 'AdminForms';
	public $uses = array('Form.PMFormField', 'Form.PMFormKey', 'Form.PMFormData', 'CategoryProduct');
	
	public function beforeFilter() {
		if (!$this->isAdmin()) {
			$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
			return;
		}
		parent::beforeFilter();
	}
	
	public function beforeRender() {
		parent::beforeRender();
		$this->set('objectType', 'CategoryParam');
	}
	
	public function index($object_id) {
		$this->paginate = array(
			'conditions' => compact('object_id'),
			'fields' => array('id', 'field_type', 'label', 'key', 'required', 'sort_order'),
			'order' => array('PMFormField.sort_order' => 'asc')
		);
		$this->PCTableGrid->paginate('PMFormField');
		$this->set('objectID', $object_id);
		$this->set('category', $this->CategoryProduct->findById($object_id));
		$this->currMenu = 'Catalog';
	}
	
	public function edit($id = 0, $objectID = 0) {
		$this->set('category', $this->CategoryProduct->findById($objectID));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($id) {
				$this->request->data('PMFormField.id', $id);
			} else {
				$this->request->data('PMFormField.object_type', 'CategoryParam');
				$this->request->data('PMFormField.object_id', $objectID);
			}
			
			if ($this->PMFormField->save($this->request->data)) {
				$id = $this->PMFormField->id;
				if ($this->request->is('post')) {
					$this->PMFormKey->save(array('form_id' => 1, 'field_id' => $id));
				}
				$baseRoute = array('action' => 'index', $objectID);
				return $this->redirect(($this->request->data('apply')) ? $baseRoute : array($id, $objectID));
			}
		} elseif ($id) {
			$field = $this->PMFormField->findById($id);
			$this->request->data = $field;
		}
		
		if (!$id) {
			$this->request->data('PMFormField.sort_order', '1');
		}
		
		$this->set('aFieldTypes', FieldTypes::getTypes());
		$this->set('PMFormField__SELECT', FieldTypes::SELECT);
		$this->set('PMFormField__MULTISELECT', FieldTypes::MULTISELECT);
		$this->set('PMFormField__FORMULA', FieldTypes::FORMULA);
    }
    
	public function recalcFormula() {
		$page = 1;
		$limit = 10;
		$count = 0;
		$fields = $this->PMFormField->getObjectList('SubcategoryParam', '');
		while ($rowset = $this->PMFormData->find('all', compact('page', 'limit'))) {
			$page++;
			foreach($rowset as $row) {
				$count++;
				$this->PMFormData->recalcFormula($row['PMFormData']['id'], $fields);
			}
		}
		$this->Session->setFlash(__('%s products have been updated', $count), 'default', array(), 'success');
		$this->redirect(array('action' => 'index'));
	}
}
