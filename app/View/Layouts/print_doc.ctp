<?
header('Content-type: application/ms-word');
//header('Content-Type: text/html; charset=utf8');
header('Content-Disposition: attachment; filename=order.doc');
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<style type="text/css">
td {
    vertical-align: middle;
}
.align-right {
	text-align: right;
}
.even {
	background-color: #eee;
}
.odd {
}
img {
    display: block;
}
p {
	margin: 0; padding: 0;
}
</style>
</head>
<body>
	<?=mb_convert_encoding($this->fetch('content'), "CP1251", "UTF-8")?>
</body>
</html>