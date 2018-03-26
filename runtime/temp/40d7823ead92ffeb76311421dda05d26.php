<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp64\www\tp5\public/../application/index\view\search\fenye.html";i:1521249972;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="http://www.wan.com//static/js/jquery-1.11.3.js"></script>
	<link rel="stylesheet" type="text/css" href="http://www.wan.com//static/bootstrap/css/bootstrap.css">
</head>
<body>
	<table>
	<?php foreach($list as $v): ?>
		<tr>
			<td><?php echo $v['goodsname']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $page; ?>

</body>
</html>
