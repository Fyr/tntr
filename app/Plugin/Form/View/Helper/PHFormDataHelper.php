<?php
/**
 * Wrapper for standart Form helper
 * Customizes default HTML inputs
 */
App::uses('FieldTypes', 'Form.Vendor');
App::uses('FormHelper', 'View/Helper');
App::uses('PHFormHelper', 'Form.View/Helper');
class PHFormDataHelper extends AppHelper {
	public $helpers = array('Form.PHForm');
	
	public function getSelectOptions($options) {
		$_options = explode(',', str_replace(array("\r\n", "\n", "<br>", "<br/>", "<br />"), ',', $options));
		return array_combine($_options, $_options);
	}
	
	private function _renderInput($field, $value) {
		$aDefaultOptions = array(
			FieldTypes::STRING => array('class' => 'input-medium', 'type' => 'text'),
			FieldTypes::INT => array('class' => 'input-small', 'type' => 'text'),
			FieldTypes::DATE => array('class' => 'input-small datepicker', 'type' => 'text'),
			FieldTypes::FLOAT => array('class' => 'input-small', 'type' => 'text'),
			FieldTypes::TEXTAREA => array('class' => 'input-xlarge', 'type' => 'textarea'),
			FieldTypes::SELECT => array('class' => 'input-medium', 'options' => $this->getSelectOptions($field['options'])),
			FieldTypes::MULTISELECT => array('class' => 'input-medium multiselect', 'options' => $this->getSelectOptions($field['options']), 'multiple' => true),
			// FieldTypes::UPLOAD_FILE => array('class' => 'input-medium', 'type' => 'text'),
		);
		
		if ($field['field_type'] == FieldTypes::MULTISELECT) {
			$value = explode(',', $value);
		}
		
		$options = array('value' => $value, 'label' => array('text' => $field['label'], 'class' => 'control-label'));
		
		if (isset($aDefaultOptions[$field['field_type']])) {
			$options = array_merge($aDefaultOptions[$field['field_type']], $options);
		}
		if (isset($field['_options'])) {
			$options = array_merge($options, $field['_options']);
		}
		if (isset($field['required']) && $field['required']) {
			$options['required'] = true;
			$options['label']['text'] = '<span class="required">*</span>'.$field['label'];
		}
		return $this->PHForm->input('PMFormData.fk_'.$field['id'], $options);
	}
	
	public function render($form, $rowData, $offset = 0) {
		$html = '';
		foreach($form as $field_id => $row) {
			$field = $row['PMFormField'];
			$value = Hash::get($rowData, 'fk_'.$field['id']);
			$html.= $this->_renderInput($field, $value);
		}
		return $html;
	}
}