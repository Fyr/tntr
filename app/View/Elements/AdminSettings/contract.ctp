<style type="text/css">
.form-horizontal .control-label {
	text-align: left;
	margin-left: 20px;
}
</style>
<label class="control-label">Заголовок документа</label>
<?=$this->PHForm->editor('print_header', array('fullwidth' => true));?>
<label class="control-label">Конец документа</label>
<?=$this->PHForm->editor('print_footer', array('fullwidth' => true));?>

<b>Переменные шаблона</b> <br />
{$fio} - ФИО клиента<br />
{$phone} - телефон клиента<br />
{$email} - e-mail клиента<br />